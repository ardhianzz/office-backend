<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Mail;

use App\Models\Master\User;
use App\Models\Master\Unit;
use App\Models\Master\JabatanUnit;
use App\Models\Master\JabatanUnitUser;
use App\Models\Master\Tanggungan;
use App\Models\EReimburse\Reimburse;
use App\Models\EReimburse\PejabatPemeriksaReimburse;

trait ReimburseHelper
{
    protected function ubahStatusTanggunganKaryawan($karyawan = NULL)
    {
        if (is_null($karyawan)) return NULL;

        $jumlah_anak = $karyawan->hasTanggungan->where('status_hubungan_tanggungan', STATUS_HUBUNGAN_TANGGUNGAN_ANAK)->count();
        if ($karyawan->hasTanggungan->where('status_hubungan_tanggungan', STATUS_HUBUNGAN_TANGGUNGAN_PASANGAN)->count()) {
            if ($jumlah_anak == 3) return STATUS_TANGGUNGAN_K3;
            elseif ($jumlah_anak == 2) return STATUS_TANGGUNGAN_K2;
            elseif ($jumlah_anak == 1) return STATUS_TANGGUNGAN_K1;
            else return STATUS_TANGGUNGAN_K;
        } else {
            if ($jumlah_anak == 3) return STATUS_TANGGUNGAN_TK3;
            elseif ($jumlah_anak == 2) return STATUS_TANGGUNGAN_TK2;
            elseif ($jumlah_anak == 1) return STATUS_TANGGUNGAN_TK1;
            else return STATUS_TANGGUNGAN_TK;
        }
    }

    protected function drafReimburse($id_juu = NULL)
    {
        if ($id_juu == NULL) return [];

        $daftar_reimburse = Reimburse::where('created_by', $id_juu)
            ->where('posisi', 0)
            ->where('status', STATUS_REIMBURSE_DRAF)
            ->orderBy('updated_at', 'desc')
            ->get();

        $data_reimburse = [];
        foreach ($daftar_reimburse as $reimburse) {
            $data_reimburse[] = (object) [
                'id' => $reimburse->id,
                'total' => $reimburse->total,
                'nama_waktu_buat' => $this->convertToIndonesiaTime(strtotime($reimburse->created_at)),
                'nama_waktu_ubah' => $this->convertToIndonesiaTime(strtotime($reimburse->updated_at)),
                'waktu_ubah' => date('Y-m-d H:i:s', strtotime($reimburse->updated_at))
            ];
        }

        return $data_reimburse;
    }

    protected function drafReimburseMonitor($id_juu = NULL)
    {
        if ($id_juu == NULL) return [];

        $daftar_reimburse = Reimburse::has('hasRiwayatReimburse')
            ->where('created_by', $id_juu)
            ->where('posisi', '<>', 0)
            ->whereIn('status', [STATUS_REIMBURSE_PROSES, STATUS_REIMBURSE_DISETUJUI, STATUS_REIMBURSE_DIAJUKAN])
            ->orderBy('updated_at', 'desc')
            ->get();

        $data_reimburse = [];
        foreach ($daftar_reimburse as $reimburse) {
            $tarik = false;
            if ($id_juu == $reimburse->created_by AND $reimburse->status == STATUS_REIMBURSE_PROSES) if ($reimburse->hasPemeriksaReimburse) if ($reimburse->posisi == $reimburse->hasPemeriksaReimburse->id_juu_pemeriksa AND $reimburse->is_opened_by_posisi == false) $tarik = true;

            $data_reimburse[] = (object) [
                'id' => $reimburse->id,
                'status' => $reimburse->statusReimburse->nama,
                'tanggal_pengajuan' => $this->convertToIndonesiaDate(strtotime($reimburse->hasRiwayatReimburse->where('id_aksi_reimburse', AKSI_REIMBURSE_KIRIM)->first()->created_at)),
                'tanggal_disetujui' => $reimburse->approved_at ? $this->convertToIndonesiaDate(strtotime($reimburse->approved_at)) : '',
                'tanggal_diajukan' => $reimburse->hasRiwayatReimburse->where('id_aksi_reimburse', AKSI_REIMBURSE_DIAJUKAN)->first() ? $this->convertToIndonesiaDate(strtotime($reimburse->hasRiwayatReimburse->where('id_aksi_reimburse', AKSI_REIMBURSE_DIAJUKAN)->first()->created_at)) : '',
                'total' => $reimburse->total,
                'pemeriksa' => $this->convertNamaPejabat($reimburse->hasPemeriksaReimburse->juuPemeriksa),
                'nama_pemeriksa' => $reimburse->hasPemeriksaReimburse->juuPemeriksa->user->profil_user->nama,
                'tarik' => $tarik,
                'posisi' => $reimburse->posisi == 0 ? $this->convertNamaPejabat($reimburse->createdBy) : $this->convertNamaPejabat($reimburse->juuPosisi),
                'nama_posisi' => $reimburse->posisi == 0 ? $reimburse->createdBy->user->profil_user->nama : $reimburse->juuPosisi->user->profil_user->nama,
                'nama_waktu_buat' => $this->convertToIndonesiaTime(strtotime($reimburse->created_at)),
                'nama_waktu_ubah' => $this->convertToIndonesiaTime(strtotime($reimburse->updated_at)),
                'waktu_ubah' => date('Y-m-d H:i:s', strtotime($reimburse->updated_at))
            ];
        }

        return $data_reimburse;
    }

