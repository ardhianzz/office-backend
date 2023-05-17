<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

use App\Models\Master\User;
use App\Models\Master\Unit;
use App\Models\Master\JabatanUnit;
use App\Models\Master\JabatanUnitUser;
use App\Models\ECuti\Cuti;
use App\Models\ECuti\RiwayatCuti;
use App\Models\ECuti\JenisCuti;
use App\Models\ECuti\JatahCutiHarian;
use App\Models\ECuti\TanggalHariLibur;
use App\Models\ECuti\PenerimaCuti;
use App\Models\Master\Jabatan;
use App\Models\Master\ProfilUser;

trait CutiHelper
{
    protected function getPemeriksaCuti($juu)
    {
        if ($juu->jabatan_unit->id_unit == ID_KANTOR_PUSAT) {
            $pemeriksa_pertama = JabatanUnitUser::where('id_jabatan_unit', ID_JK_SENIOR_MNG_KEUANGAN)->where('id_jenis_juu', JENIS_JKU_ASLI)->first();
            if (is_null($pemeriksa_pertama)) $id_pemeriksa_pertama = 0;
            else $id_pemeriksa_pertama = $pemeriksa_pertama->id;
        } else {
            if ($juu->jabatan_unit->jabatan->level <= LEVEL_ASMAN) $id_pemeriksa_pertama = $juu->id;
            else $id_pemeriksa_pertama = $this->getPemeriksaPertamaCuti($juu, LEVEL_ASMAN);
        }

        if ($juu->jabatan_unit->id_unit == ID_KANTOR_PUSAT) $id_ju_pemeriksa_kedua = ID_JK_DIRKEUM;
        else $id_ju_pemeriksa_kedua = ID_JK_DIRTEKOP;

        $pemeriksa_kedua = JabatanUnitUser::where('id_jabatan_unit', $id_ju_pemeriksa_kedua)->where('id_jenis_juu', JENIS_JKU_ASLI)->first();
        if (is_null($pemeriksa_kedua)) $id_pemeriksa_kedua = 0;
        else $id_pemeriksa_kedua = $pemeriksa_kedua->id;

        $id_pemeriksa_cuti = [];
        array_push($id_pemeriksa_cuti, $id_pemeriksa_pertama, $id_pemeriksa_kedua);

        return $id_pemeriksa_cuti;
    }

    protected function getPemeriksaPertamaCuti($juu, $level_jabatan_pertama)
    {
        if (is_null($juu->id_parent)) return 0;

        $atasan = JabatanUnitUser::find($juu->id_parent);
        if (is_null($atasan)) return 0;

        if ($atasan->jabatan_unit->jabatan->level <= $level_jabatan_pertama) return $atasan->id;
        else return $this->getPemeriksaPertamaCuti($atasan, $level_jabatan_pertama);
    }

    protected function tanggalCutiBersihHariKerja($tanggal_cuti_kotor = [])
    {
        if (sizeof($tanggal_cuti_kotor) == 0) return [];

        $tanggal_cuti_bersih = [];
        foreach ($tanggal_cuti_kotor as $tanggal_cuti) if ($tanggal_cuti->isWeekday() AND TanggalHariLibur::where('tanggal', $tanggal_cuti->format('Y-m-d'))->count() == 0) $tanggal_cuti_bersih[] = $tanggal_cuti->format('Y-m-d');

        return $tanggal_cuti_bersih;
    }

    protected function drafCuti($id_juu = NULL)
    {
        if ($id_juu == NULL) return [];

        $daftar_cuti = Cuti::where('created_by', $id_juu)
            ->where('posisi', 0)
            ->where('status', STATUS_CUTI_DRAF)
            ->orderBy('updated_at', 'desc')
            ->get();

        $data_cuti = [];
        foreach ($daftar_cuti as $cuti) {
            $data_cuti[] = (object) [
                'id' => $cuti->id,
                'keterangan' => trim($cuti->keterangan),
                'tanggal_awal' => isset($cuti->tanggal_awal) ? date('Y-m-d', strtotime($cuti->tanggal_awal)) : '',
                'tanggal_akhir' => isset($cuti->tanggal_akhir) ? date('Y-m-d', strtotime($cuti->tanggal_akhir)) : '',
                'nama_tanggal_awal' => isset($cuti->tanggal_awal) ? $this->convertToIndonesiaDate(strtotime($cuti->tanggal_awal)) : '',
                'nama_tanggal_akhir' => isset($cuti->tanggal_akhir) ? $this->convertToIndonesiaDate(strtotime($cuti->tanggal_akhir)) : '',
                'id_jenis_cuti' => isset($cuti->id_jenis_cuti) ? $cuti->id_jenis_cuti : '',
                'nama_jenis_cuti' => isset($cuti->jenisCuti) ? $cuti->jenisCuti->nama : '',
                'nama_waktu_buat' => $this->convertToIndonesiaTime(strtotime($cuti->created_at)),
                'nama_waktu_ubah' => $this->convertToIndonesiaTime(strtotime($cuti->updated_at)),
                'waktu_ubah' => date('Y-m-d H:i:s', strtotime($cuti->updated_at))
            ];
        }

        return $data_cuti;
    }

