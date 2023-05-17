<?php

namespace App\Models\ELPD;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KatukatransJenisTransportasiLPD extends Model
{
    use SoftDeletes;

    protected $table = 'katukatrans_jenis_transportasi_lpd';
    protected $connection = 'elpd_sys';
    protected $guarded = [];

    public function katukatransJenisTransportasiLPD()
    {
    	return $this->belongsTo('App\Models\ELPD\KatukatransJenisTransportasiLPD', 'id_katukatrans')->withTrashed();
    }

    public function jenisTransportasiLPD()
    {
    	return $this->belongsTo('App\Models\ELPD\JenisTransportasiLPD', 'id_jenis_transportasi')->withTrashed();
    }
}