    protected function drafReimburseButuhProses($id_juu = NULL)
    {
        if ($id_juu == NULL) return [];

        $daftar_reimburse = Reimburse::where('posisi', $id_juu)
            ->where('status', STATUS_REIMBURSE_PROSES)
            ->orderBy('updated_at', 'desc')
            ->get();

        $data_reimburse = [];
        foreach ($daftar_reimburse as $reimburse) {
            $data_reimburse[] = (object) [
                'id' => $reimburse->id,
                'tanggal_pengajuan' => $this->convertToIndonesiaDate(strtotime($reimburse->hasRiwayatReimburse->where('id_aksi_reimburse', AKSI_REIMBURSE_KIRIM)->first()->created_at)),
                'total' => $reimburse->total,
                'pengusul' => $this->convertNamaPejabat($reimburse->createdBy),
                'nama_pengusul' => $reimburse->createdBy->user->profil_user->nama,
                'nama_waktu_buat' => $this->convertToIndonesiaTime(strtotime($reimburse->created_at)),
                'nama_waktu_ubah' => $this->convertToIndonesiaTime(strtotime($reimburse->updated_at)),
                'waktu_ubah' => date('Y-m-d H:i:s', strtotime($reimburse->updated_at))
            ];
        }

        return $data_reimburse;
    }

    protected function drafReimburseDisetujui($id_juu = NULL, $tanggal_awal = NULL, $tanggal_akhir = NULL)
    {
        if ($id_juu == NULL) return [];

        $daftar_unit = PejabatPemeriksaReimburse::where('id_juu', $id_juu)->pluck('id_unit');

        if (in_array(ID_KANTOR_PUSAT, $daftar_unit->toArray())) $daftar_reimburse = Reimburse::where('status', STATUS_REIMBURSE_DISETUJUI);
        else $daftar_reimburse = Reimburse::whereIn('created_by', JabatanUnitUser::whereIn('id_jabatan_unit', JabatanUnit::whereIn('id_unit', $daftar_unit)->pluck('id'))->where('id_jenis_juu', JENIS_JKU_ASLI)->pluck('id'))->where('status', STATUS_REIMBURSE_DISETUJUI);

        if ($tanggal_awal AND $tanggal_akhir) $daftar_reimburse = $daftar_reimburse->whereHas('hasRiwayatReimburse', function($query) use ($tanggal_awal, $tanggal_akhir) { $query->where('id_aksi_reimburse', AKSI_REIMBURSE_KIRIM)->where('created_at', '>=', date('Y-m-d', strtotime($tanggal_awal)) . ' 00:00:00')->where('created_at', '<=', date('Y-m-d', strtotime($tanggal_akhir)) . ' 23:59:59'); });
        elseif ($tanggal_awal) $daftar_reimburse = $daftar_reimburse->whereHas('hasRiwayatReimburse', function($query) use ($tanggal_awal) { $query->where('id_aksi_reimburse', AKSI_REIMBURSE_KIRIM)->where('created_at', '>=', date('Y-m-d', strtotime($tanggal_awal)) . ' 00:00:00')->where('created_at', '<=', date('Y-m-d', strtotime($tanggal_awal)) . ' 23:59:59'); });
        elseif ($tanggal_akhir) $daftar_reimburse = $daftar_reimburse->whereHas('hasRiwayatReimburse', function($query) use ($tanggal_akhir) { $query->where('id_aksi_reimburse', AKSI_REIMBURSE_KIRIM)->where('created_at', '>=', date('Y-m-d', strtotime($tanggal_akhir)) . ' 00:00:00')->where('created_at', '<=', date('Y-m-d', strtotime($tanggal_akhir)) . ' 23:59:59'); });

        $daftar_reimburse = $daftar_reimburse->where('posisi', $id_juu)->orderBy('updated_at', 'desc')->get();

        $data_reimburse = [];
        foreach ($daftar_reimburse as $reimburse) {
            $data_reimburse[] = (object) [
                'id' => $reimburse->id,
                'tanggal_pengajuan' => $this->convertToIndonesiaDate(strtotime($reimburse->hasRiwayatReimburse->where('id_aksi_reimburse', AKSI_REIMBURSE_KIRIM)->first()->created_at)),
                'tanggal_disetujui' => $reimburse->approved_at ? $this->convertToIndonesiaDate(strtotime($reimburse->approved_at)) : '',
                'total' => $reimburse->total,
                'pengusul' => $this->convertNamaPejabat($reimburse->createdBy),
                'nama_pengusul' => $reimburse->createdBy->user->profil_user->nama,
                'nama_waktu_buat' => $this->convertToIndonesiaTime(strtotime($reimburse->created_at)),
                'nama_waktu_ubah' => $this->convertToIndonesiaTime(strtotime($reimburse->updated_at)),
                'waktu_ubah' => date('Y-m-d H:i:s', strtotime($reimburse->updated_at))
            ];
        }

        return $data_reimburse;
    }

