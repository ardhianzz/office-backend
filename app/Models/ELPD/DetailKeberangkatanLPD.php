<?php

namespace App\Models\ELPD;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailKeberangkatanLPD extends Model
{
    use SoftDeletes;

    protected $table = 'detail_keberangkatan_lpd';
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

    public function lpd()
    {
    	return $this->belongsTo('App\Models\ELPD\LPD', 'id_lpd')->withTrashed();
    }

    public function kategoriTransportasi()
    {
    	return $this->belongsTo('App\Models\ELPD\KategoriTransportasiLPD', 'id_kategori_transportasi')->withTrashed();
    }

    public function kelasTransportasi()
    {
    	return $this->belongsTo('App\Models\ELPD\KelasTransportasiLPD', 'id_kelas_transportasi')->withTrashed();
    }

    public function jenisTransportasi()
    {
    	return $this->belongsTo('App\Models\ELPD\JenisTransportasiLPD', 'id_jenis_transportasi')->withTrashed();
    }

    public function kategoriPembayaran()
    {
    	return $this->belongsTo('App\Models\ELPD\KategoriPembayaranLPD', 'id_kategori_pembayaran')->withTrashed();
    }
}
