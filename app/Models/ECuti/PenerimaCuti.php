<?php

namespace App\Models\ECuti;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PenerimaCuti extends Model
{
    use SoftDeletes;

    protected $table = 'penerima_cuti';
    protected $connection = 'ecuti_sys';
    protected $guarded = [];

    public function juu()
    {
    	return $this->belongsTo('App\Models\Master\JabatanUnitUser', 'id_juu')->withTrashed();
    }

    public function unit()
    {
    	return $this->belongsTo('App\Models\Master\Unit', 'id_unit')->withTrashed();
    }
}