    protected function drafCutiMonitor($id_juu = NULL)
    {
        if ($id_juu == NULL) return [];

        $daftar_cuti = Cuti::where('created_by', $id_juu)
            ->where('posisi', '<>', 0)
            ->where('status', STATUS_CUTI_PROSES)
            ->orderBy('updated_at', 'desc')
            ->get();

        $data_cuti = [];
        foreach ($daftar_cuti as $cuti) {
            $tarik = false;
            if ($id_juu == $cuti->created_by) if ($cuti->hasPemeriksaCuti->first()) if ($cuti->posisi == $cuti->hasPemeriksaCuti->first()->id_juu_pemeriksa AND $cuti->is_opened_by_posisi == false) $tarik = true;

            $durasi = 0;
            $durasi = $cuti->jenisCuti->id_jenis_hari_cuti == JENIS_HARI_CUTI_HARI_KERJA ? sizeof($this->tanggalCutiBersihHariKerja(CarbonPeriod::create($cuti->tanggal_awal, $cuti->tanggal_akhir))) : CarbonPeriod::create($cuti->tanggal_awal, $cuti->tanggal_akhir)->count();

            $data_cuti[] = (object) [
                'id' => $cuti->id,
                'keterangan' => trim($cuti->keterangan),
                'tanggal_awal' => isset($cuti->tanggal_awal) ? date('Y-m-d', strtotime($cuti->tanggal_awal)) : '',
                'tanggal_akhir' => isset($cuti->tanggal_akhir) ? date('Y-m-d', strtotime($cuti->tanggal_akhir)) : '',
                'nama_tanggal_awal' => isset($cuti->tanggal_awal) ? $this->convertToIndonesiaDate(strtotime($cuti->tanggal_awal)) : '',
                'nama_tanggal_akhir' => isset($cuti->tanggal_akhir) ? $this->convertToIndonesiaDate(strtotime($cuti->tanggal_akhir)) : '',
                'id_jenis_cuti' => $cuti->id_jenis_cuti,
                'nama_jenis_cuti' => $cuti->jenisCuti->nama,
                'tarik' => $tarik,
                'durasi' => $durasi,
                'posisi' => $cuti->posisi == 0 ? $this->convertNamaPejabat($cuti->createdBy) : $this->convertNamaPejabat($cuti->juuPosisi),
                'nama_posisi' => $cuti->posisi == 0 ? $cuti->createdBy->user->profil_user->nama : $cuti->juuPosisi->user->profil_user->nama,
                'nama_waktu_buat' => $this->convertToIndonesiaTime(strtotime($cuti->created_at)),
                'nama_waktu_ubah' => $this->convertToIndonesiaTime(strtotime($cuti->updated_at)),
                'waktu_ubah' => date('Y-m-d H:i:s', strtotime($cuti->updated_at))
            ];
        }

        return $data_cuti;
    }

    protected function drafCutiButuhProses($id_juu = NULL)
    {
        if ($id_juu == NULL) return [];

        $daftar_cuti = Cuti::where('posisi', $id_juu)
            ->where('status', STATUS_CUTI_PROSES)
            ->orderBy('updated_at', 'desc')
            ->get();

        $data_cuti = [];
        foreach ($daftar_cuti as $cuti) {
            $durasi = 0;
            $durasi = $cuti->jenisCuti->id_jenis_hari_cuti == JENIS_HARI_CUTI_HARI_KERJA ? sizeof($this->tanggalCutiBersihHariKerja(CarbonPeriod::create($cuti->tanggal_awal, $cuti->tanggal_akhir))) : CarbonPeriod::create($cuti->tanggal_awal, $cuti->tanggal_akhir)->count();

            $data_cuti[] = (object) [
                'id' => $cuti->id,
                'keterangan' => trim($cuti->keterangan),
                'tanggal_awal' => isset($cuti->tanggal_awal) ? date('Y-m-d', strtotime($cuti->tanggal_awal)) : '',
                'tanggal_akhir' => isset($cuti->tanggal_akhir) ? date('Y-m-d', strtotime($cuti->tanggal_akhir)) : '',
                'nama_tanggal_awal' => isset($cuti->tanggal_awal) ? $this->convertToIndonesiaDate(strtotime($cuti->tanggal_awal)) : '',
                'nama_tanggal_akhir' => isset($cuti->tanggal_akhir) ? $this->convertToIndonesiaDate(strtotime($cuti->tanggal_akhir)) : '',
                'id_jenis_cuti' => $cuti->id_jenis_cuti,
                'nama_jenis_cuti' => $cuti->jenisCuti->nama,
                'pengusul' => $this->convertNamaPejabat($cuti->createdBy),
                'durasi' => $durasi,
                'nama_pengusul' => $cuti->createdBy->user->profil_user->nama,
                'nama_waktu_buat' => $this->convertToIndonesiaTime(strtotime($cuti->created_at)),
                'nama_waktu_ubah' => $this->convertToIndonesiaTime(strtotime($cuti->updated_at)),
                'waktu_ubah' => date('Y-m-d H:i:s', strtotime($cuti->updated_at))
            ];
        }

        return $data_cuti;
    }

    protected function drafCutiSelesai($id_juu = NULL)
    {
        if ($id_juu == NULL) return [];

        $daftar_cuti = Cuti::where('created_by', $id_juu)
            ->where('status', STATUS_CUTI_DISETUJUI)
            ->orderBy('updated_at', 'desc')
            ->get();

        $data_cuti = [];
        foreach ($daftar_cuti as $cuti) {
            $durasi = 0;
            $durasi = $cuti->jenisCuti->id_jenis_hari_cuti == JENIS_HARI_CUTI_HARI_KERJA ? sizeof($this->tanggalCutiBersihHariKerja(CarbonPeriod::create($cuti->tanggal_awal, $cuti->tanggal_akhir))) : CarbonPeriod::create($cuti->tanggal_awal, $cuti->tanggal_akhir)->count();

            $data_cuti[] = (object) [
                'id' => $cuti->id,
                'keterangan' => trim($cuti->keterangan),
                'tanggal_awal' => isset($cuti->tanggal_awal) ? date('Y-m-d', strtotime($cuti->tanggal_awal)) : '',
                'tanggal_akhir' => isset($cuti->tanggal_akhir) ? date('Y-m-d', strtotime($cuti->tanggal_akhir)) : '',
                'nama_tanggal_awal' => isset($cuti->tanggal_awal) ? $this->convertToIndonesiaDate(strtotime($cuti->tanggal_awal)) : '',
                'nama_tanggal_akhir' => isset($cuti->tanggal_akhir) ? $this->convertToIndonesiaDate(strtotime($cuti->tanggal_akhir)) : '',
                'nomor' => $cuti->hasPenomoranCuti->nomor,
                'durasi' => $durasi,
                'id_jenis_cuti' => $cuti->id_jenis_cuti,
                'nama_jenis_cuti' => $cuti->jenisCuti->nama,
                'nama_waktu_buat' => $this->convertToIndonesiaTime(strtotime($cuti->created_at)),
                'nama_waktu_ubah' => $this->convertToIndonesiaTime(strtotime($cuti->updated_at)),
                'waktu_ubah' => date('Y-m-d H:i:s', strtotime($cuti->updated_at))
            ];
        }

        return $data_cuti;
    }

