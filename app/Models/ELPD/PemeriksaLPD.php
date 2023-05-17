<?php

namespace App\Models\ELPD;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PemeriksaLPD extends Model
{
    use SoftDeletes;

    protected $table = 'pemeriksa_lpd';
    protected $connection = 'elpd_trs';
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

    public function lpd()
    {
    	return $this->belongsTo('App\Models\ELPD\LPD', 'id_lpd')->withTrashed();
    }

    public function juuPemeriksa()
    {
    	return $this->belongsTo('App\Models\Master\JabatanUnitUser', 'id_juu_pemeriksa')->withTrashed();
    }
}
