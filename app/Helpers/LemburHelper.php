<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Mail;

use App\Models\Master\User;
use App\Models\Master\Unit;
use App\Models\Master\JabatanUnit;
use App\Models\Master\JabatanUnitUser;
use App\Models\ELembur\Lembur;
use App\Models\ELembur\PenerimaLembur;

// use App\Helpers\Helper;

trait LemburHelper
{
    //  use Helper;
    protected function getPemeriksaLembur($juu)
    {
        if (is_null($juu->id_parent)) return false;

        $atasan = JabatanUnitUser::find($juu->id_parent);
        if (is_null($atasan)) return false;

        if ($atasan->jabatan_unit->jabatan->level <= LEVEL_ASMAN) return $atasan->id;
        else return $this->getPemeriksaLembur($atasan);
    }

    protected function drafLembur($id_juu = NULL)
    {
        if ($id_juu == NULL) return [];

        $daftar_lembur = Lembur::where('created_by', $id_juu)
            ->where('posisi', 0)
            ->where('status', STATUS_LEMBUR_DRAF)
            ->orderBy('updated_at', 'desc')
            ->get();

        $data_lembur = [];
        foreach ($daftar_lembur as $lembur) {
            $data_lembur[] = (object) [
                'id' => $lembur->id,
                'deskripsi' => trim($lembur->deskripsi),
                'waktu_mulai' => isset($lembur->waktu_mulai) ? date('Y-m-d H:i:s', strtotime($lembur->waktu_mulai)) : '',
                'waktu_selesai' => isset($lembur->waktu_selesai) ? date('Y-m-d H:i:s', strtotime($lembur->waktu_selesai)) : '',
                'nama_waktu_mulai' => isset($lembur->waktu_mulai) ? $this->convertToIndonesiaTime(strtotime($lembur->waktu_mulai)) : '',
                'nama_waktu_selesai' => isset($lembur->waktu_selesai) ? $this->convertToIndonesiaTime(strtotime($lembur->waktu_selesai)) : '',
                'lokasi' => trim($lembur->lokasi),
                'nama_waktu_buat' => $this->convertToIndonesiaTime(strtotime($lembur->created_at)),
                'nama_waktu_ubah' => $this->convertToIndonesiaTime(strtotime($lembur->updated_at)),
                'waktu_ubah' => date('Y-m-d H:i:s', strtotime($lembur->updated_at))
            ];
        }

        return $data_lembur;
    }

    protected function drafLemburMonitor($id_juu = NULL)
    {
        if ($id_juu == NULL) return [];

        $daftar_lembur = Lembur::where('created_by', $id_juu)
            ->where('posisi', '<>', 0)
            ->where('status', STATUS_LEMBUR_PROSES)
            ->orderBy('updated_at', 'desc')
            ->get();

        $data_lembur = [];
        foreach ($daftar_lembur as $lembur) {
            $tarik = false;
            if ($id_juu == $lembur->created_by AND $lembur->posisi == $lembur->hasPemeriksaLembur->id_juu_pemeriksa AND $lembur->is_opened_by_posisi == false) $tarik = true;

            $data_lembur[] = (object) [
                'id' => $lembur->id,
                'deskripsi' => trim($lembur->deskripsi),
                'waktu_mulai' => isset($lembur->waktu_mulai) ? date('Y-m-d H:i:s', strtotime($lembur->waktu_mulai)) : '',
                'waktu_selesai' => isset($lembur->waktu_selesai) ? date('Y-m-d H:i:s', strtotime($lembur->waktu_selesai)) : '',
                'nama_waktu_mulai' => isset($lembur->waktu_mulai) ? $this->convertToIndonesiaTime(strtotime($lembur->waktu_mulai)) : '',
                'nama_waktu_selesai' => isset($lembur->waktu_selesai) ? $this->convertToIndonesiaTime(strtotime($lembur->waktu_selesai)) : '',
                'lokasi' => trim($lembur->lokasi),
                'tarik' => $tarik,
                'pemeriksa' => $this->convertNamaPejabat($lembur->hasPemeriksaLembur->juuPemeriksa),
                'nama_waktu_buat' => $this->convertToIndonesiaTime(strtotime($lembur->created_at)),
                'nama_waktu_ubah' => $this->convertToIndonesiaTime(strtotime($lembur->updated_at)),
                'waktu_ubah' => date('Y-m-d H:i:s', strtotime($lembur->updated_at))
            ];
        }

        return $data_lembur;
    }

