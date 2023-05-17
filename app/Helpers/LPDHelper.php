<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Mail;

use App\Models\Master\User;
use App\Models\Master\Unit;
use App\Models\Master\JabatanUnit;
use App\Models\Master\JabatanUnitUser;
use App\Models\ELPD\LPD;
use App\Models\ELPD\PenerimaLPD;

trait LPDHelper
{
    protected function drafLPD($id_juu = NULL)
    {
        if ($id_juu == NULL) return [];

        $daftar_lpd = LPD::where('created_by', $id_juu)
            ->where('posisi', 0)
            ->where('status', STATUS_LPD_DRAF)
            ->orderBy('updated_at', 'desc')
            ->get();

        $data_lpd = [];
        foreach ($daftar_lpd as $lpd) {
            $data_lpd[] = (object) [
                'id' => $lpd->id,
                'id_kategori_tujuan' => isset($lpd->id_kategori_tujuan) ? $lpd->id_kategori_tujuan : '',
                'nama_kategori_tujuan' => isset($lpd->id_kategori_tujuan) ? $lpd->kategoriTujuan->nama : '',
                // 'negara_tujuan' => isset($lpd->id_negara_tujuan) ? $lpd->negaraTujuan->nama : '',
                'kota_tujuan' => trim($lpd->kota_tujuan),
                // 'waktu_keberangkatan' => isset($lpd->hasDetailKeberangkatanLPD->waktu_keberangkatan) ? date('Y-m-d H:i:s', strtotime($lpd->hasDetailKeberangkatanLPD->waktu_keberangkatan)) : '',
                'nama_waktu_keberangkatan' => isset($lpd->hasDetailKeberangkatanLPD->waktu_keberangkatan) ? $this->convertToIndonesiaTime(strtotime($lpd->hasDetailKeberangkatanLPD->waktu_keberangkatan)) . ' WIB' : '',
                // 'waktu_kepulangan' => isset($lpd->waktu_kepulangan) ? date('Y-m-d H:i:s', strtotime($lpd->waktu_kepulangan)) : '',
                // 'nama_waktu_kepulangan' => isset($lpd->waktu_kepulangan) ? $this->convertToIndonesiaTime(strtotime($lpd->waktu_kepulangan)) : '',
                'nama_waktu_buat' => $this->convertToIndonesiaTime(strtotime($lpd->created_at)),
                'nama_waktu_ubah' => $this->convertToIndonesiaTime(strtotime($lpd->updated_at)),
                'waktu_ubah' => date('Y-m-d H:i:s', strtotime($lpd->updated_at))
            ];
        }

        return $data_lpd;
    }

    protected function drafLPDMonitor($id_juu = NULL)
    {
        if ($id_juu == NULL) return [];

        $daftar_lpd = LPD::where('created_by', $id_juu)
            ->where('posisi', '<>', 0)
            ->whereIn('status', [STATUS_LPD_PROSES, STATUS_LPD_DISETUJUI, STATUS_LPD_DIAJUKAN])
            ->orderBy('updated_at', 'desc')
            ->get();

        $data_lpd = [];
        foreach ($daftar_lpd as $lpd) {
            $tarik = false;
            if ($id_juu == $lpd->created_by AND $lpd->status == STATUS_LPD_PROSES) if ($lpd->hasPemeriksaLPD) if ($lpd->posisi == $lpd->hasPemeriksaLPD->id_juu_pemeriksa AND $lpd->is_opened_by_posisi == false AND $lpd->hasRiwayatLPD->where('id_aksi_lpd', AKSI_LPD_KEMBALI)->count() == 0) $tarik = true;

            $data_lpd[] = (object) [
                'id' => $lpd->id,
                'status' => $lpd->statusLPD->nama,
                'tanggal_pengajuan' => $this->convertToIndonesiaDate(strtotime($lpd->hasRiwayatLPD->where('id_aksi_lpd', AKSI_LPD_KIRIM)->first()->created_at)),
                'tanggal_disetujui' => $lpd->approved_at ? $this->convertToIndonesiaDate(strtotime($lpd->approved_at)) : '',
                'tanggal_diajukan' => $lpd->hasRiwayatLPD->where('id_aksi_lpd', AKSI_LPD_DIAJUKAN)->first() ? $this->convertToIndonesiaDate(strtotime($lpd->hasRiwayatLPD->where('id_aksi_lpd', AKSI_LPD_DIAJUKAN)->first()->created_at)) : '',
                'id_kategori_tujuan' => isset($lpd->id_kategori_tujuan) ? $lpd->id_kategori_tujuan : '',
                'nama_kategori_tujuan' => isset($lpd->id_kategori_tujuan) ? $lpd->kategoriTujuan->nama : '',
                'kota_tujuan' => trim($lpd->kota_tujuan),
                // 'waktu_keberangkatan' => isset($lpd->waktu_keberangkatan) ? date('Y-m-d H:i:s', strtotime($lpd->waktu_keberangkatan)) : '',
                'nama_waktu_keberangkatan' => isset($lpd->hasDetailKeberangkatanLPD->waktu_keberangkatan) ? $this->convertToIndonesiaTime(strtotime($lpd->hasDetailKeberangkatanLPD->waktu_keberangkatan)) . ' WIB' : '',
                // 'waktu_kepulangan' => isset($lpd->waktu_kepulangan) ? date('Y-m-d H:i:s', strtotime($lpd->waktu_kepulangan)) : '',
                // 'nama_waktu_kepulangan' => isset($lpd->waktu_kepulangan) ? $this->convertToIndonesiaTime(strtotime($lpd->waktu_kepulangan)) : '',
                'pemeriksa' => $this->convertNamaPejabat($lpd->hasPemeriksaLPD->juuPemeriksa),
                'nama_pemeriksa' => $lpd->hasPemeriksaLPD->juuPemeriksa->user->profil_user->nama,
                'tarik' => $tarik,
                'posisi' => $lpd->posisi == 0 ? $this->convertNamaPejabat($lpd->createdBy) : ($lpd->status == STATUS_LPD_PROSES ? $this->convertNamaPejabat($lpd->juuPosisi) : 'HRD ' . $lpd->createdBy->jabatan_unit->unit->nama ),
                // 'nama_posisi' => $lpd->posisi == 0 ? $lpd->createdBy->user->profil_user->nama : $lpd->juuPosisi->user->profil_user->nama,
                'nama_waktu_buat' => $this->convertToIndonesiaTime(strtotime($lpd->created_at)),
                'nama_waktu_ubah' => $this->convertToIndonesiaTime(strtotime($lpd->updated_at)),
                'waktu_ubah' => date('Y-m-d H:i:s', strtotime($lpd->updated_at))
            ];
        }

        return $data_lpd;
    }

