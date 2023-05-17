<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Negara extends Model
{
    use SoftDeletes;

    protected $table = 'negara';
    protected $connection = 'master_sys';
    protected $fillable = [
        'kode',
        'nama',
        'kode_telepon',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    public function provinsi()
    {
    	return $this->hasMany('App\Models\Master\Provinsi', 'id_negara');
    }
}