    protected function drafLemburButuhProses($id_juu = NULL)
    {
        if ($id_juu == NULL) return [];

        $daftar_lembur = Lembur::where('posisi', $id_juu)
            ->where('status', STATUS_LEMBUR_PROSES)
            ->orderBy('updated_at', 'desc')
            ->get();

        $data_lembur = [];
        foreach ($daftar_lembur as $lembur) {
            $data_lembur[] = (object) [
                'id' => $lembur->id,
                'deskripsi' => trim($lembur->deskripsi),
                'waktu_mulai' => isset($lembur->waktu_mulai) ? date('Y-m-d H:i:s', strtotime($lembur->waktu_mulai)) : '',
                'waktu_selesai' => isset($lembur->waktu_selesai) ? date('Y-m-d H:i:s', strtotime($lembur->waktu_selesai)) : '',
                'nama_waktu_mulai' => isset($lembur->waktu_mulai) ? $this->convertToIndonesiaTime(strtotime($lembur->waktu_mulai)) : '',
                'nama_waktu_selesai' => isset($lembur->waktu_selesai) ? $this->convertToIndonesiaTime(strtotime($lembur->waktu_selesai)) : '',
                'lokasi' => trim($lembur->lokasi),
                'pengusul' => $this->convertNamaPejabat($lembur->createdBy),
                'nama_pengusul' => $lembur->createdBy->user->profil_user->nama,
                'nama_waktu_buat' => $this->convertToIndonesiaTime(strtotime($lembur->created_at)),
                'nama_waktu_ubah' => $this->convertToIndonesiaTime(strtotime($lembur->updated_at)),
                'waktu_ubah' => date('Y-m-d H:i:s', strtotime($lembur->updated_at))
            ];
        }

        return $data_lembur;
    }

    protected function drafLemburSelesai($id_juu = NULL)
    {
        if ($id_juu == NULL) return [];

        $daftar_lembur = Lembur::where('created_by', $id_juu)
            ->where('status', STATUS_LEMBUR_DISETUJUI)
            ->orderBy('updated_at', 'desc')
            ->get();

        $data_lembur = [];
        foreach ($daftar_lembur as $lembur) {
            $data_lembur[] = (object) [
                'id' => $lembur->id,
                'deskripsi' => trim($lembur->deskripsi),
                'waktu_mulai' => isset($lembur->waktu_mulai) ? date('Y-m-d H:i:s', strtotime($lembur->waktu_mulai)) : '',
                'waktu_selesai' => isset($lembur->waktu_selesai) ? date('Y-m-d H:i:s', strtotime($lembur->waktu_selesai)) : '',
                'nama_waktu_mulai' => isset($lembur->waktu_mulai) ? $this->convertToIndonesiaTime(strtotime($lembur->waktu_mulai)) : '',
                'nama_waktu_selesai' => isset($lembur->waktu_selesai) ? $this->convertToIndonesiaTime(strtotime($lembur->waktu_selesai)) : '',
                'lokasi' => trim($lembur->lokasi),
                'pemeriksa' => $this->convertNamaPejabat($lembur->hasPemeriksaLembur->juuPemeriksa),
                'nama_waktu_buat' => $this->convertToIndonesiaTime(strtotime($lembur->created_at)),
                'nama_waktu_ubah' => $this->convertToIndonesiaTime(strtotime($lembur->updated_at)),
                'waktu_ubah' => date('Y-m-d H:i:s', strtotime($lembur->updated_at))
            ];
        }

        return $data_lembur;
    }