    protected function drafCutiDitolak($id_juu = NULL)
    {
        if ($id_juu == NULL) return [];

        $daftar_cuti = Cuti::where('created_by', $id_juu)
            ->where('status', STATUS_CUTI_DITOLAK)
            ->orderBy('updated_at', 'desc')
            ->get();

        $data_cuti = [];
        foreach ($daftar_cuti as $cuti) {
            $durasi = 0;
            $durasi = $cuti->jenisCuti->id_jenis_hari_cuti == JENIS_HARI_CUTI_HARI_KERJA ? sizeof($this->tanggalCutiBersihHariKerja(CarbonPeriod::create($cuti->tanggal_awal, $cuti->tanggal_akhir))) : CarbonPeriod::create($cuti->tanggal_awal, $cuti->tanggal_akhir)->count();

            $data_cuti[] = (object) [
                'id' => $cuti->id,
                'keterangan' => trim($cuti->keterangan),
                'tanggal_awal' => isset($cuti->tanggal_awal) ? date('Y-m-d', strtotime($cuti->tanggal_awal)) : '',
                'tanggal_akhir' => isset($cuti->tanggal_akhir) ? date('Y-m-d', strtotime($cuti->tanggal_akhir)) : '',
                'nama_tanggal_awal' => isset($cuti->tanggal_awal) ? $this->convertToIndonesiaDate(strtotime($cuti->tanggal_awal)) : '',
                'nama_tanggal_akhir' => isset($cuti->tanggal_akhir) ? $this->convertToIndonesiaDate(strtotime($cuti->tanggal_akhir)) : '',
                'alasan' => trim($cuti->hasRiwayatCuti->where('id_aksi_cuti', AKSI_CUTI_TOLAK)->first()->keterangan),
                'id_jenis_cuti' => $cuti->id_jenis_cuti,
                'durasi' => $durasi,
                'nama_jenis_cuti' => $cuti->jenisCuti->nama,
                'nama_waktu_buat' => $this->convertToIndonesiaTime(strtotime($cuti->created_at)),
                'nama_waktu_ubah' => $this->convertToIndonesiaTime(strtotime($cuti->updated_at)),
                'waktu_ubah' => date('Y-m-d H:i:s', strtotime($cuti->updated_at))
            ];
        }

        return $data_cuti;
    }

    protected function drafCutiDibatalkan($id_juu = NULL)
    {
        if ($id_juu == NULL) return [];

        $daftar_cuti = Cuti::where('created_by', $id_juu)
            ->where('status', STATUS_CUTI_BATAL)
            ->orderBy('updated_at', 'desc')
            ->get();

        $data_cuti = [];
        foreach ($daftar_cuti as $cuti) {
            $durasi = 0;
            $durasi = $cuti->jenisCuti->id_jenis_hari_cuti == JENIS_HARI_CUTI_HARI_KERJA ? sizeof($this->tanggalCutiBersihHariKerja(CarbonPeriod::create($cuti->tanggal_awal, $cuti->tanggal_akhir))) : CarbonPeriod::create($cuti->tanggal_awal, $cuti->tanggal_akhir)->count();

            $data_cuti[] = (object) [
                'id' => $cuti->id,
                'keterangan' => trim($cuti->keterangan),
                'tanggal_awal' => isset($cuti->tanggal_awal) ? date('Y-m-d', strtotime($cuti->tanggal_awal)) : '',
                'tanggal_akhir' => isset($cuti->tanggal_akhir) ? date('Y-m-d', strtotime($cuti->tanggal_akhir)) : '',
                'nama_tanggal_awal' => isset($cuti->tanggal_awal) ? $this->convertToIndonesiaDate(strtotime($cuti->tanggal_awal)) : '',
                'nama_tanggal_akhir' => isset($cuti->tanggal_akhir) ? $this->convertToIndonesiaDate(strtotime($cuti->tanggal_akhir)) : '',
                'id_jenis_cuti' => $cuti->id_jenis_cuti,
                'durasi' => $durasi,
                'nama_jenis_cuti' => $cuti->jenisCuti->nama,
                'nama_waktu_buat' => $this->convertToIndonesiaTime(strtotime($cuti->created_at)),
                'nama_waktu_ubah' => $this->convertToIndonesiaTime(strtotime($cuti->updated_at)),
                'waktu_ubah' => date('Y-m-d H:i:s', strtotime($cuti->updated_at))
            ];
        }

        return $data_cuti;
    }

