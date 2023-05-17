<?php

namespace App\Models\ESurat;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StatusPersetujuanSurat extends Model
{
    use SoftDeletes;

    protected $table = 'status_persetujuan_surat';
    protected $connection = 'esurat_sys';
    protected $fillable = [
        'kode',
        'nama',
        'keterangan',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    public static function daftar()
    {
        $daftar_status = self::get(['id', 'nama']);

        return $daftar_status;
    }
}