    protected function drafLPDButuhProses($id_juu = NULL)
    {
        if ($id_juu == NULL) return [];

        $daftar_lpd = LPD::where('posisi', $id_juu)
            ->where('status', STATUS_LPD_PROSES)
            ->orderBy('updated_at', 'desc')
            ->get();

        $data_lpd = [];
        foreach ($daftar_lpd as $lpd) {
            $data_lpd[] = (object) [
                'id' => $lpd->id,
                'tanggal_pengajuan' => $this->convertToIndonesiaDate(strtotime($lpd->hasRiwayatLPD->where('id_aksi_lpd', AKSI_LPD_KIRIM)->first()->created_at)),
                'id_kategori_tujuan' => isset($lpd->id_kategori_tujuan) ? $lpd->id_kategori_tujuan : '',
                'nama_kategori_tujuan' => isset($lpd->id_kategori_tujuan) ? $lpd->kategoriTujuan->nama : '',
                'kota_tujuan' => trim($lpd->kota_tujuan),
                // 'waktu_keberangkatan' => isset($lpd->waktu_keberangkatan) ? date('Y-m-d H:i:s', strtotime($lpd->waktu_keberangkatan)) : '',
                'nama_waktu_keberangkatan' => isset($lpd->hasDetailKeberangkatanLPD->waktu_keberangkatan) ? $this->convertToIndonesiaTime(strtotime($lpd->hasDetailKeberangkatanLPD->waktu_keberangkatan)) . ' WIB' : '',
                // 'waktu_kepulangan' => isset($lpd->waktu_kepulangan) ? date('Y-m-d H:i:s', strtotime($lpd->waktu_kepulangan)) : '',
                // 'nama_waktu_kepulangan' => isset($lpd->waktu_kepulangan) ? $this->convertToIndonesiaTime(strtotime($lpd->waktu_kepulangan)) : '',
                'pengusul' => $this->convertNamaPejabat($lpd->createdBy),
                'nama_pengusul' => $lpd->createdBy->user->profil_user->nama,
                'nama_waktu_buat' => $this->convertToIndonesiaTime(strtotime($lpd->created_at)),
                'nama_waktu_ubah' => $this->convertToIndonesiaTime(strtotime($lpd->updated_at)),
                'waktu_ubah' => date('Y-m-d H:i:s', strtotime($lpd->updated_at))
            ];
        }

        return $data_lpd;
    }

    protected function drafLPDDisetujui($id_juu = NULL)
    {
        if ($id_juu == NULL) return [];

        $daftar_lpd = LPD::where('posisi', $id_juu)
            ->where('status', STATUS_LPD_DISETUJUI)
            ->orderBy('updated_at', 'desc')
            ->get();

        $data_lpd = [];
        foreach ($daftar_lpd as $lpd) {
            $data_lpd[] = (object) [
                'id' => $lpd->id,
                'tanggal_pengajuan' => $this->convertToIndonesiaDate(strtotime($lpd->hasRiwayatLPD->where('id_aksi_lpd', AKSI_LPD_KIRIM)->first()->created_at)),
                'tanggal_disetujui' => $lpd->approved_at ? $this->convertToIndonesiaDate(strtotime($lpd->approved_at)) : '',
                'id_kategori_tujuan' => isset($lpd->id_kategori_tujuan) ? $lpd->id_kategori_tujuan : '',
                'nama_kategori_tujuan' => isset($lpd->id_kategori_tujuan) ? $lpd->kategoriTujuan->nama : '',
                'kota_tujuan' => trim($lpd->kota_tujuan),
                // 'waktu_keberangkatan' => isset($lpd->waktu_keberangkatan) ? date('Y-m-d H:i:s', strtotime($lpd->waktu_keberangkatan)) : '',
                'nama_waktu_keberangkatan' => isset($lpd->hasDetailKeberangkatanLPD->waktu_keberangkatan) ? $this->convertToIndonesiaTime(strtotime($lpd->hasDetailKeberangkatanLPD->waktu_keberangkatan)) . ' WIB' : '',
                // 'waktu_kepulangan' => isset($lpd->waktu_kepulangan) ? date('Y-m-d H:i:s', strtotime($lpd->waktu_kepulangan)) : '',
                // 'nama_waktu_kepulangan' => isset($lpd->waktu_kepulangan) ? $this->convertToIndonesiaTime(strtotime($lpd->waktu_kepulangan)) : '',
                'pengusul' => $this->convertNamaPejabat($lpd->createdBy),
                'nama_pengusul' => $lpd->createdBy->user->profil_user->nama,
                'nama_waktu_buat' => $this->convertToIndonesiaTime(strtotime($lpd->created_at)),
                'nama_waktu_ubah' => $this->convertToIndonesiaTime(strtotime($lpd->updated_at)),
                'waktu_ubah' => date('Y-m-d H:i:s', strtotime($lpd->updated_at))
            ];
        }

        return $data_lpd;
    }

