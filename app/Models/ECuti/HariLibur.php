<?php

namespace App\Models\ECuti;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HariLibur extends Model
{
    use SoftDeletes;

    protected $table = 'hari_libur';
    protected $connection = 'ecuti_sys';
    protected $guarded = [];

    public function jenisHariLibur()
    {
    	return $this->belongsTo('App\Models\ECuti\JenisHariLibur', 'id_jenis_hari_libur')->withTrashed();
    }
}