    protected function drafReimburseDiajukan($id_juu = NULL, $tanggal_awal = NULL, $tanggal_akhir = NULL)
    {
        if ($id_juu == NULL) return [];

        $daftar_unit = PejabatPemeriksaReimburse::where('id_juu', $id_juu)->pluck('id_unit');

        $daftar_reimburse = Reimburse::whereIn('created_by', JabatanUnitUser::whereIn('id_jabatan_unit', JabatanUnit::whereIn('id_unit', $daftar_unit)->pluck('id'))->where('id_jenis_juu', JENIS_JKU_ASLI)->pluck('id'))->where('status', STATUS_REIMBURSE_DIAJUKAN);

        if ($tanggal_awal AND $tanggal_akhir) $daftar_reimburse = $daftar_reimburse->whereHas('hasRiwayatReimburse', function($query) use ($tanggal_awal, $tanggal_akhir) { $query->where('id_aksi_reimburse', AKSI_REIMBURSE_KIRIM)->where('created_at', '>=', date('Y-m-d', strtotime($tanggal_awal)) . ' 00:00:00')->where('created_at', '<=', date('Y-m-d', strtotime($tanggal_akhir)) . ' 23:59:59'); });
        elseif ($tanggal_awal) $daftar_reimburse = $daftar_reimburse->whereHas('hasRiwayatReimburse', function($query) use ($tanggal_awal) { $query->where('id_aksi_reimburse', AKSI_REIMBURSE_KIRIM)->where('created_at', '>=', date('Y-m-d', strtotime($tanggal_awal)) . ' 00:00:00')->where('created_at', '<=', date('Y-m-d', strtotime($tanggal_awal)) . ' 23:59:59'); });
        elseif ($tanggal_akhir) $daftar_reimburse = $daftar_reimburse->whereHas('hasRiwayatReimburse', function($query) use ($tanggal_akhir) { $query->where('id_aksi_reimburse', AKSI_REIMBURSE_KIRIM)->where('created_at', '>=', date('Y-m-d', strtotime($tanggal_akhir)) . ' 00:00:00')->where('created_at', '<=', date('Y-m-d', strtotime($tanggal_akhir)) . ' 23:59:59'); });

        $daftar_reimburse = $daftar_reimburse->where('posisi', $id_juu)->orderBy('updated_at', 'desc')->get();

        $data_reimburse = [];
        foreach ($daftar_reimburse as $reimburse) {
            $data_reimburse[] = (object) [
                'id' => $reimburse->id,
                'tanggal_pengajuan' => $this->convertToIndonesiaDate(strtotime($reimburse->hasRiwayatReimburse->where('id_aksi_reimburse', AKSI_REIMBURSE_KIRIM)->first()->created_at)),
                'tanggal_disetujui' => $reimburse->approved_at ? $this->convertToIndonesiaDate(strtotime($reimburse->approved_at)) : '',
                'tanggal_diajukan' => $this->convertToIndonesiaDate(strtotime($reimburse->hasRiwayatReimburse->where('id_aksi_reimburse', AKSI_REIMBURSE_DIAJUKAN)->first()->created_at)),
                'total' => $reimburse->total,
                'pengusul' => $this->convertNamaPejabat($reimburse->createdBy),
                'nama_pengusul' => $reimburse->createdBy->user->profil_user->nama,
                'nama_waktu_buat' => $this->convertToIndonesiaTime(strtotime($reimburse->created_at)),
                'nama_waktu_ubah' => $this->convertToIndonesiaTime(strtotime($reimburse->updated_at)),
                'waktu_ubah' => date('Y-m-d H:i:s', strtotime($reimburse->updated_at))
            ];
        }

        return $data_reimburse;
    }

    protected function drafReimburseSelesai($id_juu = NULL)
    {
        if ($id_juu == NULL) return [];

        $daftar_reimburse = Reimburse::where('created_by', $id_juu)
            ->where('status', STATUS_REIMBURSE_DIBAYARKAN)
            ->orderBy('updated_at', 'desc')
            ->get();

        $data_reimburse = [];
        foreach ($daftar_reimburse as $reimburse) {
            $data_reimburse[] = (object) [
                'id' => $reimburse->id,
                'tanggal_pengajuan' => $this->convertToIndonesiaDate(strtotime($reimburse->hasRiwayatReimburse->where('id_aksi_reimburse', AKSI_REIMBURSE_KIRIM)->first()->created_at)),
                'tanggal_disetujui' => $this->convertToIndonesiaDate(strtotime($reimburse->approved_at)),
                'tanggal_diajukan' => $this->convertToIndonesiaDate(strtotime($reimburse->hasRiwayatReimburse->where('id_aksi_reimburse', AKSI_REIMBURSE_DIAJUKAN)->first()->created_at)),
                'tanggal_dibayarkan' => $this->convertToIndonesiaDate(strtotime($reimburse->hasRiwayatReimburse->where('id_aksi_reimburse', AKSI_REIMBURSE_DIBAYARKAN)->first()->created_at)),
                'total' => $reimburse->total,
                'pengusul' => $this->convertNamaPejabat($reimburse->createdBy),
                'nomor' => $reimburse->hasPenomoranReimburse->nomor,
                'nama_pengusul' => $reimburse->createdBy->user->profil_user->nama,
                'nama_waktu_buat' => $this->convertToIndonesiaTime(strtotime($reimburse->created_at)),
                'nama_waktu_ubah' => $this->convertToIndonesiaTime(strtotime($reimburse->updated_at)),
                'waktu_ubah' => date('Y-m-d H:i:s', strtotime($reimburse->updated_at))
            ];
        }

        return $data_reimburse;
    }

    protected function drafReimburseDitolak($id_juu = NULL)
    {
        if ($id_juu == NULL) return [];

        $daftar_reimburse = Reimburse::where('created_by', $id_juu)
            ->where('status', STATUS_REIMBURSE_DITOLAK)
            ->orderBy('updated_at', 'desc')
            ->get();

        $data_reimburse = [];
        foreach ($daftar_reimburse as $reimburse) {
            $data_reimburse[] = (object) [
                'id' => $reimburse->id,
                'tanggal_ditolak' => $this->convertToIndonesiaDate(strtotime($reimburse->hasRiwayatReimburse->where('id_aksi_reimburse', AKSI_REIMBURSE_TOLAK)->first()->created_at)),
                'total' => $reimburse->total,
                'alasan' => trim($reimburse->hasRiwayatReimburse->where('id_aksi_reimburse', AKSI_REIMBURSE_TOLAK)->first()->keterangan),
                'pengusul' => $this->convertNamaPejabat($reimburse->createdBy),
                'nama_pengusul' => $reimburse->createdBy->user->profil_user->nama,
                'nama_waktu_buat' => $this->convertToIndonesiaTime(strtotime($reimburse->created_at)),
                'nama_waktu_ubah' => $this->convertToIndonesiaTime(strtotime($reimburse->updated_at)),
                'waktu_ubah' => date('Y-m-d H:i:s', strtotime($reimburse->updated_at))
            ];
        }

        return $data_reimburse;
    }

