<?php

namespace App\Models\ECuti;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AksiCuti extends Model
{
    use SoftDeletes;

    protected $table = 'aksi_cuti';
    protected $connection = 'ecuti_sys';
    protected $guarded = [];
}
