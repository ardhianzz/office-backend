<?php

namespace App\Models\ECuti;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PejabatPemeriksaCuti extends Model
{
    use SoftDeletes;

    protected $table = 'pejabat_pemeriksa_cuti';
    protected $connection = 'ecuti_sys';
    protected $guarded = [];

    public function juu()
    {
    	return $this->belongsTo('App\Models\Master\JabatanUnitUser', 'id_juu')->withTrashed();
    }

    public function juuPemeriksa()
    {
    	return $this->belongsTo('App\Models\Master\JabatanUnitUser', 'id_juu_pemeriksa')->withTrashed();
    }
}
