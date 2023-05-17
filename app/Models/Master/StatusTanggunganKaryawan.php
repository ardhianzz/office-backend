<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StatusTanggunganKaryawan extends Model
{
    use SoftDeletes;

    protected $table = 'status_tanggungan_karyawan';
    protected $connection = 'master_sys';
    protected $fillable = [
        'kode',
        'nama',
        'keterangan',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
}
