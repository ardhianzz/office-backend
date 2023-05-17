<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StatusPernikahan extends Model
{
    use SoftDeletes;

    protected $table = 'status_pernikahan';
    protected $connection = 'master_sys';
    protected $guarded = [];
}
