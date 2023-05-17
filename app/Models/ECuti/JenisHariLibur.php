<?php

namespace App\Models\ECuti;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JenisHariLibur extends Model
{
    use SoftDeletes;

    protected $table = 'jenis_hari_libur';
    protected $connection = 'ecuti_sys';
    protected $guarded = [];

    public function hasHariLibur()
    {
    	return $this->hasOne('App\Models\ECuti\HariLibur', 'id_jenis_hari_libur');
    }
}
