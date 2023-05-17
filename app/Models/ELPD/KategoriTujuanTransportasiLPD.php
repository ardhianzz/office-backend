<?php

namespace App\Models\ELPD;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KategoriTujuanTransportasiLPD extends Model
{
    use SoftDeletes;

    protected $table = 'kategori_tujuan_transportasi_lpd';
    protected $connection = 'elpd_sys';
    protected $guarded = [];

    public function kategoriTujuanLPD()
    {
    	return $this->belongsTo('App\Models\ELPD\KategoriTujuanLPD', 'id_kategori_tujuan')->withTrashed();
    }

    public function kategoriTransportasiLPD()
    {
    	return $this->belongsTo('App\Models\ELPD\KategoriTransportasiLPD', 'id_kategori_transportasi')->withTrashed();
    }

    public function hasKatukatransJenisTransportasiLPD()
    {
    	return $this->hasMany('App\Models\ELPD\KatukatransJenisTransportasiLPD', 'id_katukatrans');
    }
}
