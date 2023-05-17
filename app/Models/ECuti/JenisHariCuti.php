<?php

namespace App\Models\ECuti;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JenisHariCuti extends Model
{
    use SoftDeletes;

    protected $table = 'jenis_hari_cuti';
    protected $connection = 'ecuti_sys';
    protected $guarded = [];
}
