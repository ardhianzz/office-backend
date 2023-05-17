<?php

namespace App\Models\ESurat;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JabatanUnitPenerbitSurat extends Model
{
    use SoftDeletes;

    protected $table = 'jabatan_unit_penerbit_surat';
    protected $connection = 'esurat_sys';
    protected $fillable = [
        'id_jenis_surat',
        'id_jabatan_unit',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    public function jabatan_unit()
    {
    	return $this->belongsTo('App\Models\Master\JabatanUnit', 'id_jabatan_unit')->withTrashed();
    }

    public function jenis_surat()
    {
    	return $this->belongsTo('App\Models\ESurat\JenisSurat', 'id_jenis_surat')->withTrashed();
    }
}
