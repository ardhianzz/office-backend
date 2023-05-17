<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kota extends Model
{
    use SoftDeletes;

    protected $table = 'kota';
    protected $connection = 'master_sys';
    protected $fillable = [
        'kode',
        'nama',
        'id_provinsi',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    public function provinsi()
    {
    	return $this->belongsTo('App\Models\Master\Provinsi', 'id_provinsi')->withTrashed();
    }
}
