<?php

namespace App\Models\ESurat;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StatusDelegasi extends Model
{
    use SoftDeletes;

    protected $table = 'status_delegasi';
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
