<?php

namespace App\Helpers;

use App\Models\Master\JabatanUnitUser;
use App\Models\Master\Modul;
use App\Models\Master\AksesModul;
use App\Models\Master\UserGrupModul;
use App\Models\ESurat\Backdate;
use App\Models\ESurat\PengaktivasiSekretaris;
use App\Models\ESurat\AktivasiSekretaris;
use App\Models\ESurat\AksesSPSM;
use App\Models\ELembur\PenerimaLembur;
use App\Models\EReimburse\PejabatPemeriksaReimburse;
use App\Models\ECuti\PenerimaCuti;
use App\Models\ELPD\PenerimaLPD;

trait LoginHelper
{
    protected function dataLogin($user)
    {
        $daftar_juu = JabatanUnitUser::where('id_user', $user->id)
            ->where('id', '<>', $user->id_juu_aktif)
            ->with([
                'jabatan_unit.jabatan',
                'jabatan_unit.unit'
            ])
            ->get();

        $data_juu = [];
        foreach ($daftar_juu as $jabatan_unit_user) {
            $data_juu[] = (object) [
                'id' => $jabatan_unit_user->id,
                'nama' => $this->convertNamaPejabat($jabatan_unit_user),
                'jabatan' => $jabatan_unit_user->jabatan_unit->jabatan->nama,
                'unit' => $jabatan_unit_user->jabatan_unit->unit->nama,
                'jenis' => ($jabatan_unit_user->id_jenis_juu == JENIS_JKU_DELEGASI) ? '(D)' : ''
            ];
        }

        $backdate = false;
        if (Backdate::where('id_user', $user->id)->where('status', STATUS_BACKDATE_AKTIF)->count()) $backdate = true;

        $sekretaris = false;
        if (AktivasiSekretaris::where('id_juu_sekretaris', $user->id_juu_aktif)->count()) $sekretaris = true;

        $akses = $this->aksesMenu($user);

        $daftar_modul = Modul::whereIn('id', AksesModul::whereIn('id_grup_modul', UserGrupModul::where('id_user', $user->id)->pluck('id_grup_modul'))->pluck('id_modul'))->get();

        $data_modul = [];
        foreach ($daftar_modul as $modul) {
            $data_modul[] = (object) [
                'id' => $modul->id,
                'nama' => isset($modul->alias) ? $modul->alias : $modul->nama,
                'icon' => isset($modul->icon) ? $modul->icon : '',
                'background' => isset($modul->background) ? $modul->background : '',
                'is_enable' => $modul->is_enable,
                'pesan' => $modul->is_enable ? '' : 'Modul ' . $modul->nama . ' masih dalam tahap pengembangan'
            ];
        }

        return (object) [
            'token' => $user->access_token,
            'user' => (object) [
                'role' => $akses,
                'data' => (object) [
                    'id' => $user->id,
                    'nik' => $user->karyawan->nik,
                    'nama' => $user->profil_user->nama,
                    'email' => isset($user->profil_user->email) ? $user->profil_user->email : '',
                    'no_hp' => isset($user->profil_user->no_hp) ? $user->profil_user->no_hp : '',
                    'foto_profil' => isset($user->profil_user->foto_path) ? str_replace(FOTO_PROFIL_PATH, '', $user->profil_user->foto_path) : '',
                    'id_jku' => $user->id_juu_aktif,
                    'nama_jku' => $this->convertNamaPejabat($user->juu_aktif),
                    'jabatan_jku' => $user->juu_aktif->jabatan_unit->jabatan->nama,
                    'unit_jku' => $user->juu_aktif->jabatan_unit->unit->nama,
                    'daftar_jku' => $data_juu,
                    'backdate' => $backdate,
                    'sekretaris' => $sekretaris,
                    'waktu_autosave' => $user->autosave,
                    'modul' => $data_modul,
                    'sps' => $this->cekSPS($user),
                    'ho' => $this->cekHO($user->juu_aktif),
                    'is_direksi' => $user->juu_aktif->jabatan_unit->jabatan->is_direksi
                ]
            ]
        ];
    }

