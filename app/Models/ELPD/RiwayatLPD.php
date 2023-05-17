<?php

namespace App\Models\ELPD;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RiwayatLPD extends Model
{
    use SoftDeletes;

    protected $table = 'riwayat_lpd';
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

    public function juu()
    {
    	return $this->belongsTo('App\Models\Master\JabatanUnitUser', 'id_juu')->withTrashed();
    }

    public function aksiLPD()
    {
    	return $this->belongsTo('App\Models\ELPD\AksiLPD', 'id_lpd')->withTrashed();
    }
}
