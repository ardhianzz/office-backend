<?php

namespace App\Models\ESurat;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AksesSPSM extends Model
{
    use SoftDeletes;

    protected $table = 'akses_spsm';
    protected $connection = 'esurat_trs';
    protected $fillable = [
        'id_juu',
        'id_unit',
        'waktu_mulai',
        'waktu_berakhir',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    public function juu()
    {
    	return $this->belongsTo('App\Models\Master\JabatanUnitUser', 'id_juu')->withTrashed();
    }

    public function unit()
    {
    	return $this->belongsTo('App\Models\Master\Unit', 'id_unit')->withTrashed();
    }
}
