<?php

namespace App\Models\ELPD;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LPD extends Model
{
    use SoftDeletes;

    protected $table = 'lpd';
    protected $connection = 'elpd_trs';
    protected $guarded = [];

    public function createdBy()
    {
    	return $this->belongsTo('App\Models\Master\JabatanUnitUser', 'created_by')->withTrashed();
    }

    public function updatedBy()
    {
    	return $this->belongsTo('App\Models\Master\JabatanUnitUser', 'updated_by')->withTrashed();
    }

    public function deletedBy()
    {
    	return $this->belongsTo('App\Models\Master\JabatanUnitUser', 'deleted_by')->withTrashed();
    }

    public function statusLPD()
    {
    	return $this->belongsTo('App\Models\ELPD\StatusLPD', 'status')->withTrashed();
    }

    public function juuPosisi()
    {
    	return $this->belongsTo('App\Models\Master\JabatanUnitUser', 'posisi')->withTrashed();
    }

    public function kategoriTujuan()
    {
        return $this->belongsTo('App\Models\ELPD\KategoriTujuanLPD', 'id_kategori_tujuan')->withTrashed();
    }

    public function negaraTujuan()
    {
    	return $this->belongsTo('App\Models\Master\Negara', 'id_negara_tujuan' )->withTrashed();
    }

    public function hasPemeriksaLPD()
    {
        return $this->hasOne('App\Models\ELPD\PemeriksaLPD', 'id_lpd');
    }

    public function hasRiwayatLPD()
    {
    	return $this->hasMany('App\Models\ELPD\RiwayatLPD', 'id_lpd');
    }

    public function hasQRCodeLPD()
    {
    	return $this->hasOne('App\Models\ELPD\QRCodeLPD', 'id_lpd');
    }

    public function hasBerkasLPD()
    {
    	return $this->hasOne('App\Models\ELPD\BerkasLPD', 'id_lpd');
    }

    public function hasPenomoranLPD()
    {
    	return $this->hasOne('App\Models\ELPD\PenomoranLPD', 'id_lpd');
    }

    public function hasReferensiLPD()
    {
    	return $this->hasOne('App\Models\ELPD\ReferensiLPD', 'id_lpd');
    }

    public function hasLampiranLPD()
    {
    	return $this->hasMany('App\Models\ELPD\LampiranLPD', 'id_lpd');
    }

    public function hasDetailKeberangkatanLPD()
    {
    	return $this->hasOne('App\Models\ELPD\DetailKeberangkatanLPD', 'id_lpd');
    }

    public function hasDetailPenginapanLPD()
    {
    	return $this->hasOne('App\Models\ELPD\DetailPenginapanLPD', 'id_lpd');
    }

    public function hasDetailKepulanganLPD()
    {
    	return $this->hasOne('App\Models\ELPD\DetailKepulanganLPD', 'id_lpd');
    }
}