    protected function drafLemburDitolak($id_juu = NULL)
    {
        if ($id_juu == NULL) return [];

        $daftar_lembur = Lembur::where('created_by', $id_juu)
            ->where('status', STATUS_LEMBUR_DITOLAK)
            ->orderBy('updated_at', 'desc')
            ->get();

        $data_lembur = [];
        foreach ($daftar_lembur as $lembur) {
            $data_lembur[] = (object) [
                'id' => $lembur->id,
                'deskripsi' => trim($lembur->deskripsi),
                'waktu_mulai' => isset($lembur->waktu_mulai) ? date('Y-m-d H:i:s', strtotime($lembur->waktu_mulai)) : '',
                'waktu_selesai' => isset($lembur->waktu_selesai) ? date('Y-m-d H:i:s', strtotime($lembur->waktu_selesai)) : '',
                'nama_waktu_mulai' => isset($lembur->waktu_mulai) ? $this->convertToIndonesiaTime(strtotime($lembur->waktu_mulai)) : '',
                'nama_waktu_selesai' => isset($lembur->waktu_selesai) ? $this->convertToIndonesiaTime(strtotime($lembur->waktu_selesai)) : '',
                'lokasi' => trim($lembur->lokasi),
                'pemeriksa' => $this->convertNamaPejabat($lembur->hasPemeriksaLembur->juuPemeriksa),
                'alasan' => trim($lembur->hasRiwayatLembur->where('id_aksi_lembur', AKSI_LEMBUR_TOLAK)->first()->keterangan),
                'nama_waktu_buat' => $this->convertToIndonesiaTime(strtotime($lembur->created_at)),
                'nama_waktu_ubah' => $this->convertToIndonesiaTime(strtotime($lembur->updated_at)),
                'waktu_ubah' => date('Y-m-d H:i:s', strtotime($lembur->updated_at))
            ];
        }

        return $data_lembur;
    }

    protected function drafLemburDibatalkan($id_juu = NULL)
    {
        if ($id_juu == NULL) return [];

        $daftar_lembur = Lembur::where('created_by', $id_juu)
            ->where('status', STATUS_LEMBUR_BATAL)
            ->orderBy('updated_at', 'desc')
            ->get();

        $data_lembur = [];
        foreach ($daftar_lembur as $lembur) {
            $data_lembur[] = (object) [
                'id' => $lembur->id,
                'deskripsi' => trim($lembur->deskripsi),
                'waktu_mulai' => isset($lembur->waktu_mulai) ? date('Y-m-d H:i:s', strtotime($lembur->waktu_mulai)) : '',
                'waktu_selesai' => isset($lembur->waktu_selesai) ? date('Y-m-d H:i:s', strtotime($lembur->waktu_selesai)) : '',
                'nama_waktu_mulai' => isset($lembur->waktu_mulai) ? $this->convertToIndonesiaTime(strtotime($lembur->waktu_mulai)) : '',
                'nama_waktu_selesai' => isset($lembur->waktu_selesai) ? $this->convertToIndonesiaTime(strtotime($lembur->waktu_selesai)) : '',
                'lokasi' => trim($lembur->lokasi),
                'nama_waktu_buat' => $this->convertToIndonesiaTime(strtotime($lembur->created_at)),
                'nama_waktu_ubah' => $this->convertToIndonesiaTime(strtotime($lembur->updated_at)),
                'waktu_ubah' => date('Y-m-d H:i:s', strtotime($lembur->updated_at))
            ];
        }

        return $data_lembur;
    }