    protected function drafLPDDiajukan($id_juu = NULL)
    {
        if ($id_juu == NULL) return [];

        $daftar_lpd = LPD::where('posisi', $id_juu)
            ->where('status', STATUS_LPD_DIAJUKAN)
            ->orderBy('updated_at', 'desc')
            ->get();

        $data_lpd = [];
        foreach ($daftar_lpd as $lpd) {
            $data_lpd[] = (object) [
                'id' => $lpd->id,
                'tanggal_pengajuan' => $this->convertToIndonesiaDate(strtotime($lpd->hasRiwayatLPD->where('id_aksi_lpd', AKSI_LPD_KIRIM)->first()->created_at)),
                'tanggal_disetujui' => $lpd->approved_at ? $this->convertToIndonesiaDate(strtotime($lpd->approved_at)) : '',
                'tanggal_diajukan' => $this->convertToIndonesiaDate(strtotime($lpd->hasRiwayatLPD->where('id_aksi_lpd', AKSI_LPD_DIAJUKAN)->first()->created_at)),
                'id_kategori_tujuan' => isset($lpd->id_kategori_tujuan) ? $lpd->id_kategori_tujuan : '',
                'nama_kategori_tujuan' => isset($lpd->id_kategori_tujuan) ? $lpd->kategoriTujuan->nama : '',
                'kota_tujuan' => trim($lpd->kota_tujuan),
                // 'waktu_keberangkatan' => isset($lpd->waktu_keberangkatan) ? date('Y-m-d H:i:s', strtotime($lpd->waktu_keberangkatan)) : '',
                'nama_waktu_keberangkatan' => isset($lpd->hasDetailKeberangkatanLPD->waktu_keberangkatan) ? $this->convertToIndonesiaTime(strtotime($lpd->hasDetailKeberangkatanLPD->waktu_keberangkatan)) . ' WIB' : '',
                // 'waktu_kepulangan' => isset($lpd->waktu_kepulangan) ? date('Y-m-d H:i:s', strtotime($lpd->waktu_kepulangan)) : '',
                // 'nama_waktu_kepulangan' => isset($lpd->waktu_kepulangan) ? $this->convertToIndonesiaTime(strtotime($lpd->waktu_kepulangan)) : '',
                'pengusul' => $this->convertNamaPejabat($lpd->createdBy),
                'nama_pengusul' => $lpd->createdBy->user->profil_user->nama,
                'nama_waktu_buat' => $this->convertToIndonesiaTime(strtotime($lpd->created_at)),
                'nama_waktu_ubah' => $this->convertToIndonesiaTime(strtotime($lpd->updated_at)),
                'waktu_ubah' => date('Y-m-d H:i:s', strtotime($lpd->updated_at))
            ];
        }

        return $data_lpd;
    }

    protected function drafLPDSelesai($id_juu = NULL)
    {
        if ($id_juu == NULL) return [];

        $daftar_lpd = LPD::where('created_by', $id_juu)
            ->where('status', STATUS_LPD_DIBAYARKAN)
            ->orderBy('updated_at', 'desc')
            ->get();

        $data_lpd = [];
        foreach ($daftar_lpd as $lpd) {
            $data_lpd[] = (object) [
                'id' => $lpd->id,
                'tanggal_pengajuan' => $this->convertToIndonesiaDate(strtotime($lpd->hasRiwayatLPD->where('id_aksi_lpd', AKSI_LPD_KIRIM)->first()->created_at)),
                'tanggal_disetujui' => $this->convertToIndonesiaDate(strtotime($lpd->approved_at)),
                'tanggal_diajukan' => $this->convertToIndonesiaDate(strtotime($lpd->hasRiwayatLPD->where('id_aksi_lpd', AKSI_LPD_DIAJUKAN)->first()->created_at)),
                'tanggal_dibayarkan' => $this->convertToIndonesiaDate(strtotime($lpd->hasRiwayatLPD->where('id_aksi_lpd', AKSI_LPD_DIBAYARKAN)->first()->created_at)),
                'id_kategori_tujuan' => isset($lpd->id_kategori_tujuan) ? $lpd->id_kategori_tujuan : '',
                'nama_kategori_tujuan' => isset($lpd->id_kategori_tujuan) ? $lpd->kategoriTujuan->nama : '',
                'kota_tujuan' => trim($lpd->kota_tujuan),
                'nomor' => $lpd->hasPenomoranLPD->nomor,
                // 'waktu_keberangkatan' => isset($lpd->waktu_keberangkatan) ? date('Y-m-d H:i:s', strtotime($lpd->waktu_keberangkatan)) : '',
                'nama_waktu_keberangkatan' => isset($lpd->hasDetailKeberangkatanLPD->waktu_keberangkatan) ? $this->convertToIndonesiaTime(strtotime($lpd->hasDetailKeberangkatanLPD->waktu_keberangkatan)) . ' WIB' : '',
                // 'waktu_kepulangan' => isset($lpd->waktu_kepulangan) ? date('Y-m-d H:i:s', strtotime($lpd->waktu_kepulangan)) : '',
                // 'nama_waktu_kepulangan' => isset($lpd->waktu_kepulangan) ? $this->convertToIndonesiaTime(strtotime($lpd->waktu_kepulangan)) : '',
                'pengusul' => $this->convertNamaPejabat($lpd->createdBy),
                'nama_pengusul' => $lpd->createdBy->user->profil_user->nama,
                'nama_waktu_buat' => $this->convertToIndonesiaTime(strtotime($lpd->created_at)),
                'nama_waktu_ubah' => $this->convertToIndonesiaTime(strtotime($lpd->updated_at)),
                'waktu_ubah' => date('Y-m-d H:i:s', strtotime($lpd->updated_at))
            ];
        }

        return $data_lpd;
    }

