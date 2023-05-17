<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Modul extends Model
{
    use SoftDeletes;

    protected $table = 'modul';
    protected $connection = 'master_sys';
    protected $fillable = [
        'kode',
        'nama',
        'keterangan',
        'icon',
        'background',
        'is_enable',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    public function grup_modul()
    {
        return $this->belongsToMany('App\Models\Master\GrupModul', 'akses_modul', 'id_modul', 'id_grup_modul');
    }
}