    protected function rekapCuti($id_juu = NULL, $tanggal_awal = NULL, $tanggal_akhir = NULL)
    {
        $daftar_unit = PenerimaCuti::where('id_juu', $id_juu)->pluck('id_unit');

        if (in_array(ID_KANTOR_PUSAT, $daftar_unit->toArray())) $daftar_cuti = Cuti::where('status', STATUS_CUTI_DISETUJUI);
        else {
            $daftar_juu = JabatanUnitUser::where(function ($query) use ($daftar_unit) {
                    $query->where(function ($q1) use ($daftar_unit) { $q1->whereIn('id_jabatan_unit', JabatanUnit::whereIn('id_unit', $daftar_unit)->pluck('id'))->whereNull('id_unit_khusus'); })
                        ->orWhere(function ($q2) use ($daftar_unit) { $q2->whereIn('id_unit_khusus', $daftar_unit); });
                })
                ->where('id_jenis_juu', JENIS_JKU_ASLI)
                ->pluck('id');

            $daftar_cuti = Cuti::where('status', STATUS_CUTI_DISETUJUI)->whereIn('created_by', $daftar_juu);
        }

        if ($tanggal_awal AND $tanggal_akhir) $daftar_cuti = $daftar_cuti->where('updated_at', '>=', date('Y-m-d', strtotime($tanggal_awal)) . ' 00:00:00')->where('updated_at', '<=', date('Y-m-d', strtotime($tanggal_akhir)) . ' 23:59:59');
        elseif ($tanggal_awal) $daftar_cuti = $daftar_cuti->where('updated_at', '>=', date('Y-m-d', strtotime($tanggal_awal)) . ' 00:00:00')->where('updated_at', '<=', date('Y-m-d', strtotime($tanggal_awal)) . ' 23:59:59');
        elseif ($tanggal_akhir) $daftar_cuti = $daftar_cuti->where('updated_at', '>=', date('Y-m-d', strtotime($tanggal_akhir)) . ' 00:00:00')->where('updated_at', '<=', date('Y-m-d', strtotime($tanggal_akhir)) . ' 23:59:59');

        $daftar_cuti = $daftar_cuti->orderBy('updated_at', 'desc')->get();

        $data_cuti = [];
        foreach ($daftar_cuti as $cuti) {
            $durasi = 0;
            $durasi = $cuti->jenisCuti->id_jenis_hari_cuti == JENIS_HARI_CUTI_HARI_KERJA ? sizeof($this->tanggalCutiBersihHariKerja(CarbonPeriod::create($cuti->tanggal_awal, $cuti->tanggal_akhir))) : CarbonPeriod::create($cuti->tanggal_awal, $cuti->tanggal_akhir)->count();

            $data_cuti[] = [
                'id' => $cuti->id,
                'nama_jenis_cuti' => $cuti->jenisCuti->nama,
                'tanggal_pengajuan' => $this->convertToIndonesiaDate(strtotime($cuti->hasRiwayatCuti->where('id_aksi_cuti', AKSI_CUTI_KIRIM)->first()->created_at)),
                'tanggal_disetujui' => $this->convertToIndonesiaDate(strtotime($cuti->approved_at)),
                'tanggal_awal' => $this->convertToIndonesiaDate(strtotime($cuti->tanggal_awal)),
                'tanggal_akhir' => $this->convertToIndonesiaDate(strtotime($cuti->tanggal_akhir)),
                'keterangan' => trim($cuti->keterangan),
                'nomor' => $cuti->hasPenomoranCuti->nomor,
                'durasi' => $durasi,
                'pengusul' => $this->convertNamaPejabat($cuti->createdBy),
                'nama_pengusul' => $cuti->createdBy->user->profil_user->nama,
                'order_by' => date('Y-m-d H:i:s', strtotime($cuti->approved_at)),
            ];
        }

        return $data_cuti;
    }

    protected function notifikasiPengajuCuti($cuti = NULL) {
        if (is_null($cuti)) return false;

        $riwayat_cuti = $cuti->hasRiwayatCuti->last();

        $link = $cuti->status == STATUS_CUTI_DISETUJUI ? 'e-hrd/e-cuti/list/selesai/all' : 'e-hrd/e-cuti/list/ditolak/all';

        $data_email = [
            'nama_pemeriksa' => $riwayat_cuti->juu->user->profil_user->nama,
            'jabatan_unit_pemeriksa' => $this->convertNamaPejabat($riwayat_cuti->juu),
            'jenis_cuti' => $riwayat_cuti->cuti->jenisCuti->nama,
            'tanggal_awal' => $this->convertToIndonesiaDate(strtotime($cuti->tanggal_awal)),
            'tanggal_akhir' => $this->convertToIndonesiaDate(strtotime($cuti->tanggal_akhir)),
            'detail' => $riwayat_cuti->id_aksi_cuti == AKSI_CUTI_SETUJU ? 'disetujui' : 'ditolak',
            'nama_pengaju' => $cuti->createdBy->user->profil_user->nama,
            'jabatan_unit_pengaju' => $this->convertNamaPejabat($cuti->createdBy)
        ];

        if (isset($cuti->createdBy->user->profil_user->email) AND $cuti->createdBy->user->is_notified == true) {
            $data_email['link'] = env('FRONTEND_URL') . $link;

            Mail::send('email.cuti.pengaju', $data_email, function($message) use ($cuti) {
                $message->to($cuti->createdBy->user->profil_user->email, $cuti->createdBy->user->profil_user->nama)
                        ->subject('[OA] Persetujuan Cuti');
                $message->from(env('MAIL_FROM_ADDRESS'),env('MAIL_FROM_NAME'));
            });
        }

        // $pengaktivasi_sekretaris = PengaktivasiSekretaris::where('id_juu', $surat->created_by)->first();
        // if ($pengaktivasi_sekretaris AND AktivasiSekretaris::where('id_pengaktivasi_sekretaris', $pengaktivasi_sekretaris->id)->whereIn('id_tipe_aktivasi', AKTIVASI_SEKRETARIS_PENERBITAN)->count()) {
        //     $aktivasi_sekretaris = AktivasiSekretaris::where('id_pengaktivasi_sekretaris', $pengaktivasi_sekretaris->id)->whereIn('id_tipe_aktivasi', AKTIVASI_SEKRETARIS_PENERBITAN)->first();
        //
        //     if (isset($aktivasi_sekretaris->juu_sekretaris->user->profil_user->email) AND $aktivasi_sekretaris->juu_sekretaris->user->is_notified == true AND !in_array($surat->id_sifat_surat, SIFAT_SURAT_RAHASIA)) {
        //         $data_pembuat += [
        //                 'link' => env('FRONTEND_URL') . 'e-letter/secretary/outbox/perlu-proses/all',
        //                 'nama_sekretaris' => $aktivasi_sekretaris->juu_sekretaris->user->profil_user->nama,
        //                 'jabatan_unit_sekretaris' => $this->convertNamaPejabat($aktivasi_sekretaris->juu_sekretaris)
        //             ];
        //
        //         Mail::send('email.surat.sekretaris.pemeriksa', $data_pemeriksa, function($message) use ($aktivasi_sekretaris) {
        //             $message->to($aktivasi_sekretaris->juu_sekretaris->user->profil_user->email, $aktivasi_sekretaris->juu_sekretaris->user->profil_user->nama)
        //                     ->subject('[OA] Sekretaris - Surat Butuh Proses');
        //             $message->from(env('MAIL_FROM_ADDRESS'),env('MAIL_FROM_NAME'));
        //         });
        //     }
        // }

        return true;
    }

