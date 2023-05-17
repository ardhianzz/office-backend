<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Provinsi extends Model
{
    use SoftDeletes;

    protected $table = 'provinsi';
    protected $connection = 'master_sys';
    protected $fillable = [
        'kode',
        'nama',
        'id_negara',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    public function negara()
    {
    	return $this->belongsTo('App\Models\Master\Negara', 'id_negara')->withTrashed();
    }

    public function kota()
    {
    	return $this->hasMany('App\Models\Master\Kota', 'id_provinsi');
    }
}
