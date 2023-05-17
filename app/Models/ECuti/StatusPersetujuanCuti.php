<?php

namespace App\Models\ECuti;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StatusPersetujuanCuti extends Model
{
    use SoftDeletes;

    protected $table = 'status_persetujuan_cuti';
    protected $connection = 'ecuti_sys';
    protected $guarded = [];

    public static function daftar()
    {
        $daftar_status = self::get(['id', 'nama']);

        return $daftar_status;
    }
}