    protected function notifikasiRekapCuti($cuti = NULL) {
        if (is_null($cuti)) return false;

        $riwayat_cuti = $cuti->hasRiwayatCuti->last();

        $link = 'admin-hrd/management/ecuti/all';
        
        $id_unit_pembuat = $cuti->createdBy->jabatan_unit->id_unit;
        $id_juu_penerima = PenerimaCuti::where('id_unit', $id_unit_pembuat)->get()[0]->id_juu;
        $user_id_penerima = JabatanUnitUser::where('id', $id_juu_penerima)->get()[0]->id_user;
        
        $email_penerima = ProfilUser::where("id_user", $user_id_penerima)->get()[0]->email;
        $nama_penerima = ProfilUser::where("id_user", $user_id_penerima)->get()[0]->nama;
        $id_jabatan_unit = JabatanUnitUser::where("id", $id_juu_penerima)->get()[0]->id_jabatan_unit;
        $id_jabatan = JabatanUnit::where("id", $id_jabatan_unit)->get()[0]->id_jabatan;
        $nama_jabatan = Jabatan::where("id", $id_jabatan)->get()[0]->nama;
        $notified = User::where("id", $user_id_penerima)->get()[0]->is_notified;

        $data_email = [
            'nama_pemeriksa' => $nama_penerima,
            'jabatan_unit_pemeriksa' => $nama_jabatan,
            'jenis_cuti' => $riwayat_cuti->cuti->jenisCuti->nama,
            'tanggal_awal' => $this->convertToIndonesiaDate(strtotime($cuti->tanggal_awal)),
            'tanggal_akhir' => $this->convertToIndonesiaDate(strtotime($cuti->tanggal_akhir)),
            'detail' => $riwayat_cuti->id_aksi_cuti == AKSI_CUTI_SETUJU ? 'disetujui' : 'ditolak',
            'nama_pengaju' => $cuti->createdBy->user->profil_user->nama,
            'jabatan_unit_pengaju' => $this->convertNamaPejabat($cuti->createdBy)
        ];

        if(isset($email_penerima) AND $notified == true) {
            $data_email['link'] = env('FRONTEND_URL') . $link;

            Mail::send('email.cuti.selesai', $data_email, function($message) use ($email_penerima, $nama_penerima) {
                $message->to($email_penerima, $nama_penerima)
                        ->subject('[OA] Cuti Selesai');
                $message->from(env('MAIL_FROM_ADDRESS'),env('MAIL_FROM_NAME'));
            });
        }

        // $pengaktivasi_sekretaris = PengaktivasiSekretaris::where('id_juu', $surat->created_by)->first();
        // if ($pengaktivasi_sekretaris AND AktivasiSekretaris::where('id_pengaktivasi_sekretaris', $pengaktivasi_sekretaris->id)->whereIn('id_tipe_aktivasi', AKTIVASI_SEKRETARIS_PENERBITAN)->count()) {
        //     $aktivasi_sekretaris = AktivasiSekretaris::where('id_pengaktivasi_sekretaris', $pengaktivasi_sekretaris->id)->whereIn('id_tipe_aktivasi', AKTIVASI_SEKRETARIS_PENERBITAN)->first();
        //
        //     if (isset($aktivasi_sekretaris->juu_sekretaris->user->profil_user->email) AND $aktivasi_sekretaris->juu_sekretaris->user->is_notified == true AND !in_array($surat->id_sifat_surat, SIFAT_SURAT_RAHASIA)) {
        //         $data_pembuat += [
        //                 'link' => env('FRONTEND_URL') . 'e-letter/secretary/outbox/perlu-proses/all',
        //                 'nama_sekretaris' => $aktivasi_sekretaris->juu_sekretaris->user->profil_user->nama,
        //                 'jabatan_unit_sekretaris' => $this->convertNamaPejabat($aktivasi_sekretaris->juu_sekretaris)
        //             ];
        //
        //         Mail::send('email.surat.sekretaris.pemeriksa', $data_pemeriksa, function($message) use ($aktivasi_sekretaris) {
        //             $message->to($aktivasi_sekretaris->juu_sekretaris->user->profil_user->email, $aktivasi_sekretaris->juu_sekretaris->user->profil_user->nama)
        //                     ->subject('[OA] Sekretaris - Surat Butuh Proses');
        //             $message->from(env('MAIL_FROM_ADDRESS'),env('MAIL_FROM_NAME'));
        //         });
        //     }
        // }

        return true;
    }