    protected function aksesMenu($user)
    {
        $akses = [];

        $modul = Modul::where('nama', 'Administrator')->first();
        if (AksesModul::whereIn('id_grup_modul', UserGrupModul::where('id_user', $user->id)->pluck('id_grup_modul'))->where('id_modul', $modul->id)->count()) $akses[] = 'admin';

        $modul = Modul::where('nama', 'E-Surat')->first();
        if (AksesModul::whereIn('id_grup_modul', UserGrupModul::where('id_user', $user->id)->pluck('id_grup_modul'))->where('id_modul', $modul->id)->count()) $akses[] = 'user';

        $hrd = false;
        $modul = Modul::where('nama', 'Administrator HRD')->first();
        if (AksesModul::whereIn('id_grup_modul', UserGrupModul::where('id_user', $user->id)->where('id_grup_modul', GRUP_ADMIN_HRD)->pluck('id_grup_modul'))->where('id_modul', $modul->id)->count()) { $akses[] = 'hrd-pusat'; $hrd = true; }

        if (PengaktivasiSekretaris::where('id_juu', $user->id_juu_aktif)->count()) $akses[] = 'aktivasi_sekretaris';

        if (AktivasiSekretaris::where('id_juu_sekretaris', $user->id_juu_aktif)->count()) {
            if (AktivasiSekretaris::where('id_juu_sekretaris', $user->id_juu_aktif)->where('id_tipe_aktivasi', TIPE_AKTIVASI_SEKRETARIS_SEMUA)->count()) $akses[] = 'sekretaris_all';
            elseif (AktivasiSekretaris::where('id_juu_sekretaris', $user->id_juu_aktif)->where('id_tipe_aktivasi', TIPE_AKTIVASI_SEKRETARIS_PENERIMA)->count()) $akses[] = 'sekretaris_penerima';
            // elseif ($aktivasi_sekretaris->id_tipe_aktivasi == TIPE_AKTIVASI_SEKRETARIS_DISPOSISI) $akses[] = 'sekretaris_disposisi';
            elseif (AktivasiSekretaris::where('id_juu_sekretaris', $user->id_juu_aktif)->where('id_tipe_aktivasi', TIPE_AKTIVASI_SEKRETARIS_PENERBITAN)->count()) $akses[] = 'sekretaris_penerbit';
        }

        $daftar_akses_spsm = AksesSPSM::where('id_juu', $user->id_juu_aktif)->pluck('id_unit');
        if (sizeof($daftar_akses_spsm)) $akses[] = 'spsm';

        if (PenerimaLembur::where('id_juu', $user->id_juu_aktif)->count()) { $akses[] = 'hrd-lembur'; $hrd = true; }
        if (PejabatPemeriksaReimburse::where('id_juu', $user->id_juu_aktif)->count()) { $akses[] = 'hrd-reimburse'; $hrd = true; }
        if (PenerimaCuti::where('id_juu', $user->id_juu_aktif)->count()) { $akses[] = 'hrd-cuti'; $hrd = true; }
        if (PenerimaLPD::where('id_juu', $user->id_juu_aktif)->count()) { $akses[] = 'hrd-lpd'; $hrd = true; }

        if ($hrd) $akses[] = 'hrd';
        if ($user->juu_aktif->jabatan_unit->jabatan->is_direksi OR in_array($user->juu_aktif->jabatan_unit->id_jabatan, [ID_JABATAN_MANAGER_KEUANGAN, ID_JABATAN_MANAGER_AKUNTANSI, ID_JABATAN_ASISTEN_MANAGER_KEUANGAN])) $akses[] = 'direksi';

        $id_unit = isset($user->juu_aktif->id_kantor_khusus) ? $user->juu_aktif->id_kantor_khusus : $user->juu_aktif->jabatan_unit->id_unit;
        // if ($id_unit == ID_KANTOR_PUSAT) $akses[] = 'lembur';

        return $akses;
    }

    protected function cekSPS($user)
    {
        $sps = AksesSPSM::where('id_juu', $user->id_juu_aktif)->where('id_unit', ID_KANTOR_PUSAT)->first();

        return is_null($sps) ? '' : 'HO';
    }

    protected function cekHO($juu)
    {
        $id_unit = isset($juu->id_kantor_khusus) ? $juu->id_kantor_khusus : $juu->jabatan_unit->id_unit;

        return $id_unit == ID_KANTOR_PUSAT ? true : false;
    }
}