    protected function rekapLembur($id_juu = NULL, $tanggal_awal = NULL, $tanggal_akhir = NULL)
    {
        if ($id_juu == NULL) return [];

        $daftar_unit = PenerimaLembur::where('id_juu', $id_juu)->pluck('id_unit');

        if (in_array(ID_KANTOR_PUSAT, $daftar_unit->toArray())) $daftar_lembur = Lembur::where('status', STATUS_LEMBUR_DISETUJUI);
        else {
            $daftar_juu = JabatanUnitUser::where(function ($query) use ($daftar_unit) {
                    $query->where(function ($q1) use ($daftar_unit) { $q1->whereIn('id_jabatan_unit', JabatanUnit::whereIn('id_unit', $daftar_unit)->pluck('id'))->whereNull('id_unit_khusus'); })
                        ->orWhere(function ($q2) use ($daftar_unit) { $q2->whereIn('id_unit_khusus', $daftar_unit); });
                })
                ->where('id_jenis_juu', JENIS_JKU_ASLI)
                ->pluck('id');

            $daftar_lembur = Lembur::where('status', STATUS_LEMBUR_DISETUJUI)->whereIn('created_by', $daftar_juu);
        }

        if ($tanggal_awal AND $tanggal_akhir) $daftar_lembur = $daftar_lembur->where('updated_at', '>=', date('Y-m-d', strtotime($tanggal_awal)) . ' 00:00:00')->where('updated_at', '<=', date('Y-m-d', strtotime($tanggal_akhir)) . ' 23:59:59');
        elseif ($tanggal_awal) $daftar_lembur = $daftar_lembur->where('updated_at', '>=', date('Y-m-d', strtotime($tanggal_awal)) . ' 00:00:00')->where('updated_at', '<=', date('Y-m-d', strtotime($tanggal_awal)) . ' 23:59:59');
        elseif ($tanggal_akhir) $daftar_lembur = $daftar_lembur->where('updated_at', '>=', date('Y-m-d', strtotime($tanggal_akhir)) . ' 00:00:00')->where('updated_at', '<=', date('Y-m-d', strtotime($tanggal_akhir)) . ' 23:59:59');

        $daftar_lembur = $daftar_lembur->orderBy('updated_at', 'desc')->get();
        
        $data_lembur = [];
        foreach ($daftar_lembur as $lembur) {
            $data_lembur[] = [
                'id' => $lembur->id,
                'lokasi' => trim($lembur->lokasi),
                'tanggal_mulai' => $this->convertToIndonesiaDate(strtotime($lembur->waktu_mulai)),
                'tanggal_selesai' => $this->convertToIndonesiaDate(strtotime($lembur->waktu_selesai)),
                'waktu_mulai' => isset($lembur->waktu_mulai) ? date('Y-m-d H:i:s', strtotime($lembur->waktu_mulai)) : '',
                'waktu_selesai' => isset($lembur->waktu_selesai) ? date('Y-m-d H:i:s', strtotime($lembur->waktu_selesai)) : '',
                'nama_waktu_mulai' => isset($lembur->waktu_mulai) ? $this->convertToIndonesiaTime(strtotime($lembur->waktu_mulai)) . ' WIB' : '',
                'nama_waktu_selesai' => isset($lembur->waktu_selesai) ? $this->convertToIndonesiaTime(strtotime($lembur->waktu_selesai)) . ' WIB' : '',
                'tanggal_pengajuan' => $this->convertToIndonesiaDate(strtotime($lembur->hasRiwayatLembur->where('id_aksi_lembur', AKSI_LEMBUR_KIRIM)->first()->created_at)),
                'tanggal_disetujui' => $this->convertToIndonesiaDate(strtotime($lembur->approved_at)),
                'pengusul' => $this->convertNamaPejabat($lembur->createdBy),
                'nama_pengusul' => $lembur->createdBy->user->profil_user->nama,
                'order_by' => date('Y-m-d H:i:s', strtotime($lembur->approved_at)),
            ];
        }

        return $data_lembur;
    }

