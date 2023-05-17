<?php

namespace App\Models\ECuti;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StatusCuti extends Model
{
    use SoftDeletes;

    protected $table = 'status_cuti';
    protected $connection = 'ecuti_sys';
    protected $guarded = [];
}
