<?php

namespace App\Models\ESurat;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AksiDisposisiSurat extends Model
{
    use SoftDeletes;

    protected $table = 'aksi_disposisi_surat';
    protected $connection = 'esurat_sys';
    protected $fillable = [
        'kode',
        'nama',
        'awalan',
        'pesan',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
}
