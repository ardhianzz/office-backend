<?php

namespace App\Helpers;

use App\Models\Master\UserGrupModul;
use App\Models\ELembur\PenerimaLembur;
use App\Models\EReimburse\PejabatPemeriksaReimburse;
use App\Models\ECuti\PenerimaCuti;
use App\Models\ELPD\PenerimaLPD;

trait Helper
{
    protected function convertNamaJabatanUnit($ju, $bahasa = BAHASA_INDONESIA)
    {
        if ($ju->is_nama_jabatan_unit) $nama_ju = $bahasa == BAHASA_INDONESIA ? $ju->jabatan->nama . ' ' . $ju->unit->nama : (isset($ju->jabatan->nama_en) ? $ju->jabatan->nama_en . ' of ' . $ju->unit->nama : $ju->jabatan->nama . ' ' . $ju->unit->nama);
        else $nama_ju = $bahasa == BAHASA_INDONESIA ? $ju->jabatan->nama : (isset($ju->jabatan->nama_en) ? $ju->jabatan->nama_en : $ju->jabatan->nama);

        return $nama_ju;
    }

    protected function convertNamaPejabat($juu, $bahasa = BAHASA_INDONESIA)
    {
        if (isset($juu->id_unit_khusus)) $nama_juu = $bahasa == BAHASA_INDONESIA ? $juu->jabatan_unit->jabatan->nama . ' ' . $juu->unit_khusus->nama : (isset($juu->jabatan_unit->jabatan->nama_en) ? $juu->jabatan_unit->jabatan->nama_en . ' ' . $juu->unit_khusus->nama : $juu->jabatan_unit->jabatan->nama . ' ' . $juu->unit_khusus->nama);
        elseif ($juu->jabatan_unit->is_nama_jabatan_unit) $nama_juu = $bahasa == BAHASA_INDONESIA ? $juu->jabatan_unit->jabatan->nama . ' ' . $juu->jabatan_unit->unit->nama : (isset($juu->jabatan_unit->jabatan->nama_en) ? $juu->jabatan_unit->jabatan->nama_en . ' ' . $juu->jabatan_unit->unit->nama : $juu->jabatan_unit->jabatan->nama . ' ' . $juu->jabatan_unit->unit->nama);
        else $nama_juu = $bahasa == BAHASA_INDONESIA ? $juu->jabatan_unit->jabatan->nama : (isset($juu->jabatan_unit->jabatan->nama_en) ? $juu->jabatan_unit->jabatan->nama_en : $juu->jabatan_unit->jabatan->nama);

        if ($juu->id_jenis_juu == JENIS_JKU_DELEGASI) $nama_juu = 'Kuasa - ' . $nama_juu;

        return $nama_juu;
    }

    protected function convertNamaTampilanPejabat($juu, $bahasa = BAHASA_INDONESIA)
    {
        if ($juu->jabatan_unit->is_nama_jabatan_unit) $nama_juu = $bahasa == BAHASA_INDONESIA ? $juu->jabatan_unit->jabatan->nama . ' ' . (isset($juu->jabatan_unit->unit->tampilan) ? $juu->jabatan_unit->unit->tampilan : $juu->jabatan_unit->unit->nama) : (isset($juu->jabatan_unit->jabatan->nama_en) ? $juu->jabatan_unit->jabatan->nama_en . ' of ' . (isset($juu->jabatan_unit->unit->tampilan) ? $juu->jabatan_unit->unit->tampilan : $juu->jabatan_unit->unit->nama) : $juu->jabatan_unit->jabatan->nama . ' ' . (isset($juu->jabatan_unit->unit->tampilan) ? $juu->jabatan_unit->unit->tampilan : $juu->jabatan_unit->unit->nama));
        else $nama_juu = $bahasa == BAHASA_INDONESIA ? $juu->jabatan_unit->jabatan->nama : (isset($juu->jabatan_unit->jabatan->nama_en) ? $juu->jabatan_unit->jabatan->nama_en : $juu->jabatan_unit->jabatan->nama);

        if ($juu->id_jenis_juu == JENIS_JKU_DELEGASI) $nama_juu = 'Kuasa - ' . $nama_juu;

        return $nama_juu;
    }

    protected function convertToIndonesiaTime($date)
    {
        $tanggal = date('j', $date);
        $bulan = date('n', $date);
        $tahun = date('Y', $date);
        $pukul = date('H:i', $date);

        return $tanggal.' '.NAMA_BULAN[$bulan].' '.$tahun.' '.$pukul;
    }

    protected function convertToIndonesiaDate($date)
    {
        $tanggal = date('j', $date);
        $bulan = date('n', $date);
        $tahun = date('Y', $date);

        return $tanggal.' '.NAMA_BULAN[$bulan].' '.$tahun;
    }

    protected function convertToEnglishDate($date)
    {
        $tanggal = date('j', $date);
        $bulan = date('F', $date);
        $tahun = date('Y', $date);

        return $bulan.' '.$tanggal.', '.$tahun;
    }

    protected function cekGrupHRD($id_juu = NULL)
    {
        if (PenerimaLembur::where('id_juu', $id_juu)->count()) return true;
        if (PejabatPemeriksaReimburse::where('id_juu', $id_juu)->count()) return true;
        if (PenerimaCuti::where('id_juu', $id_juu)->count()) return true;
        if (PenerimaLPD::where('id_juu', $id_juu)->count()) return true;

        return false;
    }
}
