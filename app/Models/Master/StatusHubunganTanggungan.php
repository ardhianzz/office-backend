<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StatusHubunganTanggungan extends Model
{
    use SoftDeletes;

    protected $table = 'status_hubungan_tanggungan';
    protected $connection = 'master_sys';
    protected $guarded = [];
}
