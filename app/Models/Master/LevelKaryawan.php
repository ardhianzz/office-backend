<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LevelKaryawan extends Model
{
    use SoftDeletes;

    protected $table = 'level_karyawan';
    protected $connection = 'master_sys';
    protected $fillable = [
        'kode',
        'nama',
        'level',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
}
