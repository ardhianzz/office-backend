<?php

namespace App\Models\ELPD;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KategoriTransportasiLPD extends Model
{
    use SoftDeletes;

    protected $table = 'kategori_transportasi_lpd';
    protected $connection = 'elpd_sys';
    protected $guarded = [];
}
