<?php

namespace App\Models\ECuti;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RiwayatCuti extends Model
{
    use SoftDeletes;

    protected $table = 'riwayat_cuti';
    protected $connection = 'ecuti_trs';
    protected $guarded = [];

    public function createdBy()
    {
    	return $this->belongsTo('App\Models\Master\JabatanUnitUser', 'created_by')->withTrashed();
    }

    public function updatedBy()
    {
    	return $this->belongsTo('App\Models\Master\JabatanUnitUser', 'updated_by')->withTrashed();
    }

    public function deletedBy()
    {
    	return $this->belongsTo('App\Models\Master\JabatanUnitUser', 'deleted_by')->withTrashed();
    }

    public function cuti()
    {
    	return $this->belongsTo('App\Models\ECuti\Cuti', 'id_cuti')->withTrashed();
    }

    public function juu()
    {
    	return $this->belongsTo('App\Models\Master\JabatanUnitUser', 'id_juu')->withTrashed();
    }

    public function aksiCuti()
    {
    	return $this->belongsTo('App\Models\ECuti\AksiCuti', 'id_cuti')->withTrashed();
    }
}
