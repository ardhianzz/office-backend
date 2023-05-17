<?php

namespace App\Models\ESurat;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipeAktivasiSekretaris extends Model
{
    use SoftDeletes;

    protected $table = 'tipe_aktivasi_sekretaris';
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
