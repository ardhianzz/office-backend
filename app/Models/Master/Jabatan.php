<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jabatan extends Model
{
    use SoftDeletes;

    protected $table = 'jabatan';
    protected $connection = 'master_sys';
    protected $fillable = [
        'kode',
        'nama',
        'nama_en',
        'alias',
        'level',
        'is_direksi',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    public function unit()
    {
        return $this->belongsToMany('App\Models\Master\Unit', 'jabatan_unit', 'id_jabatan', 'id_unit');
    }
}