    protected function rekapReimburse($id_juu = NULL, $tanggal_awal = NULL, $tanggal_akhir = NULL)
    {
        $daftar_unit = PejabatPemeriksaReimburse::where('id_juu', $id_juu)->pluck('id_unit');

        if (in_array(ID_KANTOR_PUSAT, $daftar_unit->toArray())) $daftar_reimburse = Reimburse::where('status', STATUS_REIMBURSE_DIBAYARKAN);
        else {
            $daftar_juu = JabatanUnitUser::where(function ($query) use ($daftar_unit) {
                    $query->where(function ($q1) use ($daftar_unit) { $q1->whereIn('id_jabatan_unit', JabatanUnit::whereIn('id_unit', $daftar_unit)->pluck('id'))->whereNull('id_unit_khusus'); })
                        ->orWhere(function ($q2) use ($daftar_unit) { $q2->whereIn('id_unit_khusus', $daftar_unit); });
                })
                ->where('id_jenis_juu', JENIS_JKU_ASLI)
                ->pluck('id');

            $daftar_reimburse = Reimburse::where('status', STATUS_REIMBURSE_DIBAYARKAN)->whereIn('created_by', $daftar_juu);
        }

        if ($tanggal_awal AND $tanggal_akhir) $daftar_reimburse = $daftar_reimburse->whereHas('hasRiwayatReimburse', function($query) use ($tanggal_awal, $tanggal_akhir) { $query->where('id_aksi_reimburse', AKSI_REIMBURSE_KIRIM)->where('created_at', '>=', date('Y-m-d', strtotime($tanggal_awal)) . ' 00:00:00')->where('created_at', '<=', date('Y-m-d', strtotime($tanggal_akhir)) . ' 23:59:59'); });
        elseif ($tanggal_awal) $daftar_reimburse = $daftar_reimburse->whereHas('hasRiwayatReimburse', function($query) use ($tanggal_awal) { $query->where('id_aksi_reimburse', AKSI_REIMBURSE_KIRIM)->where('created_at', '>=', date('Y-m-d', strtotime($tanggal_awal)) . ' 00:00:00')->where('created_at', '<=', date('Y-m-d', strtotime($tanggal_awal)) . ' 23:59:59'); });
        elseif ($tanggal_akhir) $daftar_reimburse = $daftar_reimburse->whereHas('hasRiwayatReimburse', function($query) use ($tanggal_akhir) { $query->where('id_aksi_reimburse', AKSI_REIMBURSE_KIRIM)->where('created_at', '>=', date('Y-m-d', strtotime($tanggal_akhir)) . ' 00:00:00')->where('created_at', '<=', date('Y-m-d', strtotime($tanggal_akhir)) . ' 23:59:59'); });

        $daftar_reimburse = $daftar_reimburse->orderBy('updated_at', 'desc')->get();

        $data_reimburse = [];
        foreach ($daftar_reimburse as $reimburse) {
            $data_reimburse[] = [
                'id' => $reimburse->id,
                'tanggal_pengajuan' => $this->convertToIndonesiaDate(strtotime($reimburse->hasRiwayatReimburse->where('id_aksi_reimburse', AKSI_REIMBURSE_KIRIM)->first()->created_at)),
                'tanggal_disetujui' => $this->convertToIndonesiaDate(strtotime($reimburse->approved_at)),
                'tanggal_diajukan' => $this->convertToIndonesiaDate(strtotime($reimburse->hasRiwayatReimburse->where('id_aksi_reimburse', AKSI_REIMBURSE_DIAJUKAN)->first()->created_at)),
                'tanggal_dibayarkan' => $this->convertToIndonesiaDate(strtotime($reimburse->hasRiwayatReimburse->where('id_aksi_reimburse', AKSI_REIMBURSE_DIBAYARKAN)->first()->created_at)),
                'total' => $reimburse->total,
                'nomor' => $reimburse->hasPenomoranReimburse->nomor,
                'pengusul' => $this->convertNamaPejabat($reimburse->createdBy),
                'nama_pengusul' => $reimburse->createdBy->user->profil_user->nama,
                'order_by' => date('Y-m-d H:i:s', strtotime($reimburse->hasRiwayatReimburse->where('id_aksi_reimburse', AKSI_REIMBURSE_KIRIM)->first()->created_at)),
            ];
        }

        return $data_reimburse;
    }

