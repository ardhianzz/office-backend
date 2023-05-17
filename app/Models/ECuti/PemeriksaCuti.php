<?php

namespace App\Models\ECuti;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PemeriksaCuti extends Model
{
    use SoftDeletes;

    protected $table = 'pemeriksa_cuti';
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

    public function juuPemeriksa()
    {
    	return $this->belongsTo('App\Models\Master\JabatanUnitUser', 'id_juu_pemeriksa')->withTrashed();
    }
}
