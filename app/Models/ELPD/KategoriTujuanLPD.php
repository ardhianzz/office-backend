<?php

namespace App\Models\ELPD;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KategoriTujuanLPD extends Model
{
    use SoftDeletes;

    protected $table = 'kategori_tujuan_lpd';
    protected $connection = 'elpd_sys';
    protected $guarded = [];

    public function hasKategoriTujuanTransportasiLPD()
    {
    	return $this->hasMany('App\Models\ELPD\KategoriTujuanTransportasiLPD', 'id_kategori_tujuan');
    }
}
