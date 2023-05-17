<?php

namespace App\Models\ECuti;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TanggalHariLibur extends Model
{
    use SoftDeletes;

    protected $table = 'tanggal_hari_libur';
    protected $connection = 'ecuti_sys';
    protected $guarded = [];

    public function hariLibur()
    {
    	return $this->belongsTo('App\Models\ECuti\HariLibur', 'id_hari_libur')->withTrashed();
    }
}
