<?php

namespace App\Models\ESurat;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StatusBackdate extends Model
{
    use SoftDeletes;

    protected $table = 'status_backdate';
    protected $connection = 'esurat_sys';
    protected $fillable = [
        'kode',
        'nama',
        'keterangan',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
}