    protected function drafLPDDitolak($id_juu = NULL)
    {
        if ($id_juu == NULL) return [];

        $daftar_lpd = LPD::where('created_by', $id_juu)
            ->where('status', STATUS_LPD_DITOLAK)
            ->orderBy('updated_at', 'desc')
            ->get();

        $data_lpd = [];
        foreach ($daftar_lpd as $lpd) {
            $data_lpd[] = (object) [
                'id' => $lpd->id,
                'tanggal_ditolak' => $this->convertToIndonesiaDate(strtotime($lpd->hasRiwayatLPD->where('id_aksi_lpd', AKSI_LPD_TOLAK)->first()->created_at)),
                'id_kategori_tujuan' => isset($lpd->id_kategori_tujuan) ? $lpd->id_kategori_tujuan : '',
                'nama_kategori_tujuan' => isset($lpd->id_kategori_tujuan) ? $lpd->kategoriTujuan->nama : '',
                'kota_tujuan' => trim($lpd->kota_tujuan),
                'alasan' => trim($lpd->hasRiwayatLPD->where('id_aksi_lpd', AKSI_LPD_TOLAK)->first()->keterangan),
                // 'waktu_keberangkatan' => isset($lpd->waktu_keberangkatan) ? date('Y-m-d H:i:s', strtotime($lpd->waktu_keberangkatan)) : '',
                'nama_waktu_keberangkatan' => isset($lpd->hasDetailKeberangkatanLPD->waktu_keberangkatan) ? $this->convertToIndonesiaTime(strtotime($lpd->hasDetailKeberangkatanLPD->waktu_keberangkatan)) . ' WIB' : '',
                // 'waktu_kepulangan' => isset($lpd->waktu_kepulangan) ? date('Y-m-d H:i:s', strtotime($lpd->waktu_kepulangan)) : '',
                // 'nama_waktu_kepulangan' => isset($lpd->waktu_kepulangan) ? $this->convertToIndonesiaTime(strtotime($lpd->waktu_kepulangan)) : '',
                'pengusul' => $this->convertNamaPejabat($lpd->createdBy),
                'nama_pengusul' => $lpd->createdBy->user->profil_user->nama,
                'nama_waktu_buat' => $this->convertToIndonesiaTime(strtotime($lpd->created_at)),
                'nama_waktu_ubah' => $this->convertToIndonesiaTime(strtotime($lpd->updated_at)),
                'waktu_ubah' => date('Y-m-d H:i:s', strtotime($lpd->updated_at))
            ];
        }

        return $data_lpd;
    }

    protected function rekapLPD($id_juu = NULL, $tanggal_awal = NULL, $tanggal_akhir = NULL)
    {
        $daftar_unit = PenerimaLPD::where('id_juu', $id_juu)->pluck('id_unit');

        if (in_array(ID_KANTOR_PUSAT, $daftar_unit->toArray())) $daftar_lpd = LPD::where('status', STATUS_LPD_DIBAYARKAN);
        else {
            $daftar_juu = JabatanUnitUser::where(function ($query) use ($daftar_unit) {
                    $query->where(function ($q1) use ($daftar_unit) { $q1->whereIn('id_jabatan_unit', JabatanUnit::whereIn('id_unit', $daftar_unit)->pluck('id'))->whereNull('id_unit_khusus'); })
                        ->orWhere(function ($q2) use ($daftar_unit) { $q2->whereIn('id_unit_khusus', $daftar_unit); });
                })
                ->where('id_jenis_juu', JENIS_JKU_ASLI)
                ->pluck('id');

            $daftar_lpd = LPD::where('status', STATUS_LPD_DIBAYARKAN)->whereIn('created_by', $daftar_juu);
        }

        if ($tanggal_awal AND $tanggal_akhir) $daftar_lpd = $daftar_lpd->where('updated_at', '>=', date('Y-m-d', strtotime($tanggal_awal)) . ' 00:00:00')->where('updated_at', '<=', date('Y-m-d', strtotime($tanggal_akhir)) . ' 23:59:59');
        elseif ($tanggal_awal) $daftar_lpd = $daftar_lpd->where('updated_at', '>=', date('Y-m-d', strtotime($tanggal_awal)) . ' 00:00:00')->where('updated_at', '<=', date('Y-m-d', strtotime($tanggal_awal)) . ' 23:59:59');
        elseif ($tanggal_akhir) $daftar_lpd = $daftar_lpd->where('updated_at', '>=', date('Y-m-d', strtotime($tanggal_akhir)) . ' 00:00:00')->where('updated_at', '<=', date('Y-m-d', strtotime($tanggal_akhir)) . ' 23:59:59');

        $daftar_lpd = $daftar_lpd->orderBy('updated_at', 'desc')->get();

        $data_lpd = [];
        foreach ($daftar_lpd as $lpd) {
            $data_lpd[] = [
                'id' => $lpd->id,
                'kategori_tujuan' => $lpd->kategoriTujuan->nama,
                // 'negara_tujuan' => $lpd->negaraTujuan->nama,
                'kota_tujuan' => trim($lpd->kota_tujuan),
                'nomor' => $lpd->hasPenomoranLPD->nomor,
                'nama_waktu_keberangkatan' => isset($lpd->hasDetailKeberangkatanLPD->waktu_keberangkatan) ? $this->convertToIndonesiaTime(strtotime($lpd->hasDetailKeberangkatanLPD->waktu_keberangkatan)) . ' WIB' : '',
                'tanggal_pengajuan' => $this->convertToIndonesiaDate(strtotime($lpd->hasRiwayatLPD->where('id_aksi_lpd', AKSI_LPD_KIRIM)->first()->created_at)),
                'tanggal_disetujui' => $this->convertToIndonesiaDate(strtotime($lpd->approved_at)),
                'tanggal_diajukan' => $this->convertToIndonesiaDate(strtotime($lpd->hasRiwayatLPD->where('id_aksi_lpd', AKSI_LPD_DIAJUKAN)->first()->created_at)),
                'tanggal_dibayarkan' => $this->convertToIndonesiaDate(strtotime($lpd->hasRiwayatLPD->where('id_aksi_lpd', AKSI_LPD_DIBAYARKAN)->first()->created_at)),
                'pengusul' => $this->convertNamaPejabat($lpd->createdBy),
                'nama_pengusul' => $lpd->createdBy->user->profil_user->nama,
                'order_by' => date('Y-m-d H:i:s', strtotime($lpd->hasRiwayatLPD->where('id_aksi_lpd', AKSI_LPD_DIBAYARKAN)->first()->created_at)),
            ];
        }

        return $data_lpd;
    }