    protected function notifikasiPemeriksaCuti($cuti = NULL)
    {
        if (is_null($cuti)) return false;

        $link = 'e-hrd/e-cuti/approval/butuh-proses/' . $cuti->id;
        $data_email = [
            'nama_pemeriksa' => $cuti->juuPosisi->user->profil_user->nama,
            'jabatan_unit_pemeriksa' => $this->convertNamaPejabat($cuti->juuPosisi),
            'jenis_cuti' => $cuti->jenisCuti->nama,
            'tanggal_awal' => $this->convertToIndonesiaDate(strtotime($cuti->tanggal_awal)),
            'tanggal_akhir' => $this->convertToIndonesiaDate(strtotime($cuti->tanggal_akhir)),
            'nama_pengaju' => $cuti->createdBy->user->profil_user->nama,
            'jabatan_unit_pengaju' => $this->convertNamaPejabat($cuti->createdBy)
        ];

        if (isset($cuti->juuPosisi->user->profil_user->email) AND $cuti->juuPosisi->user->is_notified == true) {
            $data_email['link'] = env('FRONTEND_URL') . $link;

            Mail::send('email.cuti.pemeriksa', $data_email, function($message) use ($cuti) {
                $message->to($cuti->juuPosisi->user->profil_user->email, $cuti->juuPosisi->user->profil_user->nama)
                        ->subject('[OA] Cuti Butuh Proses');
                $message->from(env('MAIL_FROM_ADDRESS'),env('MAIL_FROM_NAME'));
            });
        }

        // $pengaktivasi_sekretaris = PengaktivasiSekretaris::where('id_juu', $surat->posisi)->first();
        // if ($pengaktivasi_sekretaris AND AktivasiSekretaris::where('id_pengaktivasi_sekretaris', $pengaktivasi_sekretaris->id)->whereIn('id_tipe_aktivasi', AKTIVASI_SEKRETARIS_PENERBITAN)->count()) {
        //     $aktivasi_sekretaris = AktivasiSekretaris::where('id_pengaktivasi_sekretaris', $pengaktivasi_sekretaris->id)->whereIn('id_tipe_aktivasi', AKTIVASI_SEKRETARIS_PENERBITAN)->first();
        //
        //     if (isset($aktivasi_sekretaris->juu_sekretaris->user->profil_user->email) AND $aktivasi_sekretaris->juu_sekretaris->user->is_notified == true AND !in_array($surat->id_sifat_surat, SIFAT_SURAT_RAHASIA)) {
        //         $data_pemeriksa += [
        //                 'link' => env('FRONTEND_URL') . 'e-letter/secretary/outbox/perlu-proses/all',
        //                 'nama_sekretaris' => $aktivasi_sekretaris->juu_sekretaris->user->profil_user->nama,
        //                 'jabatan_unit_sekretaris' => $this->convertNamaPejabat($aktivasi_sekretaris->juu_sekretaris)
        //             ];
        //
        //         Mail::send('email.surat.sekretaris.pemeriksa', $data_pemeriksa, function($message) use ($aktivasi_sekretaris) {
        //             $message->to($aktivasi_sekretaris->juu_sekretaris->user->profil_user->email, $aktivasi_sekretaris->juu_sekretaris->user->profil_user->nama)
        //                     ->subject('[OA] Sekretaris - Surat Butuh Proses');
        //             $message->from(env('MAIL_FROM_ADDRESS'),env('MAIL_FROM_NAME'));
        //         });
        //     }
        // }

        return true;
    }

