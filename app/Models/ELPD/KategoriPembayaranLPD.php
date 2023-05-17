<?php

namespace App\Models\ELPD;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KategoriPembayaranLPD extends Model
{
    use SoftDeletes;

    protected $table = 'kategori_pembayaran_lpd';
    protected $connection = 'elpd_sys';
    protected $guarded = [];
}
