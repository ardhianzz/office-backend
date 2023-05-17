<?php

namespace App\Models\ESurat;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JenisSurat extends Model
{
    use SoftDeletes;

    protected $table = 'jenis_surat';
    protected $connection = 'esurat_sys';
    protected $fillable = [
        'kode',
        'nama',
        'keterangan',
        'id_sifat_surat',
        'jumlah_ttd',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    public function sifat_surat()
    {
    	return $this->belongsTo('App\Models\ESurat\SifatSurat', 'id_sifat_surat')->withTrashed();
    }

    public function jabatan_unit_penerbit()
    {
        return $this->belongsToMany('App\Models\Master\JabatanUnit', 'jabatan_unit_penerbit_surat', 'id_jenis_surat', 'id_jabatan_unit');
    }

    public function jabatan_unit_penerima()
    {
        return $this->belongsToMany('App\Models\Master\JabatanUnit', 'jabatan_unit_penerima_surat', 'id_jenis_surat', 'id_jabatan_unit');
    }
}
