<?php

namespace App\Models\ESurat;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shortcut extends Model
{
    use SoftDeletes;

    protected $table = 'shortcut';
    protected $connection = 'esurat_trs';
    protected $fillable = [
        'id_juu',
        'id_menu',
        'nama_menu',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    public function juu()
    {
    	return $this->belongsTo('App\Models\Master\JabatanUnitUser', 'id_juu')->withTrashed();
    }

    public function menu()
    {
    	return $this->belongsTo('App\Models\Menu', 'id_menu')->withTrashed();
    }
}
