<?php

namespace App\Models\ESurat;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Surat extends Model
{
    use SoftDeletes;

    protected $table = 'surat';
    protected $connection = 'esurat_trs';
    protected $fillable = [
        'id_juu_penerbit',
        'id_jenis_surat',
        'status',
        'id_sifat_surat',
        'posisi',
        'waktu_terbit',
        'is_notified',
        'is_send',
        'is_opened_by_posisi',
        'is_backdate',
        'tanggal_backdate',
        'id_bahasa',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    public function juu_pembuat()
    {
    	return $this->belongsTo('App\Models\Master\JabatanUnitUser', 'created_by')->withTrashed();
    }

    public function juu_penerbit()
    {
    	return $this->belongsTo('App\Models\Master\JabatanUnitUser', 'id_juu_penerbit')->withTrashed();
    }

    public function jenis_surat()
    {
    	return $this->belongsTo('App\Models\ESurat\JenisSurat', 'id_jenis_surat')->withTrashed();
    }

    public function status_surat()
    {
    	return $this->belongsTo('App\Models\ESurat\StatusSurat', 'status')->withTrashed();
    }

    public function sifat_surat()
    {
    	return $this->belongsTo('App\Models\ESurat\SifatSurat', 'id_sifat_surat')->withTrashed();
    }

    public function posisi_surat()
    {
    	return $this->belongsTo('App\Models\Master\JabatanUnitUser', 'posisi')->withTrashed();
    }

    public function detail_surat()
    {
    	return $this->hasOne('App\Models\ESurat\DetailSurat', 'id_surat');
    }

    public function pemeriksa_surat()
    {
    	return $this->hasMany('App\Models\ESurat\PemeriksaSurat', 'id_surat');
    }

    public function penerima_surat()
    {
    	return $this->hasMany('App\Models\ESurat\PenerimaSurat', 'id_surat');
    }

    public function tembusan_surat()
    {
    	return $this->hasMany('App\Models\ESurat\TembusanSurat', 'id_surat');
    }

    public function referensi_surat()
    {
    	return $this->hasMany('App\Models\ESurat\ReferensiSurat', 'id_surat');
    }

    public function lampiran_surat()
    {
    	return $this->hasMany('App\Models\ESurat\LampiranSurat', 'id_surat');
    }

    public function riwayat_surat()
    {
    	return $this->hasMany('App\Models\ESurat\RiwayatSurat', 'id_surat');
    }

    public function penomoran_surat()
    {
    	return $this->hasOne('App\Models\ESurat\PenomoranSurat', 'id_surat');
    }

    public function file_surat()
    {
    	return $this->hasOne('App\Models\ESurat\FileSurat', 'id_surat');
    }

    public function qrcode_surat()
    {
    	return $this->hasOne('App\Models\ESurat\QRCodeSurat', 'id_surat');
    }

    public function pemberkasan_surat()
    {
    	return $this->hasMany('App\Models\ESurat\PemberkasanSurat', 'id_surat');
    }

    public function surat_masuk()
    {
    	return $this->hasMany('App\Models\ESurat\SuratMasuk', 'id_surat');
    }

    public function created_by_juu()
    {
    	return $this->belongsTo('App\Models\Master\JabatanUnitUser', 'created_by')->withTrashed();
    }

    public function updated_by_juu()
    {
    	return $this->belongsTo('App\Models\Master\JabatanUnitUser', 'updated_by')->withTrashed();
    }

    public function deleted_by_juu()
    {
    	return $this->belongsTo('App\Models\Master\JabatanUnitUser', 'deleted_by')->withTrashed();
    }

    public function delegasi()
    {
    	return $this->hasOne('App\Models\ESurat\Delegasi', 'id_surat');
    }

    public function bahasa()
    {
    	return $this->belongsTo('App\Models\ESurat\Bahasa', 'id_bahasa')->withTrashed();
    }

    public function spsm()
    {
    	return $this->hasOne('App\Models\ESurat\SPSM', 'id_surat');
    }

    public function quick_panel()
    {
    	return $this->hasMany('App\Models\ESurat\QuickPanel', 'id_surat');
    }
}