    protected function notifikasiPengajuReimburse($reimburse = NULL) {
        if (is_null($reimburse)) return false;

        $riwayat_reimburse = $reimburse->hasRiwayatReimburse->last();

        $link = '';
        $detail = '';
        if ($riwayat_reimburse->id_aksi_reimburse == AKSI_REIMBURSE_SETUJU) { $detail = 'disetujui dan akan diajukan ke bagian keuangan'; $link = 'e-hrd/e-reimburse/approval/monitor/' . $reimburse->id; }
        elseif ($riwayat_reimburse->id_aksi_reimburse == AKSI_REIMBURSE_TOLAK) { $detail = 'ditolak'; $link = 'e-hrd/e-reimburse/list/ditolak/all'; }
        elseif ($riwayat_reimburse->id_aksi_reimburse == AKSI_REIMBURSE_DIAJUKAN) { $detail = 'diajukan ke bagian keuangan'; $link = 'e-hrd/e-reimburse/approval/monitor/' . $reimburse->id; }
        else { $detail = 'dibayarkan kembali oleh bagian keuangan'; $link = 'e-hrd/e-reimburse/list/selesai/all'; }

        $data_email = [
            'nama_pemeriksa' => $riwayat_reimburse->juu->user->profil_user->nama,
            'jabatan_unit_pemeriksa' => $this->convertNamaPejabat($riwayat_reimburse->juu),
            'total' => $reimburse->total,
            'detail' => $detail,
            'nama_pengaju' => $reimburse->createdBy->user->profil_user->nama,
            'jabatan_unit_pengaju' => $this->convertNamaPejabat($reimburse->createdBy)
        ];

        if (isset($reimburse->createdBy->user->profil_user->email) AND $reimburse->createdBy->user->is_notified == true) {
            $data_email['link'] = env('FRONTEND_URL') . $link;

            Mail::send('email.reimburse.pengaju', $data_email, function($message) use ($reimburse) {
                $message->to($reimburse->createdBy->user->profil_user->email, $reimburse->createdBy->user->profil_user->nama)
                        ->subject('[OA] Persetujuan Reimburse');
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

    protected function notifikasiPemeriksaReimburse($reimburse = NULL)
    {
        if (is_null($reimburse)) return false;

        $link = 'e-hrd/e-reimburse/approval/butuh-proses/' . $reimburse->id;
        $data_email = [
            'nama_pemeriksa' => $reimburse->juuPosisi->user->profil_user->nama,
            'jabatan_unit_pemeriksa' => $this->convertNamaPejabat($reimburse->juuPosisi),
            'total' => $reimburse->total,
            'nama_pengaju' => $reimburse->createdBy->user->profil_user->nama,
            'jabatan_unit_pengaju' => $this->convertNamaPejabat($reimburse->createdBy)
        ];

        if (isset($reimburse->juuPosisi->user->profil_user->email) AND $reimburse->juuPosisi->user->is_notified == true) {
            $data_email['link'] = env('FRONTEND_URL') . $link;

            Mail::send('email.reimburse.pemeriksa', $data_email, function($message) use ($reimburse) {
                $message->to($reimburse->juuPosisi->user->profil_user->email, $reimburse->juuPosisi->user->profil_user->nama)
                        ->subject('[OA] Reimburse Butuh Proses');
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

    protected function notifikasiPemeriksaTanggungan($tanggungan = NULL)
    {
        if (is_null($tanggungan)) return false;

        $id_unit = isset($tanggungan->createdBy->id_unit_khusus) ? $tanggungan->createdBy->id_unit_khusus : $tanggungan->createdBy->jabatan_unit->id_unit;

        $pemeriksa_tanggungan = PejabatPemeriksaReimburse::where('id_unit', $id_unit)->first();
        if (is_null($pemeriksa_tanggungan)) return false;

        $link = 'admin-hrd/e-reimburse/tanggungan/persetujuan/all';
        $data_email = [
            'nama_pemeriksa' => $pemeriksa_tanggungan->juu->user->profil_user->nama,
            'jabatan_unit_pemeriksa' => $this->convertNamaPejabat($pemeriksa_tanggungan->juu),
            'nama_pengaju' => $tanggungan->createdBy->user->profil_user->nama,
            'jabatan_unit_pengaju' => $this->convertNamaPejabat($tanggungan->createdBy)
        ];


        if (isset($pemeriksa_tanggungan->juu->user->profil_user->email) AND $pemeriksa_tanggungan->juu->user->is_notified == true) {
            $data_email['link'] = env('FRONTEND_URL') . $link;

            Mail::send('email.reimburse.pemeriksa-tanggungan', $data_email, function($message) use ($pemeriksa_tanggungan) {
                $message->to($pemeriksa_tanggungan->juu->user->profil_user->email, $pemeriksa_tanggungan->juu->user->profil_user->nama)
                        ->subject('[OA] Pengajuan Tanggungan Butuh Proses');
                $message->from(env('MAIL_FROM_ADDRESS'),env('MAIL_FROM_NAME'));
            });
        }

        return true;
    }

    protected function generatePDFReimburse($reimburse = NULL, $header_footer = true, $qrcode = true)
    {
        if (is_null($reimburse)) return '';

        $html = '
        <html>
            <head>
                <style>
                    @page { header: page-header; footer: page-footer; }
                    @page :first { header: page-header-first; footer: page-footer-first; }
                    #header { padding-bottom: 200px; }
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
                        <td width="5%" ></td>
                        <td width="15%"  style="text-align: center">
                            <img  src="' . base_path('public/reimburse/logo.PNG') . '">
                        </td>
                        <td width="80%" style="text-align: center">
                            <p style="font-weight: bold; font-size: 30px; text-align: center; color:#44546A">PT Sumber Segara Primadaya </p>
                        </td>
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
                <div style="text-align: center">
                    <div style="padding-bottom: 60px;"></div>
                    <h2 style="padding-bottom: -10px;">
                        <span style="border-bottom-width: 2px; border-bottom-style: solid; padding-bottom: 3px">
                            PENGAJUAN REIMBURSEMEN PENGOBATAN
                        </span>
                    </h2>
                </div>';

        $flag = 0;
        $pengaju_html = '
                <div style="margin-left: 50px">
                    <table class="no-border" width="100%" cellspacing="2" cellpadding="0" border="0" align="left" bgcolor="#ffffff">
                        <tr bgcolor="#ffffff">
                            <td width="55%" style="padding-top:30px;">&nbsp;</td>
                            <td width="10%" style="padding-top:30px;">Tanggal</td>
                            <td width="2%" style="padding-top:30px;">: </td>
                            <td width="33%" style="padding-top:30px;">' . (is_null($reimburse->hasRiwayatReimburse->where('id_aksi_reimburse', AKSI_REIMBURSE_KIRIM)->first()) ? '-' : $this->convertToIndonesiaDate(strtotime($reimburse->hasRiwayatReimburse->where('id_aksi_reimburse', AKSI_REIMBURSE_KIRIM)->first()->created_at))) . '</td>
                        </tr>
                            <tr bgcolor="#ffffff">
                            <td width="55%">&nbsp;</td>
                            <td width="10%">Nomor</td>
                            <td width="2%">: </td>
                            <td width="33%">' . ($reimburse->hasPenomoranReimburse->nomor) . '</td>
                        </tr>
                        <tr bgcolor="#ffffff"><td><br></td></tr>
                    </table>
                </div>
                <div style="margin-left: 50px">
                    <table class="no-border" width="100%" cellspacing="2" cellpadding="0" border="0" align="left" bgcolor="#ffffff">
                        <tr bgcolor="#ffffff">
                            <td width="12%" height="20" valign="top" style="padding-top:0px;">Nama</td>
                            <td width="2%" valign="top" style="padding-top:0px;">: </td>
                            <td width="81%" style="padding-top:0px;">' . $reimburse->createdBy->user->profil_user->nama . '</td>
                            <td width="5%" ></td>
                        </tr>
                        <tr bgcolor="#ffffff">
                            <td width="12%" height="20" valign="top">NIK</td>
                            <td width="2%" valign="top">: </td>
                            <td width="81%">' . $reimburse->createdBy->user->karyawan->nik . '</td>
                            <td width="5%" ></td>
                        </tr>
                        <tr bgcolor="#ffffff">
                            <td width="12%" height="20" valign="top">Jabatan</td>
                            <td width="2%" valign="top">: </td>
                            <td width="81%">' . $this->convertNamaPejabat($reimburse->createdBy) . '</td>
                            <td width="5%" ></td>
                        </tr>
                    </table>
                </div>';

        $pengajuan_html = '
                <div style="margin-left: 50px">
                    <table class="no-border" width="100%" cellspacing="2" cellpadding="0" border="0" align="left" bgcolor="#ffffff">
                        <tr><td width="100%"><br></td></tr>
                        <tr><td width="100%">Mengajukan reimbursemen pengobatan dengan rincian sebagai berikut :</td></tr>
                        <tr><td width="100%"><br></td></tr>
                    </table>
                </div>';

        $no = 0;
        $total = 0;
        $detail_html = '';
        foreach ($reimburse->hasDetailReimburse as $detail) {
            $total += $detail->jumlah;
            $detail_html .= '
                        <tr bgcolor="#ffffff">
                            <td width="5%" style="padding: 2px; text-align:center; border: 1px solid black;border-collapse: collapse;">' . ++$no . '</td>
                            <td width="20%" style="padding: 2px; text-align:center; border: 1px solid black;border-collapse: collapse;">' . $this->convertToIndonesiaDate(strtotime($detail->tanggal)) . '</td>
                            <td width="40%" style="padding: 2px; text-align:left; border: 1px solid black;border-collapse: collapse;">' . $detail->tanggungan->nama . '</td>
                            <td width="15%" style="padding: 2px; text-align:center; border: 1px solid black;border-collapse: collapse;">' . $detail->tanggungan->statusHubunganTanggungan->nama . '</td>
                            <td width="20%" style="padding: 2px; text-align:right; border: 1px solid black;border-collapse: collapse;">Rp. ' . number_format($detail->jumlah, 2, ",", ".") . '</td>
                        </tr>
            ';
        }
        $detail_html .= '
                    <tr bgcolor="#ffffff">
                        <td width="80%" style="padding: 2px 5px; text-align:right; border: 1px solid black;border-collapse: collapse;" colspan="4">Total</td>
                        <td width="20%" style="padding: 2px; text-align:right; border: 1px solid black;border-collapse: collapse;">Rp. ' . number_format($total, 2, ",", ".") . '</td>
                    </tr>
        ';

        $data_html = '
                <div style="margin-left: 50px">
                    <table width="100%" cellspacing="0" cellpadding="0" border="0" align="left" bgcolor="#ffffff"  style="border: 1px solid black;border-collapse: collapse;">
                        <tr bgcolor="#ffffff">
                            <td width="5%" style="padding: 2px; text-align:center; border: 1px solid black;border-collapse: collapse;">No</td>
                            <td width="20%" style="padding: 2px; text-align:center; border: 1px solid black;border-collapse: collapse;">Tanggal Kwitansi</td>
                            <td width="40%" style="padding: 2px; text-align:center; border: 1px solid black;border-collapse: collapse;">Nama</td>
                            <td width="15%" style="padding: 2px; text-align:center; border: 1px solid black;border-collapse: collapse;">Hubungan</td>
                            <td width="20%" style="padding: 2px; text-align:center; border: 1px solid black;border-collapse: collapse;">Jumlah</td>
                        </tr>
                        ' . $detail_html . '
                    </table>
                </div>';

        $html .= $header_html . $pengaju_html . $pengajuan_html . $data_html;

        $ttd_html = '
            <div style="margin-left: 50px;margin-right: 0px;margin-top: 50px;text-align:justify;">
                <table class="no-border" style="margin-top: 0px;" width="100%" cellspacing="2" cellpadding="0" border="0" align="right" bgcolor="#ffffff">
                    <tr bgcolor="#ffffff">
                        <td width="50%" style="text-align: center">
                            <p style="text-align: center; padding-bottom: 10px;">Diajukan oleh :</p>
                            <p style="text-align: center; padding-bottom: 10px;">Tanggal : ' . (is_null($reimburse->hasRiwayatReimburse->where('id_aksi_reimburse', AKSI_REIMBURSE_KIRIM)->first()) ? '-' : $this->convertToIndonesiaDate(strtotime($reimburse->hasRiwayatReimburse->where('id_aksi_reimburse', AKSI_REIMBURSE_KIRIM)->first()->created_at))) . '</p>
                            <div style="width: 100%; margin-top: 30px; text-align:center; padding-bottom: 5px">
                                <img style="width: 100px; margin-top: 10px; margin-bottom: 10px;" src="' . (isset($reimburse->hasQRCodeReimburse->path) ? base_path($reimburse->hasQRCodeReimburse->path) : base_path('public/reimburse/pengusul.png')) . '">
                            </div>
                            <p style="text-align: center; font-weight: bold; padding-bottom: 0px; padding-top: 5px">
                                <span style="border-bottom-width: 2px; border-bottom-style: solid; padding-bottom: 10px">
                                    '.(isset($reimburse->createdBy->user->profil_user->nama) ? $reimburse->createdBy->user->profil_user->nama : "kosong").'
                                </span>
                            </p>
                            <p style="text-align: center">
                                '.(isset($reimburse->createdBy->jabatan_unit->jabatan->nama) ? $reimburse->createdBy->jabatan_unit->jabatan->nama : "-").'
                            </p>
                        </td>
                        <td width="50%" style="text-align: center">
                            <p style="text-align: center; padding-bottom: 10px;">Disetujui oleh :</p>
                            <p style="text-align: center; padding-bottom: 10px;">Tanggal : ' . (isset($reimburse->approved_at) ? $this->convertToIndonesiaDate(strtotime($reimburse->approved_at)) : '-') . '</p>
                            <div style="width: 100%; margin-top: 30px; text-align:center; margin-bottom: 5px">
                                <img style="width: 100px; margin-top: 10px; margin-bottom: 10px;" src="' . (isset($reimburse->hasPemeriksaReimburse->path) ? base_path($reimburse->hasPemeriksaReimburse->path) : base_path('public/reimburse/pemeriksa.png')) . '">
                            </div>
                            <p style="text-align: center; font-weight: bold; padding-bottom: 0px; padding-top: 5px">
                                <span style="border-bottom-width: 2px; border-bottom-style: solid; padding-bottom: 10px">
                                    '.(isset($reimburse->hasPemeriksaReimburse->juuPemeriksa->user->profil_user->nama) ? $reimburse->hasPemeriksaReimburse->juuPemeriksa->user->profil_user->nama : "kosong").'
                                </span>
                            </p>
                            <p style="text-align: center">
                                '.(isset($reimburse->hasPemeriksaReimburse->juuPemeriksa->jabatan_unit->jabatan->nama) ? $reimburse->hasPemeriksaReimburse->juuPemeriksa->jabatan_unit->jabatan->nama : "-").'
                            </p>
                        </td>
                    </tr>
                </table>
            </div><br />';

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
                        <td width="7%" style="text-align: center"></td>


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

    protected function generatePDFDaftarRekapReimburseDisetujui($daftar_riwayat_reimburse, $pejabat, $tanggal_awal, $tanggal_akhir, $header_footer = true, $qrcode = true)
    {
        // if ($daftar_riwayat_reimburse->count() == 0) return '<html><body>TIDAK ADA DATA REIMBURSEMEN PENGOBATAN</body></html>';

        $tanggal_pengajuan = '';
        if ($tanggal_awal != '-' AND $tanggal_akhir != '-') $tanggal_pengajuan = $this->convertToIndonesiaDate(strtotime($tanggal_awal)) . ' - ' . $this->convertToIndonesiaDate(strtotime($tanggal_akhir));
        elseif ($tanggal_awal != '-') $tanggal_pengajuan = $this->convertToIndonesiaDate(strtotime($tanggal_awal));
        elseif ($tanggal_akhir != '-') $tanggal_pengajuan = $this->convertToIndonesiaDate(strtotime($tanggal_akhir));

        $html = '
        <html>
            <head>
                <style>
                    @page { header: page-header; footer: page-footer; }
                    @page :first { header: page-header-first; footer: page-footer-first; }
                    #header { padding-bottom: 200px; }
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
                        <td width="5%" ></td>
                        <td width="15%"  style="text-align: center">
                            <img  src="' . base_path('public/reimburse/logo.PNG') . '">
                        </td>
                        <td width="80%" style="text-align: center">
                            <p style="font-weight: bold; font-size: 30px; text-align: center; color:#44546A">PT Sumber Segara Primadaya </p>
                        </td>
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
                <div style="text-align: center">
                    <div style="padding-bottom: 60px;"></div>
                    <h2 style="padding-bottom: -10px;">
                        <span style="border-bottom-width: 2px; border-bottom-style: solid; padding-bottom: 3px">
                            REKAP PENGAJUAN REIMBURSEMEN PENGOBATAN
                        </span>
                    </h2>
                </div>';

        $flag = 0;
        $pengaju_html = '
                <div style="margin-left: 50px">
                    <table class="no-border" width="100%" cellspacing="2" cellpadding="0" border="0" align="left" bgcolor="#ffffff">
                        <tr bgcolor="#ffffff"><td><br></td></tr>
                        <tr bgcolor="#ffffff">
                            <td width="40%" height="20" valign="top" style="padding-top:0px;">Tanggal Pengajuan</td>
                            <td width="2%" valign="top" style="padding-top:0px;">: </td>
                            <td width="58%" style="padding-top:0px;">' . ($tanggal_pengajuan == '' ? 'semua' : $tanggal_pengajuan) . '</td>
                        </tr>
                        <tr bgcolor="#ffffff">
                            <td width="40%" height="20" valign="top">Tanggal Cetak</td>
                            <td width="2%" valign="top">: </td>
                            <td width="58%">' . $this->convertToIndonesiaDate(strtotime('now')) . '</td>
                        </tr>
                    </table>
                </div>';

        $pengajuan_html = '
                <div style="margin-left: 50px">
                    <table class="no-border" width="100%" cellspacing="2" cellpadding="0" border="0" align="left" bgcolor="#ffffff">
                        <tr><td width="100%"><br></td></tr>
                    </table>
                </div>';

        $no = 0;
        $total = 0;
        $detail_html = '';

        if ($daftar_riwayat_reimburse->count() == 0) {
            $detail_html .= '
            <tr bgcolor="#ffffff">
                <td width="100%" style="padding: 2px 5px; text-align:center; border: 1px solid black;border-collapse: collapse;" colspan="4">TIDAK ADA DATA</td>
            </tr>
            ';

        } else {
            foreach ($daftar_riwayat_reimburse as $riwayat_reimburse) {
                $total += $riwayat_reimburse->reimburse->total;
                $detail_html .= '
                <tr bgcolor="#ffffff">
                    <td width="5%" style="padding: 2px; text-align:center; border: 1px solid black;border-collapse: collapse;">' . ++$no . '</td>
                    <td width="20%" style="padding: 2px; text-align:center; border: 1px solid black;border-collapse: collapse;">' . $this->convertToIndonesiaDate(strtotime($riwayat_reimburse->created_at)) . '</td>
                    <td width="50%" style="padding: 2px; text-align:left; border: 1px solid black;border-collapse: collapse;">' . trim($riwayat_reimburse->reimburse->createdBy->user->profil_user->nama) . '</td>
                    <td width="25%" style="padding: 2px; text-align:right; border: 1px solid black;border-collapse: collapse;">Rp. ' . number_format($riwayat_reimburse->reimburse->total, 2, ",", ".") . '</td>
                </tr>
                ';
            }
            $detail_html .= '
                <tr bgcolor="#ffffff">
                    <td width="75%" style="padding: 2px 5px; text-align:right; border: 1px solid black;border-collapse: collapse;" colspan="3">Total</td>
                    <td width="25%" style="padding: 2px; text-align:right; border: 1px solid black;border-collapse: collapse;">Rp. ' . number_format($total, 2, ",", ".") . '</td>
                </tr>
                ';
        }


        $data_html = '
                <div style="margin-left: 50px">
                    <table width="100%" cellspacing="0" cellpadding="0" border="0" align="left" bgcolor="#ffffff"  style="border: 1px solid black;border-collapse: collapse;">
                        <tr bgcolor="#ffffff">
                            <td width="5%" style="padding: 2px; text-align:center; border: 1px solid black;border-collapse: collapse;">No</td>
                            <td width="20%" style="padding: 2px; text-align:center; border: 1px solid black;border-collapse: collapse;">Tanggal Pengajuan</td>
                            <td width="50%" style="padding: 2px; text-align:center; border: 1px solid black;border-collapse: collapse;">Nama</td>
                            <td width="25%" style="padding: 2px; text-align:center; border: 1px solid black;border-collapse: collapse;">Jumlah</td>
                        </tr>
                        ' . $detail_html . '
                    </table>
                </div>';

        $html .= $header_html . $pengaju_html . $pengajuan_html . $data_html;

        $ttd_html = '
            <div style="margin-left: 50px;margin-right: 0px;margin-top: 50px;text-align:justify;">
                <table class="no-border" style="margin-top: 0px;" width="100%" cellspacing="2" cellpadding="0" border="0" align="right" bgcolor="#ffffff">
                    <tr bgcolor="#ffffff">
                        <td width="50%" style="text-align: center">
                            <p style="text-align: center; padding-bottom: 10px;"></p>
                            <p style="text-align: center; padding-bottom: 10px;"></p>
                            <p style="text-align: center; font-weight: bold; padding-bottom: 0px; padding-top: 5px">
                                <span style="border-bottom-width: 2px; border-bottom-style: solid; padding-bottom: 10px"></span>
                            </p>
                            <p style="text-align: center"></p>
                        </td>
                        <td width="50%" style="text-align: center">
                            <p style="text-align: center; padding-bottom: 10px;">Disetujui oleh :</p>
                            <p style="text-align: center; padding-bottom: 10px;">Tanggal : ' . $this->convertToIndonesiaDate(strtotime('now')) . '</p>
                            <div style="width: 100%; margin-top: 30px; text-align:center; margin-bottom: 5px">
                                <img style="width: 100px; margin-top: 10px; margin-bottom: 10px;" src="' . base_path(ETTD_PATH . $pejabat->user->karyawan->nik . '.png') . '">
                            </div>
                            <p style="text-align: center; font-weight: bold; padding-bottom: 0px; padding-top: 5px">
                                <span style="border-bottom-width: 2px; border-bottom-style: solid; padding-bottom: 10px">
                                    ' . trim($pejabat->user->profil_user->nama) . '
                                </span>
                            </p>
                            <p style="text-align: center">
                                ' . $this->convertNamaPejabat($pejabat) . '
                            </p>
                        </td>
                    </tr>
                </table>
            </div><br />';

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
                        <td width="7%" style="text-align: center"></td>


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
