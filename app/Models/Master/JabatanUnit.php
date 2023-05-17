<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JabatanUnit extends Model
{
    use SoftDeletes;

    protected $table = 'jabatan_unit';
    protected $connection = 'master_sys';
    protected $fillable = [
        'kode',
        'level',
        'id_jabatan',
        'id_unit',
        'id_parent',
        'is_single',
        'is_nama_jabatan_unit',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    public function jabatan()
    {
    	return $this->belongsTo('App\Models\Master\Jabatan', 'id_jabatan')->withTrashed();
    }

    public function unit()
    {
    	return $this->belongsTo('App\Models\Master\Unit', 'id_unit')->withTrashed();
    }

    public function parent()
    {
    	return $this->belongsTo('App\Models\Master\JabatanUnit', 'id_parent')->withTrashed();
    }

    public function user()
    {
        return $this->belongsToMany('App\Models\Master\User', 'jabatan_unit_user', 'id_jabatan_unit', 'id_user');
    }

    public function jenis_surat_diterbitkan()
    {
        return $this->belongsToMany('App\Models\ESurat\JenisSurat', 'jabatan_unit_penerbit_surat', 'id_jabatan_unit', 'id_jenis_surat');
    }

    public function jenis_surat_diterima()
    {
        return $this->belongsToMany('App\Models\ESurat\JenisSurat', 'jabatan_unit_penerima_surat', 'id_jabatan_unit', 'id_jenis_surat');
    }
}
