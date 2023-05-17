<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use SoftDeletes;

    protected $table = 'menu';
    protected $connection = 'sys';
    protected $fillable = [
        'nama',
        'route',
        'nomor_urut',
        'level',
        'icon',
        'is_parent',
        'parent_id',
        'keterangan',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    public function grup()
    {
        return $this->belongsToMany('App\Models\Grup', 'grup_menu', 'id_menu', 'id_grup');
    }
}
