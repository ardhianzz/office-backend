<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Organisasi extends Model
{
    use SoftDeletes;

    protected $table = 'organisasi';
    protected $connection = 'master_sys';
    protected $fillable = [
        'kode',
        'nama',
        'keterangan',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    public function unit()
    {
    	return $this->hasMany('App\Models\Master\Unit', 'id_organisasi');
    }
}
