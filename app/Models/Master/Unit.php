<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unit extends Model
{
    use SoftDeletes;

    protected $table = 'unit';
    protected $connection = 'master_sys';
    protected $fillable = [
        'kode',
        'nama',
        'tampilan',
        'nama_penomoran',
        'tampilan_penomoran',
        'keterangan',
        'id_organisasi',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    public function organisasi()
    {
    	return $this->belongsTo('App\Models\Master\Organisasi', 'id_organisasi')->withTrashed();
    }

    public function jabatan()
    {
        return $this->belongsToMany('App\Models\Master\Jabatan', 'jabatan_unit', 'id_unit', 'id_jabatan');
    }
}
