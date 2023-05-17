<?php

namespace App\Models\EReimburse;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PejabatPemeriksaReimburse extends Model
{
    use SoftDeletes;

    protected $table = 'pejabat_pemeriksa_reimburse';
    protected $connection = 'ereimburse_sys';
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