    protected function notifikasiPengajuLembur($lembur = NULL) {
        if (is_null($lembur)) return false;

        $riwayat_lembur = $lembur->hasRiwayatLembur->last();

        $data_email = [
            'nama_pemeriksa' => $riwayat_lembur->juu->user->profil_user->nama,
            'jabatan_unit_pemeriksa' => $this->convertNamaPejabat($riwayat_lembur->juu),
            'waktu_mulai' => $this->convertToIndonesiaTime(strtotime($lembur->waktu_mulai)),
            'waktu_selesai' => $this->convertToIndonesiaTime(strtotime($lembur->waktu_selesai)),
            'detail' => $riwayat_lembur->id_aksi_lembur == AKSI_LEMBUR_SETUJU ? 'disetujui' : 'ditolak',
            'nama_pengaju' => $lembur->createdBy->user->profil_user->nama,
            'jabatan_unit_pengaju' => $this->convertNamaPejabat($lembur->createdBy)
        ];

        if (isset($lembur->createdBy->user->profil_user->email) AND $lembur->createdBy->user->is_notified == true) {
            $data_email['link'] = env('FRONTEND_URL') . '';

            Mail::send('email.lembur.pengaju', $data_email, function($message) use ($lembur) {
                $message->to($lembur->createdBy->user->profil_user->email, $lembur->createdBy->user->profil_user->nama)
                        ->subject('[OA] Persetujuan Lembur');
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

    protected function notifikasiPemeriksaLembur($lembur = NULL)
    {
        if (is_null($lembur)) return false;

        $data_email = [
            'nama_pemeriksa' => $lembur->juuPosisi->user->profil_user->nama,
            'jabatan_unit_pemeriksa' => $this->convertNamaPejabat($lembur->juuPosisi),
            'waktu_mulai' => $this->convertToIndonesiaTime(strtotime($lembur->waktu_mulai)),
            'waktu_selesai' => $this->convertToIndonesiaTime(strtotime($lembur->waktu_selesai)),
            'nama_pengaju' => $lembur->createdBy->user->profil_user->nama,
            'jabatan_unit_pengaju' => $this->convertNamaPejabat($lembur->createdBy)
        ];

        if (isset($lembur->juuPosisi->user->profil_user->email) AND $lembur->juuPosisi->user->is_notified == true) {
            $data_email['link'] = env('FRONTEND_URL') . '';

            Mail::send('email.lembur.pemeriksa', $data_email, function($message) use ($lembur) {
                $message->to($lembur->juuPosisi->user->profil_user->email, $lembur->juuPosisi->user->profil_user->nama)
                        ->subject('[OA] Lembur Butuh Proses');
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

    protected function generatePDFLembur($lembur = NULL, $header_footer = true, $qrcode = true)
    {
        if (is_null($lembur)) return '';

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
                            <img  src="' . base_path('public/lembur/logo.PNG') . '">
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
                    <div style="padding-bottom: 80px;"></div>
                    <h2 style="padding-bottom: -10px;">
                        <span style="border-bottom-width: 2px; border-bottom-style: solid; padding-bottom: 3px">
                            PENGAJUAN LEMBUR
                        </span>
                    </h2>
                </div>';

        $flag = 0;
        $pengaju_html = '
                <div style="margin-left: 50px">
                    <table class="no-border" width="100%" cellspacing="2" cellpadding="0" border="0" align="left" bgcolor="#ffffff">
                        <tr bgcolor="#ffffff">
                            <td width="70%" style="padding-top:50px;">&nbsp;</td>
                            <td width="30%" style="padding-top:50px;">' . (is_null($lembur->hasRiwayatLembur->where('id_aksi_lembur', AKSI_LEMBUR_KIRIM)->first()) ? '-' : $this->convertToIndonesiaDate(strtotime($lembur->hasRiwayatLembur->where('id_aksi_lembur', AKSI_LEMBUR_KIRIM)->first()->created_at))) . '</td>
                        </tr>
                        <tr bgcolor="#ffffff"><td><br></td></tr>
                    </table>
                </div>
                <div style="margin-left: 50px">
                    <table class="no-border" width="100%" cellspacing="2" cellpadding="0" border="0" align="left" bgcolor="#ffffff">
                        <tr bgcolor="#ffffff">
                            <td width="12%" height="20" valign="top" style="padding-top:0px;">Nama</td>
                            <td width="2%" valign="top" style="padding-top:0px;">: </td>
                            <td width="81%" style="padding-top:0px;">' . $lembur->createdBy->user->profil_user->nama . '</td>
                            <td width="5%" ></td>
                        </tr>
                        <tr bgcolor="#ffffff">
                            <td width="12%" height="20" valign="top">NIK</td>
                            <td width="2%" valign="top">: </td>
                            <td width="81%">' . $lembur->createdBy->user->karyawan->nik . '</td>
                            <td width="5%" ></td>
                        </tr>
                        <tr bgcolor="#ffffff">
                            <td width="12%" height="20" valign="top">Jabatan</td>
                            <td width="2%" valign="top">: </td>
                            <td width="81%">' . $this->convertNamaPejabat($lembur->createdBy) . '</td>
                            <td width="5%" ></td>
                        </tr>
                    </table>
                </div>';

        $pengajuan_html = '
                <div style="margin-left: 50px">
                    <table class="no-border" width="100%" cellspacing="2" cellpadding="0" border="0" align="left" bgcolor="#ffffff">
                        <tr><td width="100%"><br></td></tr>
                        <tr><td width="100%">Mengajukan kebutuhan untuk lembur dengan rincian sebagai berikut :</td></tr>
                        <tr><td width="100%"><br></td></tr>
                    </table>
                </div>';

        $data_html = '
                <div style="margin-left: 50px">
                    <table class="no-border" width="100%" cellspacing="2" cellpadding="0" border="0" align="left" bgcolor="#ffffff">
                        <tr bgcolor="#ffffff">
                            <td width="20%" height="20" valign="top">Tanggal Pengajuan</td>
                            <td width="2%" valign="top">: </td>
                            <td width="73%">' . (is_null($lembur->hasRiwayatLembur->where('id_aksi_lembur', AKSI_LEMBUR_KIRIM)->first()) ? '-' : $this->convertToIndonesiaDate(strtotime($lembur->hasRiwayatLembur->where('id_aksi_lembur', AKSI_LEMBUR_KIRIM)->first()->created_at))) . '</td>
                            <td width="5%" ></td>
                        </tr>
                        <tr bgcolor="#ffffff">
                            <td width="20%" height="20" valign="top">Tanggal Lembur</td>
                            <td width="2%" valign="top">: </td>
                            <td width="73%">' . (isset($lembur->waktu_mulai) ? $this->convertToIndonesiaDate(strtotime($lembur->waktu_mulai)) : '-') . '</td>
                            <td width="5%" ></td>
                        </tr>
                        <tr bgcolor="#ffffff">
                            <td width="20%" height="20" valign="top">Pekerjaan Lembur</td>
                            <td width="2%" valign="top">: </td>
                            <td width="73%">' . trim($lembur->deskripsi) . '</td>
                            <td width="5%" ></td>
                        </tr>
                        <tr bgcolor="#ffffff">
                            <td width="20%" height="20" valign="top">Lokasi Lembur</td>
                            <td width="2%" valign="top">: </td>
                            <td width="73%">' . trim($lembur->lokasi) . '</td>
                            <td width="5%" ></td>
                        </tr>
                        <tr bgcolor="#ffffff">
                            <td width="20%" height="20" valign="top">Waktu</td>
                            <td width="2%" valign="top">: </td>
                            <td width="73%">' . (isset($lembur->waktu_mulai) ? date('H:i', strtotime($lembur->waktu_mulai)) . ' WIB' : '-') . ' s.d ' . (isset($lembur->waktu_selesai) ? date('H:i', strtotime($lembur->waktu_selesai)) . ' WIB' : '-') . '</td>
                            <td width="5%" ></td>
                        </tr>
                        <tr bgcolor="#ffffff"><td><br></td></tr>
                        <tr bgcolor="#ffffff">
                            <td width="20%" height="20" valign="top">Persetujuan Atasan</td>
                            <td width="2%" valign="top">: </td>
                            <td width="73%">' . $lembur->statusLembur->nama . '</td>
                            <td width="5%" ></td>
                        </tr>
                        <tr bgcolor="#ffffff">
                            <td width="20%" height="20" valign="top">Tanggal Persetujuan</td>
                            <td width="2%" valign="top">: </td>
                            <td width="73%">' . (isset($lembur->approved_at) ? $this->convertToIndonesiaDate(strtotime($lembur->approved_at)) : '-') . '</td>
                            <td width="5%" ></td>
                        </tr>
                    </table>
                </div>';

        $html .= $header_html . $pengaju_html . $pengajuan_html . $data_html;

        $ttd_html = '
            <div style="margin-left: 50px;margin-right: 0px;margin-top: 50px;text-align:justify;">
                <table class="no-border" style="margin-top: 0px;" width="100%" cellspacing="2" cellpadding="0" border="0" align="right" bgcolor="#ffffff">
                    <tr bgcolor="#ffffff">
                        <td width="50%" style="text-align: center">
                            <p style="text-align: center; padding-bottom: 10px;">Diajukan oleh :</p>
                            <p style="text-align: center; padding-bottom: 10px;">Tanggal : ' . (is_null($lembur->hasRiwayatLembur->where('id_aksi_lembur', AKSI_LEMBUR_KIRIM)->first()) ? '-' : $this->convertToIndonesiaDate(strtotime($lembur->hasRiwayatLembur->where('id_aksi_lembur', AKSI_LEMBUR_KIRIM)->first()->created_at))) . '</p>
                            <div style="width: 100%; margin-top: 30px; text-align:center; padding-bottom: 5px">
                                <img style="width: 100px; margin-top: 10px; margin-bottom: 10px;" src="' . (isset($lembur->hasQRCodeLembur->path) ? base_path($lembur->hasQRCodeLembur->path) : base_path('public/lembur/pengusul.png')) . '">
                            </div>
                            <p style="text-align: center; font-weight: bold; padding-bottom: 0px; padding-top: 5px">
                                <span style="border-bottom-width: 2px; border-bottom-style: solid; padding-bottom: 10px">
                                    '.(isset($lembur->createdBy->user->profil_user->nama) ? $lembur->createdBy->user->profil_user->nama : "kosong").'
                                </span>
                            </p>
                            <p style="text-align: center">
                                '.(isset($lembur->createdBy->jabatan_unit->jabatan->nama) ? $lembur->createdBy->jabatan_unit->jabatan->nama : "-").'
                            </p>
                        </td>
                        <td width="50%" style="text-align: center">
                            <p style="text-align: center; padding-bottom: 10px;">Disetujui oleh :</p>
                            <p style="text-align: center; padding-bottom: 10px;">Tanggal : ' . (isset($lembur->approved_at) ? $this->convertToIndonesiaDate(strtotime($lembur->approved_at)) : '-') . '</p>
                            <div style="width: 100%; margin-top: 30px; text-align:center; margin-bottom: 5px">
                                <img style="width: 100px; margin-top: 10px; margin-bottom: 10px;" src="' . (isset($lembur->hasPemeriksaLembur->path) ? base_path($lembur->hasPemeriksaLembur->path) : base_path('public/lembur/pemeriksa.png')) . '">
                            </div>
                            <p style="text-align: center; font-weight: bold; padding-bottom: 0px; padding-top: 5px">
                                <span style="border-bottom-width: 2px; border-bottom-style: solid; padding-bottom: 10px">
                                    '.(isset($lembur->hasPemeriksaLembur->juuPemeriksa->user->profil_user->nama) ? $lembur->hasPemeriksaLembur->juuPemeriksa->user->profil_user->nama : "kosong").'
                                </span>
                            </p>
                            <p style="text-align: center">
                                '.(isset($lembur->hasPemeriksaLembur->juuPemeriksa->jabatan_unit->jabatan->nama) ? $lembur->hasPemeriksaLembur->juuPemeriksa->jabatan_unit->jabatan->nama : "-").'
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

    protected function generatePDFDaftarRekapLemburSelesai($daftar_lembur, $pejabat, $header_footer = true, $qrcode = true)
    {
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
                            REKAP PENGAJUAN LEMBUR
                        </span>
                    </h2>
                </div>';

        $flag = 0;
        $pengaju_html = '
                <div style="margin-left: 50px">
                    <table class="no-border" width="100%" cellspacing="2" cellpadding="0" border="0" align="left" bgcolor="#ffffff">
                        <tr bgcolor="#ffffff"><td><br></td></tr>
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

        if ($daftar_lembur->count() == 0) {
            $detail_html .= '
            <tr bgcolor="#ffffff">
                <td width="100%" style="padding: 2px 5px; text-align:center; border: 1px solid black;border-collapse: collapse;" colspan="4">TIDAK ADA DATA</td>
            </tr>
            ';

        } else {
            foreach ($daftar_lembur as $lembur) {
                $detail_html .= '
                <tr bgcolor="#ffffff">
                    <td width="5%" style="padding: 2px; text-align:center; border: 1px solid black;border-collapse: collapse;">' . ++$no . '</td>
                    <td width="50%" style="padding: 2px; text-align:left; border: 1px solid black;border-collapse: collapse;">' . trim($lembur->createdBy->user->profil_user->nama) . '</td>
                    <td width="25%" style="padding: 2px; text-align:center; border: 1px solid black;border-collapse: collapse;">' . $this->convertToIndonesiaDate(strtotime($lembur->waktu_mulai)) . '</td>
                    <td width="20%" style="padding: 2px; text-align:center; border: 1px solid black;border-collapse: collapse;">' . date('H:i', strtotime($lembur->waktu_mulai)) . ' - ' . date('H:i', strtotime($lembur->waktu_selesai)) . ' WIB' . '</td>
                </tr>
                ';
            }
        }


        $data_html = '
                <div style="margin-left: 50px">
                    <table width="100%" cellspacing="0" cellpadding="0" border="0" align="left" bgcolor="#ffffff"  style="border: 1px solid black;border-collapse: collapse;">
                        <tr bgcolor="#ffffff">
                            <td width="5%" style="padding: 2px; text-align:center; border: 1px solid black;border-collapse: collapse;">No</td>
                            <td width="50%" style="padding: 2px; text-align:center; border: 1px solid black;border-collapse: collapse;">Nama</td>
                            <td width="25%" style="padding: 2px; text-align:center; border: 1px solid black;border-collapse: collapse;">Tanggal Lembur</td>
                            <td width="20%" style="padding: 2px; text-align:center; border: 1px solid black;border-collapse: collapse;">Jam Lembur</td>
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
