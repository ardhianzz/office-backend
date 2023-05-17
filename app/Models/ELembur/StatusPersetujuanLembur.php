<?php

namespace App\Models\ELembur;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StatusPersetujuanLembur extends Model
{
    use SoftDeletes;

    protected $table = 'status_persetujuan_lembur';
    protected $connection = 'elembur_sys';
    protected $guarded = [];

    public static function daftar()
    {
        $daftar_status = self::get(['id', 'nama']);

        return $daftar_status;
    }
}
