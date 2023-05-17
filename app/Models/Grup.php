<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Grup extends Model
{
    use SoftDeletes;

    protected $table = 'grup';
    protected $connection = 'sys';
    protected $fillable = [
        'kode',
        'nama',
        'keterangan',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    public function user()
    {
        return $this->belongsToMany('App\Models\Master\User', 'grup_user', 'id_grup', 'id_user');
    }

    public function menu()
    {
        return $this->belongsToMany('App\Models\Menu', 'grup_menu', 'id_grup', 'id_menu');
    }
}