    protected function notifikasiPengajuLPD($lpd = NULL) {
        if (is_null($lpd)) return false;

        $riwayat_lpd = $lpd->hasRiwayatLPD->last();

        $detail = '';
        $link = '';
        if ($riwayat_lpd->id_aksi_lpd == AKSI_LPD_SETUJU) { $detail = 'disetujui dan akan diajukan ke bagian keuangan'; $link = 'e-hrd/e-lpd/approval/monitor/' . $lpd->id; }
        elseif ($riwayat_lpd->id_aksi_lpd == AKSI_LPD_KEMBALI) { $detail = 'dikembalikan'; $link = 'e-hrd/e-lpd/list/draf/all'; }
        elseif ($riwayat_lpd->id_aksi_lpd == AKSI_LPD_TOLAK) { $detail = 'ditolak'; $link = 'e-hrd/e-lpd/list/ditolak/all'; }
        elseif ($riwayat_lpd->id_aksi_lpd == AKSI_LPD_DIAJUKAN) { $detail = 'diajukan ke bagian keuangan'; $link = 'e-hrd/e-lpd/approval/monitor/' . $lpd->id; }
        else { $detail = 'dibayarkan kembali oleh bagian keuangan'; $link = 'e-hrd/e-lpd/list/selesai/all'; }

        $data_email = [
            'nama_pemeriksa' => $riwayat_lpd->juu->user->profil_user->nama,
            'jabatan_unit_pemeriksa' => $this->convertNamaPejabat($riwayat_lpd->juu),
            'kategori_tujuan' => $lpd->kategoriTujuan->nama,
            'kota_tujuan' => $lpd->kota_tujuan,
            'detail' => $detail,
            'nama_pengaju' => $lpd->createdBy->user->profil_user->nama,
            'jabatan_unit_pengaju' => $this->convertNamaPejabat($lpd->createdBy)
        ];

        if (isset($lpd->createdBy->user->profil_user->email) AND $lpd->createdBy->user->is_notified == true) {
            $data_email['link'] = env('FRONTEND_URL') . $link;

            Mail::send('email.lpd.pengaju', $data_email, function($message) use ($lpd) {
                $message->to($lpd->createdBy->user->profil_user->email, $lpd->createdBy->user->profil_user->nama)
                        ->subject('[OA] Persetujuan LPD');
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

    protected function notifikasiPemeriksaLPD($lpd = NULL)
    {
        if (is_null($lpd)) return false;

        $link = 'e-hrd/e-lpd/approval/butuh-proses/' . $lpd->id;
        $data_email = [
            'nama_pemeriksa' => $lpd->juuPosisi->user->profil_user->nama,
            'jabatan_unit_pemeriksa' => $this->convertNamaPejabat($lpd->juuPosisi),
            'kategori_tujuan' => $lpd->kategoriTujuan->nama,
            'kota_tujuan' => $lpd->kota_tujuan,
            'nama_pengaju' => $lpd->createdBy->user->profil_user->nama,
            'jabatan_unit_pengaju' => $this->convertNamaPejabat($lpd->createdBy)
        ];

        if (isset($lpd->juuPosisi->user->profil_user->email) AND $lpd->juuPosisi->user->is_notified == true) {
            $data_email['link'] = env('FRONTEND_URL') . $link;

            Mail::send('email.lpd.pemeriksa', $data_email, function($message) use ($lpd) {
                $message->to($lpd->juuPosisi->user->profil_user->email, $lpd->juuPosisi->user->profil_user->nama)
                        ->subject('[OA] LPD Butuh Proses');
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

    protected function generatePDFLPD($lpd = NULL, $header_footer = true, $qrcode = true)
    {
        if (is_null($lpd)) return '';

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
                            <img  src="' . base_path('public/lpd/logo.PNG') . '">
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
                    <div style="padding-bottom: 50px;"></div>
                    <h2 style="padding-bottom: -20px;">
                        <span style="border-bottom-width: 2px; border-bottom-style: solid; padding-bottom: 3px">
                            LAPORAN PERJALANAN DINAS
                        </span>
                    </h2>
                </div>';

        $flag = 0;
        $pengaju_html = '
                <div style="margin-left: 50px; margin-top: 30px">
                    <table class="no-border" width="100%" cellspacing="2" cellpadding="0" border="0" align="left" bgcolor="#ffffff">
                        <tr bgcolor="#ffffff">
                            <td width="20%" height="20" valign="top" style="padding-top:0px;">Nomor</td>
                            <td width="2%" valign="top" style="padding-top:0px;">: </td>
                            <td width="73%" style="padding-top:0px;">' . ($lpd->hasPenomoranLPD->nomor) . '</td>
                            <td width="5%" ></td>
                        </tr>
                        <tr bgcolor="#ffffff">
                            <td width="20%" height="20" valign="top" style="padding-top:0px;">Nama</td>
                            <td width="2%" valign="top" style="padding-top:0px;">: </td>
                            <td width="73%" style="padding-top:0px;">' . $lpd->createdBy->user->profil_user->nama . '</td>
                            <td width="5%" ></td>
                        </tr>
                        <tr bgcolor="#ffffff">
                            <td width="20%" height="20" valign="top">Jabatan</td>
                            <td width="2%" valign="top">: </td>
                            <td width="73%">' . $this->convertNamaPejabat($lpd->createdBy) . '</td>
                            <td width="5%" ></td>
                        </tr>
                        <tr bgcolor="#ffffff">
                            <td width="20%" height="20" valign="top">Kategori Tujuan</td>
                            <td width="2%" valign="top">: </td>
                            <td width="73%">' . $lpd->kategoriTujuan->nama . '</td>
                            <td width="5%" ></td>
                        </tr>
                        <tr bgcolor="#ffffff">
                            <td width="20%" height="20" valign="top">Kota Tujuan</td>
                            <td width="2%" valign="top">: </td>
                            <td width="73%">' . ucwords(strtolower(trim($lpd->kota_tujuan))) . '</td>
                            <td width="5%" ></td>
                        </tr>
                        <tr bgcolor="#ffffff">
                            <td width="20%" height="20" valign="top">Maksud Dinas</td>
                            <td width="2%" valign="top">: </td>
                            <td width="73%">' . trim($lpd->keterangan) . '</td>
                            <td width="5%" ></td>
                        </tr>
                    </table>
                </div>';

        $pengajuan_html = '
                <div style="margin-left: 50px">
                    <table class="no-border" width="100%" cellspacing="2" cellpadding="0" border="0" align="left" bgcolor="#ffffff">
                        <tr><td width="100%" colspan="2"><br></td></tr>
                        <tr>
                            <td width="5%" ><b>I</b></td>
                            <td width="95%"><b>DETAIL PERJALANAN DINAS</b></td>
                        </tr>
                    </table>
                </div>';

        $no = 0;
        $total = 0;
        $detail_html = '';
        // foreach ($lpd->hasDetailKeberangkatanLPD as $detail) {
            // $total += $detail->harga;
        $detail_html .= '
                    <tr>
                        <td width="5%" ><b>I.1</b></td>
                        <td width="95%" colspan="4"><b>DETAIL KEBERANGKATAN</b></td>
                    </tr>
                    <tr bgcolor="#ffffff">
                        <td width="5%" ></td>
                        <td width="22%">Waktu Berangkat</td>
                        <td width="35%">: ' . (isset($lpd->hasDetailKeberangkatanLPD->waktu_keberangkatan) ? $this->convertToIndonesiaDate(strtotime($lpd->hasDetailKeberangkatanLPD->waktu_keberangkatan)) : '') . '</td>
                        <td width="8%">Jam</td>
                        <td width="30%">: ' . (isset($lpd->hasDetailKeberangkatanLPD->waktu_keberangkatan) ? date('H:i', strtotime($lpd->hasDetailKeberangkatanLPD->waktu_keberangkatan)) : '') . ' WIB</td>
                    </tr>
                    <tr bgcolor="#ffffff">
                        <td width="5%" ></td>
                        <td width="22%">Kategori Transportasi</td>
                        <td width="35%">: ' . (isset($lpd->hasDetailKeberangkatanLPD->kategoriTransportasi) ? strtoupper($lpd->hasDetailKeberangkatanLPD->kategoriTransportasi->nama) : '') . '</td>
                        <td width="8%">' . (isset($lpd->hasDetailKeberangkatanLPD->kategoriTransportasi) ? ($lpd->hasDetailKeberangkatanLPD->kategoriTransportasi->id == KATEGORI_TRANSPORTASI_UMUM ? 'Jenis' : '') : '') . '</td>
                        <td width="30%">' . (isset($lpd->hasDetailKeberangkatanLPD->kategoriTransportasi) ? ($lpd->hasDetailKeberangkatanLPD->kategoriTransportasi->id == KATEGORI_TRANSPORTASI_UMUM ? (isset($lpd->hasDetailKeberangkatanLPD->jenisTransportasi) ? ': ' . strtoupper($lpd->hasDetailKeberangkatanLPD->jenisTransportasi->nama) : '' ) : '') : '') . '</td>
                    </tr>
                    ' . (isset($lpd->hasDetailKeberangkatanLPD->kategoriTransportasi) ? ($lpd->hasDetailKeberangkatanLPD->kategoriTransportasi->id == KATEGORI_TRANSPORTASI_UMUM ? '
                    <tr bgcolor="#ffffff">
                        <td width="5%" ></td>
                        <td width="22%">Nama Transportasi</td>
                        <td width="35%">: ' . trim($lpd->hasDetailKeberangkatanLPD->nama_transportasi) . '</td>
                        <td width="8%"></td>
                        <td width="30%"></td>
                    </tr>
                    <tr bgcolor="#ffffff">
                        <td width="5%" ></td>
                        <td width="22%">Status Pembayaran</td>
                        <td width="35%">: ' . (isset($lpd->hasDetailKeberangkatanLPD->kategoriPembayaran) ? strtoupper($lpd->hasDetailKeberangkatanLPD->kategoriPembayaran->nama) : '') . '</td>
                        <td width="8%">Harga</td>
                        <td width="30%">: Rp. ' . number_format($lpd->hasDetailKeberangkatanLPD->harga, 2, ",", ".") . '</td>
                    </tr>
                    ' : '') : '') . '
        ';

        $detail_html .= '
                    <tr>
                        <td width="5%" ><b>I.2</b></td>
                        <td width="95%" colspan="4"><b>DETAIL PENGINAPAN</b></td>
                    </tr>
                    <tr bgcolor="#ffffff">
                        <td width="5%" ></td>
                        <td width="22%">Jumlah Menginap</td>
                        <td width="38%" colspan="3">: ' . $lpd->hasDetailPenginapanLPD->malam . ' MALAM</td>
                    </tr>
                    <tr bgcolor="#ffffff">
                        <td width="5%" ></td>
                        <td width="22%">Nama Penginapan</td>
                        <td width="38%" colspan="3">: ' . trim($lpd->hasDetailPenginapanLPD->nama_penginapan) . '</td>
                    </tr>
                    <tr bgcolor="#ffffff">
                        <td width="5%" ></td>
                        <td width="22%">Status Pembayaran</td>
                        <td width="35%">: ' . (isset($lpd->hasDetailPenginapanLPD->kategoriPembayaran) ? strtoupper($lpd->hasDetailPenginapanLPD->kategoriPembayaran->nama) : '') . '</td>
                        <td width="8%">Harga</td>
                        <td width="30%">: Rp. ' . number_format($lpd->hasDetailPenginapanLPD->harga, 2, ",", ".") . '</td>
                    </tr>
        ';

        $detail_html .= '
                    <tr>
                        <td width="5%" ><b>I.3</b></td>
                        <td width="95%" colspan="4"><b>DETAIL KEPULANGAN</b></td>
                    </tr>
                    <tr bgcolor="#ffffff">
                        <td width="5%" ></td>
                        <td width="22%">Waktu Pulang</td>
                        <td width="35%">: ' . (isset($lpd->hasDetailKepulanganLPD->waktu_keberangkatan) ? $this->convertToIndonesiaDate(strtotime($lpd->hasDetailKepulanganLPD->waktu_keberangkatan)) : '') . '</td>
                        <td width="8%">Jam</td>
                        <td width="30%">: ' . (isset($lpd->hasDetailKepulanganLPD->waktu_keberangkatan) ? date('H:i', strtotime($lpd->hasDetailKepulanganLPD->waktu_keberangkatan)) : '') . ' WIB</td>
                    </tr>
                    <tr bgcolor="#ffffff">
                        <td width="5%" ></td>
                        <td width="22%">Waktu Tiba</td>
                        <td width="35%">: ' . (isset($lpd->hasDetailKepulanganLPD->waktu_tiba) ? $this->convertToIndonesiaDate(strtotime($lpd->hasDetailKepulanganLPD->waktu_tiba)) : '') . '</td>
                        <td width="8%">Jam</td>
                        <td width="30%">: ' . (isset($lpd->hasDetailKepulanganLPD->waktu_tiba) ? date('H:i', strtotime($lpd->hasDetailKepulanganLPD->waktu_tiba)) : '') . ' WIB</td>
                    </tr>
                    <tr bgcolor="#ffffff">
                        <td width="5%" ></td>
                        <td width="22%">Kategori Transportasi</td>
                        <td width="35%">: ' . (isset($lpd->hasDetailKepulanganLPD->kategoriTransportasi) ? strtoupper($lpd->hasDetailKepulanganLPD->kategoriTransportasi->nama) : '') . '</td>
                        <td width="8%">' . (isset($lpd->hasDetailKepulanganLPD->kategoriTransportasi) ? ($lpd->hasDetailKepulanganLPD->kategoriTransportasi->id == KATEGORI_TRANSPORTASI_UMUM ? 'Jenis' : '') : '') . '</td>
                        <td width="30%">' . (isset($lpd->hasDetailKepulanganLPD->kategoriTransportasi) ? ($lpd->hasDetailKepulanganLPD->kategoriTransportasi->id == KATEGORI_TRANSPORTASI_UMUM ? (isset($lpd->hasDetailKepulanganLPD->jenisTransportasi) ? ': ' . strtoupper($lpd->hasDetailKepulanganLPD->jenisTransportasi->nama) : '' ) : '') : '') . '</td>
                    </tr>
                    ' . (isset($lpd->hasDetailKepulanganLPD->kategoriTransportasi) ? ($lpd->hasDetailKepulanganLPD->kategoriTransportasi->id == KATEGORI_TRANSPORTASI_UMUM ? '
                    <tr bgcolor="#ffffff">
                        <td width="5%" ></td>
                        <td width="22%">Nama Transportasi</td>
                        <td width="35%">: ' . trim($lpd->hasDetailKepulanganLPD->nama_transportasi) . '</td>
                        <td width="8%"></td>
                        <td width="30%"></td>
                    </tr>
                    <tr bgcolor="#ffffff">
                        <td width="5%" ></td>
                        <td width="22%">Status Pembayaran</td>
                        <td width="35%">: ' . (isset($lpd->hasDetailKepulanganLPD->kategoriPembayaran) ? strtoupper($lpd->hasDetailKepulanganLPD->kategoriPembayaran->nama) : '') . '</td>
                        <td width="8%">Harga</td>
                        <td width="30%">: Rp. ' . number_format($lpd->hasDetailKepulanganLPD->harga, 2, ",", ".") . '</td>
                    </tr>
                    ' : '') : '') . '
        ';
        /*
        // }
        // foreach ($lpd->hasDetailPenginapanLPD as $detail) {
            // $total += $detail->harga;
        $rincian = (isset($lpd->hasDetailPenginapanLPD->nama_penginapan) ? ucwords(strtolower(trim($lpd->hasDetailPenginapanLPD->nama_penginapan))) . '/' . (isset($lpd->hasDetailPenginapanLPD->malam) ? $lpd->hasDetailPenginapanLPD->malam . ' malam' : '') : '');
        $detail_html .= '
                    <tr bgcolor="#ffffff">
                        <td width="5%" style="padding: 2px; text-align:center; border: 1px solid black;border-collapse: collapse;">' . ++$no . '</td>
                        <td width="60%" style="padding: 2px; text-align:left; border: 1px solid black;border-collapse: collapse;">' . $rincian . '</td>
                        <td width="15%" style="padding: 2px; text-align:center; border: 1px solid black;border-collapse: collapse;">' . $lpd->hasDetailPenginapanLPD->kategoriPembayaran->kode . '</td>
                        <td width="20%" style="padding: 2px; text-align:right; border: 1px solid black;border-collapse: collapse;">Rp. ' . number_format($lpd->hasDetailPenginapanLPD->harga, 2, ",", ".") . '</td>
                    </tr>
        ';
        // }
        // foreach ($lpd->hasDetailKepulanganLPD as $detail) {
            // $total += $detail->harga;
        $rincian = $lpd->hasDetailKepulanganLPD->kategoriTransportasi->nama . (isset($lpd->hasDetailKepulanganLPD->jenisTransportasi) ? ' - ' . $lpd->hasDetailKepulanganLPD->jenisTransportasi->nama : '') . (isset($lpd->hasDetailKepulanganLPD->kelasTransportasi) ? ' - ' . $lpd->hasDetailKepulanganLPD->kelasTransportasi->nama : '') . (isset($lpd->hasDetailKepulanganLPD->nama_transportasi) ? ' (' . ucwords(strtolower(trim($lpd->hasDetailKepulanganLPD->nama_transportasi))) . ')' : '');
        $detail_html .= '
                    <tr bgcolor="#ffffff">
                        <td width="5%" style="padding: 2px; text-align:center; border: 1px solid black;border-collapse: collapse;">' . ++$no . '</td>
                        <td width="60%" style="padding: 2px; text-align:left; border: 1px solid black;border-collapse: collapse;">' . $rincian . '</td>
                        <td width="15%" style="padding: 2px; text-align:center; border: 1px solid black;border-collapse: collapse;">' . $lpd->hasDetailKepulanganLPD->kategoriPembayaran->kode . '</td>
                        <td width="20%" style="padding: 2px; text-align:right; border: 1px solid black;border-collapse: collapse;">Rp. ' . number_format($lpd->hasDetailKepulanganLPD->harga, 2, ",", ".") . '</td>
                    </tr>
        ';
        // }
        // $detail_html .= '
        //             <tr bgcolor="#ffffff">
        //                 <td width="80%" style="padding: 2px 5px; text-align:right; border: 1px solid black;border-collapse: collapse;" colspan="3">Total</td>
        //                 <td width="20%" style="padding: 2px; text-align:right; border: 1px solid black;border-collapse: collapse;">Rp. ' . number_format($total, 2, ",", ".") . '</td>
        //             </tr>
        // ';
        */
        $data_html = '
                <div style="margin-left: 50px">
                    <table class="no-border" width="100%" cellspacing="2" cellpadding="0" border="0" align="left" bgcolor="#ffffff">
                        ' . $detail_html . '
                    </table>
                </div>';

        $penutup_html = '
                <div style="margin-left: 50px">
                    <table class="no-border" width="100%" cellspacing="2" cellpadding="0" border="0" align="left" bgcolor="#ffffff">
                        <tr><td width="100%"><br></td></tr>
                        <tr><td width="100%">Demikian laporan perjalanan dinas ini dibuat dengan sebenar-benarnya.</td></tr>
                        <tr><td width="100%"><br></td></tr>
                    </table>
                </div>';

        $html .= $header_html . $pengaju_html . $pengajuan_html . $data_html . $penutup_html;

        $ttd_html = '
            <div style="margin-left: 50px;margin-right: 0px;margin-top: 25px;text-align:justify;">
                <table class="no-border" style="margin-top: 0px;" width="100%" cellspacing="2" cellpadding="0" border="0" align="right" bgcolor="#ffffff">
                    <tr bgcolor="#ffffff">
                        <td width="50%" style="text-align: center">
                            <p style="text-align: center; padding-bottom: 10px;">Diajukan oleh :</p>
                            <p style="text-align: center; padding-bottom: 10px;">Tanggal : ' . (is_null($lpd->hasRiwayatLPD->where('id_aksi_lpd', AKSI_LPD_KIRIM)->first()) ? '-' : $this->convertToIndonesiaDate(strtotime($lpd->hasRiwayatLPD->where('id_aksi_lpd', AKSI_LPD_KIRIM)->first()->created_at))) . '</p>
                            <div style="width: 100%; margin-top: 30px; text-align:center; padding-bottom: 5px">
                                <img style="width: 100px; margin-top: 10px; margin-bottom: 10px;" src="' . (isset($lpd->hasQRCodeLPD->path) ? base_path($lpd->hasQRCodeLPD->path) : base_path('public/lpd/pengusul.png')) . '">
                            </div>
                            <p style="text-align: center; font-weight: bold; padding-bottom: 0px; padding-top: 5px">
                                <span style="border-bottom-width: 2px; border-bottom-style: solid; padding-bottom: 10px">
                                    '.(isset($lpd->createdBy->user->profil_user->nama) ? $lpd->createdBy->user->profil_user->nama : "kosong").'
                                </span>
                            </p>
                            <p style="text-align: center">
                                '.(isset($lpd->createdBy->jabatan_unit->jabatan->nama) ? $lpd->createdBy->jabatan_unit->jabatan->nama : "-").'
                            </p>
                        </td>
                        <td width="50%" style="text-align: center">
                            <p style="text-align: center; padding-bottom: 10px;">Disetujui oleh :</p>
                            <p style="text-align: center; padding-bottom: 10px;">Tanggal : ' . (isset($lpd->approved_at) ? $this->convertToIndonesiaDate(strtotime($lpd->approved_at)) : '-') . '</p>
                            <div style="width: 100%; margin-top: 30px; text-align:center; margin-bottom: 5px">
                                <img style="width: 100px; margin-top: 10px; margin-bottom: 10px;" src="' . (isset($lpd->hasPemeriksaLPD->path) ? base_path($lpd->hasPemeriksaLPD->path) : base_path('public/lpd/pemeriksa.png')) . '">
                            </div>
                            <p style="text-align: center; font-weight: bold; padding-bottom: 0px; padding-top: 5px">
                                <span style="border-bottom-width: 2px; border-bottom-style: solid; padding-bottom: 10px">
                                    '.(isset($lpd->hasPemeriksaLPD->juuPemeriksa->user->profil_user->nama) ? $lpd->hasPemeriksaLPD->juuPemeriksa->user->profil_user->nama : "kosong").'
                                </span>
                            </p>
                            <p style="text-align: center">
                                '.(isset($lpd->hasPemeriksaLPD->juuPemeriksa->jabatan_unit->jabatan->nama) ? $lpd->hasPemeriksaLPD->juuPemeriksa->jabatan_unit->jabatan->nama : "-").'
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
