<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GrupModul extends Model
{
    use SoftDeletes;

    protected $table = 'grup_modul';
    protected $connection = 'master_sys';
    protected $fillable = [
        'kode',
        'nama',
        'keterangan',
        'level',
        'is_enable',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    public function modul()
    {
        return $this->belongsToMany('App\Models\Master\Modul', 'akses_modul', 'id_grup_modul', 'id_modul');
    }

    public function user()
    {
        return $this->belongsToMany('App\Models\Master\User', 'user_grup_modul', 'id_grup_modul', 'id_user');
    }
}
