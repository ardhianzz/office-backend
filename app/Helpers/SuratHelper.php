<?php

namespace App\Helpers;

use App\Models\ESurat\Surat;

trait SuratHelper
{
    //use Helper;

    protected function generateSuratND($surat = NULL, $header_footer = true, $qrcode = true)
    {
        if ($surat == NULL) return '';

        $html = '
        <html>
            <head>
                <style>
                    @page { header: page-header; footer: page-footer; }
                    @page :first { header: page-header-first; footer: page-footer-first; }
                    #header { padding-bottom: 200px; }
                    body { font-family: calibri, sans-serif;  font-size: 12px; }
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
                            <img  src="' . base_path('public/surat/nd/logo.PNG') . '">
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
                        <td width="50%" style="text-align: center">

                        </td>
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
                            N O T A &nbsp; D I N A S
                        </span>
                    </h2>
                    <p style="font-weight: bold; font-size: 13;">No. ' . (isset($surat->penomoran_surat->nomor) ? $surat->penomoran_surat->nomor : '-') . '</p>
                </div>
                <div style="margin-left: 50px">
                    <table class="no-border" width="100%" cellspacing="2" cellpadding="0" border="0" align="left" bgcolor="#ffffff">';

        $flag = 0;
        $penerima_html = '
                        <tr bgcolor="#ffffff">
                            <td width="12%" height="20" valign="top" style="padding-top:50px;">Kepada</td>
                            <td width="2%" valign="top" style="padding-top:50px;">: </td>
                            <td width="81%" style="padding-top:50px;">-</td>
                            <td width="5%" ></td>
                        </tr>';
        foreach ($surat->penerima_surat as $penerima_surat) {
            if ($flag == 0) {
                $penerima_html = '
                        <tr bgcolor="#ffffff">
                            <td width="12%" height="20" valign="top" style="padding-top:30px;">Kepada</td>
                            <td width="2%" valign="top" style="padding-top:30px;">: </td>
                            <td width="81%" style="padding-top:30px;">' . $this->convertNamaPejabat($penerima_surat->juu_penerima, $surat->id_bahasa) . '</td>
                            <td width="5%" ></td>
                        </tr>';
                $flag = 1;
            } else {
                $penerima_html .= '
                        <tr bgcolor="#ffffff">
                            <td width="12%" height="20">&nbsp;</td>
                            <td width="2%">&nbsp;</td>
                            <td width="81%">' . $this->convertNamaPejabat($penerima_surat->juu_penerima, $surat->id_bahasa) . '</td>
                            <td width="5%" ></td>
                        </tr>';
            }
        }

        $pengirim_html = '';
        if (isset($surat->detail_surat->tampilan_dari)) {
            $pengirim_html = '
                        <tr bgcolor="#ffffff">
                            <td width="12%" height="20">Dari</td>
                            <td width="2%">: </td>
                            <td width="81%">' . $surat->detail_surat->tampilan_dari . '</td>
                            <td width="5%" ></td>
                        </tr>';
        } else {
            $pengirim_html = '
                        <tr bgcolor="#ffffff">
                            <td width="12%" height="20">Dari</td>
                            <td width="2%">: </td>
                            <td width="81%">' . (isset($surat->juu_penerbit) ? $this->convertNamaPejabat($surat->juu_penerbit, $surat->id_bahasa) : '-') . '</td>
                            <td width="5%" ></td>
                        </tr>';
        }

        $tanggal_html = '
                        <tr bgcolor="#ffffff">
                            <td width="12%" height="20">Tanggal</td>
                            <td width="2%">: </td>
                            <td width="81%">' . (isset($surat->waktu_terbit) ? $this->convertToIndonesiaDate(strtotime($surat->waktu_terbit)) : ($surat->is_backdate == true ? $this->convertToIndonesiaDate(strtotime($surat->tanggal_backdate)) : $this->convertToIndonesiaDate(strtotime('now')))) . '</td>
                            <td width="5%" ></td>
                        </tr>';

        $perihal_html = '
                        <tr bgcolor="#ffffff">
                            <td width="12%" height="20" valign="top">Perihal</td>
                            <td width="2%" valign="top">: </td>
                            <td width="81%">' . (isset($surat->detail_surat->perihal) ? $surat->detail_surat->perihal : '-') . '</td>
                            <td width="5%" ></td>
                        </tr>';

        $lampiran_html = '
                        <tr bgcolor="#ffffff">
                            <td width="12%" height="20" valign="top">Lampiran</td>
                            <td width="2%" valign="top">: </td>
                            <td width="81%">' . (isset($surat->detail_surat->lampiran) ? $surat->detail_surat->lampiran : '-') . '</td>
                            <td width="5%" ></td>
                        </tr>';

        $html .= $header_html . $penerima_html . $pengirim_html . $tanggal_html . $perihal_html . $lampiran_html;

        $html .= '
                    </table>
                </div>';

        $isi_html = '
                <div style="margin-left: 140px;margin-right: 50px;margin-top: 30px;text-align:justify;">' . (isset($surat->detail_surat->isi) ? $surat->detail_surat->isi : '-') . '
                </div>';
        $html .= $isi_html;

        $qr_code_html = '';
        if ($qrcode) {
            $qr_code_html = '
            <div style="margin-left: auto; width: 55%; margin-top: 30px; text-align:justify;">
                <img style="width: 100px;" src="' . (isset($surat->qrcode_surat) ? base_path($surat->qrcode_surat->path) : base_path('public/surat/nd/draf.png')) . '">
            </div>
            <div style="margin-left: 130px;margin-right: 50px;margin-top: 30px;text-align:justify;">';
        } else {
            $qr_code_html = '<div style="margin-left: 50px;margin-right: 0px;margin-top: 30px;text-align:justify;">';
        }

        $ttd_html = '
                <table class="no-border" style="margin-top: 0px;" width="100%" cellspacing="2" cellpadding="0" border="0" align="right" bgcolor="#ffffff">';

        $numItems = count($surat->pemeriksa_surat);

            if($numItems === 0 or $numItems === 1) {
                if ($surat->detail_surat->jumlah_ttd == 1) {
                      $ttd_html .= '
                        <tr bgcolor="#ffffff">
                            <td width="40%" height="20">

                            </td>
                            <td width="60%" height="20" style="text-align: center">
                                <p style="text-align: center; font-weight: bold; padding-bottom: -15px"><span style="border-bottom-width: 2px; border-bottom-style: solid; padding-bottom: 3px">
                                    ' . (isset($surat->juu_penerbit->user->profil_user->nama) ? $surat->juu_penerbit->user->profil_user->nama : '') . '
                                </span></p>
                                <p style="text-align: center">
                                    '.(isset($surat->juu_penerbit) ? ($surat->detail_surat->id_jenis_pemberkasan == JENIS_PEMBERKASAN_PLN ? $this->convertNamaTampilanPejabat($surat->juu_penerbit, $surat->id_bahasa) : $this->convertNamaPejabat($surat->juu_penerbit, $surat->id_bahasa)) : '') . '
                                </p>
                            </td>
                        </tr>';
                    } else {
                        $ttd_html .= '
                        <tr bgcolor="#ffffff">
                            <td width="40%" height="20">

                            </td>
                            <td width="60%" height="20" style="text-align: center">
                                <p style="text-align: center; font-weight: bold; padding-bottom: -15px"><span style="border-bottom-width: 2px; border-bottom-style: solid; padding-bottom: 3px">
                                    ' . (isset($surat->juu_penerbit->user->profil_user->nama) ? $surat->juu_penerbit->user->profil_user->nama : '') . '
                                </span></p>
                                <p style="text-align: center">
                                    '.(isset($surat->juu_penerbit) ? ($surat->detail_surat->id_jenis_pemberkasan == JENIS_PEMBERKASAN_PLN ? $this->convertNamaTampilanPejabat($surat->juu_penerbit, $surat->id_bahasa) : $this->convertNamaPejabat($surat->juu_penerbit, $surat->id_bahasa)) : '') . '
                                </p>
                            </td>
                        </tr>';
                    }
            } else {
                if ($surat->detail_surat->jumlah_ttd == 1) {
                        $ttd_html .= '
                         <tr bgcolor="#ffffff">
                            <td width="40%" height="20">

                            </td>
                            <td width="60%" height="20" style="text-align: center">
                                <p style="text-align: center; font-weight: bold; padding-bottom: -15px"><span style="border-bottom-width: 2px; border-bottom-style: solid; padding-bottom: 3px">
                                    ' . (isset($surat->juu_penerbit->user->profil_user->nama) ? $surat->juu_penerbit->user->profil_user->nama : '') . '
                                </span></p>
                                <p style="text-align: center">
                                    '.(isset($surat->juu_penerbit) ? ($surat->detail_surat->id_jenis_pemberkasan == JENIS_PEMBERKASAN_PLN ? $this->convertNamaTampilanPejabat($surat->juu_penerbit, $surat->id_bahasa) : $this->convertNamaPejabat($surat->juu_penerbit, $surat->id_bahasa)) : '') . '
                                </p>
                            </td>
                        </tr>';
                    } else {
                        $ttd_html .= '
                            <tr bgcolor="#ffffff">
                                <td width="40%" height="20" style="text-align: center">
                                    <p style="text-align: center; font-weight: bold; padding-bottom: -15px"><span style="border-bottom-width: 2px; border-bottom-style: solid; padding-bottom: 3px">
                                    '.(isset($surat->pemeriksa_surat[$numItems-2]->juu_pemeriksa->user->profil_user->nama) ? $surat->pemeriksa_surat[$numItems-2]->juu_pemeriksa->user->profil_user->nama : "kosong").'
                                </span></p>
                                <p style="text-align: center">
                                    '.(isset($surat->pemeriksa_surat[$numItems-2]->juu_pemeriksa->jabatan_unit->jabatan->nama) ? $surat->pemeriksa_surat[$numItems-2]->juu_pemeriksa->jabatan_unit->jabatan->nama : "-").'
                                </p>
                                </td>
                                <td width="60%" height="20" style="text-align: center">
                                    <p style="text-align: center; font-weight: bold; padding-bottom: -15px"><span style="border-bottom-width: 2px; border-bottom-style: solid; padding-bottom: 3px">
                                    '.(isset($surat->pemeriksa_surat[$numItems-1]->juu_pemeriksa->user->profil_user->nama) ? $surat->pemeriksa_surat[$numItems-1]->juu_pemeriksa->user->profil_user->nama : "kosong").'
                                </span></p>
                                <p style="text-align: center">
                                    '.(isset($surat->pemeriksa_surat[$numItems-1]->juu_pemeriksa->jabatan_unit->jabatan->nama) ? $surat->pemeriksa_surat[$numItems-1]->juu_pemeriksa->jabatan_unit->jabatan->nama : "-").'
                                </p>
                                </td>
                            </tr>';
                    }
            }

        $ttd_html .= '
                  </table>
              </div><br />';

        $tembusan_html = '';
        if ($surat->detail_surat->tampilan_tembusan OR $surat->tembusan_surat->count()) {
            $tembusan_html = '
                    <div style="margin-left: 140px; margin-top:50px">
                        <table class="no-border" width="100%" cellspacing="2" cellpadding="0" border="0" align="left" bgcolor="#ffffff">
                        <tr bgcolor="#ffffff">
                                <td width="12%" height="20" valign="top" style="text-decoration: underline;">Tembusan:</td>
                            </tr>';
            if (isset($surat->detail_surat->tampilan_tembusan)) {
                $tembusan_html .= '
                            <tr bgcolor="#ffffff">
                                <td width="100%">' . $surat->detail_surat->tampilan_tembusan . '</td>
                            </tr>';
            } else {
                $flag = 0;
                foreach ($surat->tembusan_surat as $tembusan_surat) {
                    $tembusan_html .= '
                            <tr bgcolor="#ffffff">
                                <td width="100%">- ' . $this->convertNamaPejabat($tembusan_surat->juu_tembusan, $surat->id_bahasa) . '</td>
                            </tr>';
                    // if ($flag == 0) {
                    //     $tembusan_html .= '
                    //         <tr bgcolor="#ffffff">
                    //             <td width="12%" height="20" valign="top">Tembusan</td>
                    //             <td width="2%" valign="top">: </td>
                    //             <td width="86%">- ' . $this->convertNamaPejabat($tembusan_surat->juu_tembusan, $surat->id_bahasa) . '</td>
                    //         </tr>';
                    //     $flag = 1;
                    // } else {
                    //     $tembusan_html .= '
                    //         <tr bgcolor="#ffffff">
                    //             <td width="12%" height="20">&nbsp;</td>
                    //             <td width="2%">&nbsp;</td>
                    //             <td width="86%">- ' . $this->convertNamaPejabat($tembusan_surat->juu_tembusan, $surat->id_bahasa) . '</td>
                    //         </tr>';
                    // }
                }
            }

            $tembusan_html .= '
                        </table>
                    </div>';
        }

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

        $html .= $qr_code_html . $ttd_html . $tembusan_html . $footer_html;

        $html .= '
            </body>
        </html>';

        return $html;
    }

    protected function generateSuratNDUP($surat = NULL, $header_footer = true, $qrcode = true)
    {
        if ($surat == NULL) return '';


    }

    protected function generateSuratSK($surat = NULL, $header_footer = true, $qrcode = true)
    {
        if ($surat == NULL) return '';


    }

    protected function generateSuratIM($surat = NULL, $header_footer = true, $qrcode = true)
    {
        if ($surat == NULL) return '';


    }

    protected function generateSuratSD($surat = NULL, $header_footer = true, $qrcode = true)
    {
        if ($surat == NULL) return '';


    }

    protected function generateDisposisi($surat_masuk = NULL)
    {
        if ($surat_masuk == NULL) return '';


    }
}