    protected function generatePDFCuti($cuti = NULL, $header_footer = true, $qrcode = true)
    {
        if (is_null($cuti)) return '';

        $html = '
        <html>
            <head>
                <style>
                    @page { header: page-header; footer: page-footer; }
                    @page :first { header: page-header-first; footer: page-footer-first; }
                    #header { padding-bottom: 50px; }
                    body { font-family: calibri, sans-serif;  font-size: 13px; }
                </style>
            </head>
            <body>';

        $header_html = '';
        if ($header_footer) {
            $header_html = '
            <htmlpageheader name="page-header-first" id="header">
                <table class="no-border" width="100%" cellspacing="2" cellpadding="0" border="0" align="left" bgcolor="#ffffff">
                    <tr bgcolor="#ffffff" >
                        <td width="17%" ></td>
                        <td width="15%"  style="text-align: center">
                            <img  src="' . base_path('public/cuti/logo.PNG') . '">
                        </td>
                        <td width="50%" style="text-align: center">
                            <p style="font-weight: bold; font-size: 30px; text-align: center; color:#44546A">PT Sumber Segara Primadaya </p>
                        </td>
                        <td width="18%" ></td>
                    </tr>
                </table>
            </htmlpageheader>
            <htmlpageheader name="page-header" id="header">
                <table class="no-border" width="100%" cellspacing="2" cellpadding="0" border="0" align="left" bgcolor="#ffffff">
                    <tr bgcolor="#ffffff" >
                        <td width="50%" >
                            <p style="font-weight: bold; font-size: 20px; text-align: center; color:#677D89; border-bottom: 3px solid #D3998E; padding: 0 0 7px;">PT Sumber Segara Primadaya </p>
                        </td>
                        <td width="50%" style="text-align: center"></td>
                    </tr>
                </table>
            </htmlpageheader>';
        } else {
            $header_html = '
            <htmlpageheader name="page-header" id="header">
                <p></p>
            </htmlpageheader>';
        }

        $header_html .= '
                <div style="text-align: center;">
                    <div style="padding-bottom: 40px;"></div>
                    <h2>
                        <span style="border-bottom-width: 2px; border-bottom-style: solid; padding-bottom: 3px">
                            PENGAJUAN CUTI
                        </span>
                    </h2>
                </div>';

        $flag = 0;
        $pengaju_html = '
                <div style="margin-left: 50px;margin-top: 10px;">
                    <table class="no-border" width="100%" cellspacing="2" cellpadding="0" border="0" align="left" bgcolor="#ffffff">
                        <tr bgcolor="#ffffff">
                            <td width="12%" height="20" valign="top" style="padding-top:0px;">Nama</td>
                            <td width="2%" valign="top" style="padding-top:0px;">: </td>
                            <td width="50%" style="padding-top:0px;">' . $cuti->createdBy->user->profil_user->nama . '</td>
                            <td width="12%" height="20" valign="top" style="padding-top:0px;">Tanggal</td>
                            <td width="2%" valign="top" style="padding-top:0px;">: </td>
                            <td width="24%" style="padding-top:0px;">' . $this->convertToIndonesiaDate(strtotime($cuti->approved_at)) . '</td>
                        </tr>
                        <tr bgcolor="#ffffff">
                            <td width="12%" height="20" valign="top">Jabatan</td>
                            <td width="2%" valign="top">: </td>
                            <td width="50%">' . $this->convertNamaPejabat($cuti->createdBy) . '</td>
                            <td width="12%" height="20" valign="top">Nomor</td>
                            <td width="2%" valign="top">: </td>
                            <td width="24%">' . $cuti->hasPenomoranCuti->nomor . '</td>
                        </tr>
                        <tr bgcolor="#ffffff">
                            <td width="12%" height="20" valign="top">Jenis Cuti</td>
                            <td width="2%" valign="top">: </td>
                            <td width="50%">' . (isset($cuti->jenisCuti->parent) ? trim($cuti->jenisCuti->parent->nama) . ' (' . str_replace('Cuti ', '', trim($cuti->jenisCuti->nama)) . ')' : trim($cuti->jenisCuti->nama) ) . '</td>
                            <td width="12%" ></td>
                            <td width="2%" ></td>
                            <td width="24%" ></td>
                        </tr>
                    </table>
                </div>';

        $pengajuan_html = '
                <div style="margin-left: 50px">
                    <table class="no-border" width="100%" cellspacing="2" cellpadding="0" border="0" align="left" bgcolor="#ffffff">
                        <tr><td width="100%"><br></td></tr>
                        <tr><td width="100%">Mengajukan cuti dengan rincian sebagai berikut :</td></tr>
                        <tr><td width="100%"><br></td></tr>
                    </table>
                </div>';

        $durasi = 0;
        $durasi = $cuti->jenisCuti->id_jenis_hari_cuti == JENIS_HARI_CUTI_HARI_KERJA ? sizeof($this->tanggalCutiBersihHariKerja(CarbonPeriod::create($cuti->tanggal_awal, $cuti->tanggal_akhir))) : CarbonPeriod::create($cuti->tanggal_awal, $cuti->tanggal_akhir)->count();

        $data_html = '
                <div style="margin-left: 50px">
                    <table class="no-border" width="100%" cellspacing="2" cellpadding="0" border="0" align="left" bgcolor="#ffffff">
                        ' . (isset($cuti->tanggal) ? '
                        <tr bgcolor="#ffffff">
                            <td width="20%" height="20" valign="top">Tanggal Kejadian</td>
                            <td width="2%" valign="top">: </td>
                            <td width="73%">' . (isset($cuti->tanggal) ? $this->convertToIndonesiaDate(strtotime($cuti->tanggal)) : '') . '</td>
                            <td width="5%" ></td>
                        </tr>
                        ' : '') . '
                        <tr bgcolor="#ffffff">
                            <td width="20%" height="20" valign="top">Tanggal Cuti</td>
                            <td width="2%" valign="top">: </td>
                            <td width="73%">' . ($cuti->tanggal_awal == $cuti->tanggal_akhir ? $this->convertToIndonesiaDate(strtotime($cuti->tanggal_awal)) : $this->convertToIndonesiaDate(strtotime($cuti->tanggal_awal)) . ' s.d ' . $this->convertToIndonesiaDate(strtotime($cuti->tanggal_akhir))) . '</td>
                            <td width="5%" ></td>
                        </tr>
                        <tr bgcolor="#ffffff">
                            <td width="20%" height="20" valign="top">Durasi Cuti</td>
                            <td width="2%" valign="top">: </td>
                            <td width="73%">' . $durasi . ' hari</td>
                            <td width="5%" ></td>
                        </tr>
                        ' . (trim($cuti->keterangan) != "" ? '
                        <tr bgcolor="#ffffff">
                            <td width="20%" height="20" valign="top">Keperluan Cuti</td>
                            <td width="2%" valign="top">: </td>
                            <td width="73%">' . trim($cuti->keterangan) . '</td>
                            <td width="5%" ></td>
                        </tr>
                        ' : '') . '
                    </table>
                </div>
                <div style="margin-left: 50px">
                    <table class="no-border" width="100%" cellspacing="2" cellpadding="0" border="0" align="left" bgcolor="#ffffff">
                        <tr><td width="100%"><br></td></tr>
                        <tr><td width="100%"><br></td></tr>
                    </table>
                </div>';

        $html .= $header_html . $pengaju_html . $pengajuan_html . $data_html;

        $nomor_pemeriksa = 0;
        $penyetuju = '';
        foreach ($cuti->hasPemeriksaCuti as $pemeriksa_cuti) {
            $riwayat_cuti = RiwayatCuti::where('id_cuti', $pemeriksa_cuti->id_cuti)->where('id_juu', $pemeriksa_cuti->id_juu_pemeriksa)->where('id_aksi_cuti', AKSI_CUTI_SETUJU)->first();
            $penyetuju .= '
                <td width="31%" style="text-align: center">
                    <p style="text-align: center; padding-bottom: 10px;">Disetujui oleh :</p>
                    <p style="text-align: center; padding-bottom: 10px;">Tanggal : ' . (isset($riwayat_cuti) ? $this->convertToIndonesiaDate(strtotime($riwayat_cuti->created_at)) : '-') . '</p>
                    <div style="width: 100%; margin-top: 30px; text-align:center; margin-bottom: 5px">
                        <img style="width: 100px; margin-top: 10px; margin-bottom: 10px;" src="' . (isset($pemeriksa_cuti->path) ? base_path($pemeriksa_cuti->path) : base_path('public/cuti/pemeriksa.png')) . '">
                    </div>
                    <p style="text-align: center; font-weight: bold; padding-bottom: 0px; padding-top: 5px">
                        <span style="border-bottom-width: 2px; border-bottom-style: solid; padding-bottom: 10px">
                            '.(isset($pemeriksa_cuti->juuPemeriksa->user->profil_user->nama) ? $pemeriksa_cuti->juuPemeriksa->user->profil_user->nama : "kosong").'
                        </span>
                    </p>
                    <p style="text-align: center">
                        '.(isset($pemeriksa_cuti->juuPemeriksa->jabatan_unit->jabatan->nama) ? $pemeriksa_cuti->juuPemeriksa->jabatan_unit->jabatan->nama : "-").'
                    </p>
                </td>
            ';
        }
        $ttd_html = '
            <div style="height: 150px; margin-left: 50px;margin-right: 0px;margin-top: 30px;text-align:justify;padding-bottom:0px;">
                <table class="no-border" style="margin-top: 0px;" width="100%" cellspacing="2" cellpadding="0" border="0" align="right" bgcolor="#ffffff">
                    <tr bgcolor="#ffffff">
                        <td width="31%" style="text-align: center">
                            <p style="text-align: center; padding-bottom: 10px;">Diajukan oleh :</p>
                            <p style="text-align: center; padding-bottom: 10px;">Tanggal : ' . (is_null($cuti->hasRiwayatCuti->where('id_aksi_cuti', AKSI_CUTI_KIRIM)->first()) ? '-' : $this->convertToIndonesiaDate(strtotime($cuti->hasRiwayatCuti->where('id_aksi_cuti', AKSI_CUTI_KIRIM)->first()->created_at))) . '</p>
                            <div style="width: 100%; margin-top: 30px; text-align:center; padding-bottom: 5px">
                                <img style="width: 100px; margin-top: 10px; margin-bottom: 10px;" src="' . (isset($cuti->hasQRCodECuti->path) ? base_path($cuti->hasQRCodECuti->path) : base_path('public/cuti/pengusul.png')) . '">
                            </div>
                            <p style="text-align: center; font-weight: bold; padding-bottom: 0px; padding-top: 5px">
                                <span style="border-bottom-width: 2px; border-bottom-style: solid; padding-bottom: 10px">
                                    '.(isset($cuti->createdBy->user->profil_user->nama) ? $cuti->createdBy->user->profil_user->nama : "kosong").'
                                </span>
                            </p>
                            <p style="text-align: center">
                                '.(isset($cuti->createdBy->jabatan_unit->jabatan->nama) ? $cuti->createdBy->jabatan_unit->jabatan->nama : "-").'
                            </p>
                        </td>
                        ' . $penyetuju . '
                    </tr>
                </table>
            </div>';

        $footer_html = '';
        if ($header_footer) {
            $footer_html = '
            <htmlpagefooter name="page-footer-first">
            <table class="no-border" width="100%" cellspacing="2" cellpadding="0" border="0" align="left" bgcolor="#ffffff">
                <tr bgcolor="#ffffff" >
                        <td width="7%" style="text-align: center">

                        </td>
                        <td width="84%" style="text-align: center;">
                            <p style="font-weight: bold; font-size: 20px; text-align: center; color:white; border-bottom: 2px solid #D3998E; padding: 0 0 7px;">xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx</p>
                            <p style="font-size: 12px; text-align: center;  padding: 0 0 3px;">
                            Head Office : Treasury Tower 39<sup>th</sup> FI. District 8 SCBD Lot 28, Jl. Jend. Sudirman Kav 52-53 Jakarta 12190
                            </p>
                            <p style="font-size: 12px; text-align: center;  padding: 0 0 3px;">
                            Telp : +62 21 2912 6888 Fax: +62 21 2912 6886 E-Mail : jakarta@ssprimadaya.co.id
                            </p>
                            <p style="font-size: 12px; text-align: center;  padding: 0 0 3px;">
                            Site Office : Jl. Lingkar Timur Desa Karangkandri Kec.Kesugihan Cilacap Jawa Tengah
                            </p>
                            <p style="font-size: 12px; text-align: center;  padding: 0 0 3px;">
                            Telp: +62 282 549555 Fax: +62 282 538863 E-mail : cilacap@ssprimadaya.co.id
                            </p>
                            <p style="font-size: 12px; text-align: center;  padding: 0 0 3px;">
                            www.ssprimadaya.co.id
                            </p>
                        </td>
                        <td width="7%" style="text-align: center">

                        </td>

                </tr>
            </table>

        </htmlpagefooter>
        <htmlpagefooter name="page-footer">

        </htmlpagefooter>';
        } else {
            $footer_html = '
                <htmlpagefooter name="page-footer">
                   <p></p>
                </htmlpagefooter>';
        }

        $html .= $ttd_html . $footer_html;

        $html .= '
            </body>
        </html>';

        return $html;
    }
}
