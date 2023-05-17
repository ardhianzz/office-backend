<?php

namespace App\Models\ELPD;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StatusPersetujuanLPD extends Model
{
    use SoftDeletes;

    protected $table = 'status_persetujuan_lpd';
    protected $connection = 'elpd_sys';
    protected $guarded = [];
}
