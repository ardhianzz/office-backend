<?php

namespace App\Models\EReimburse;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BerkasReimburse extends Model
{
    use SoftDeletes;

    protected $table = 'berkas_reimburse';
    protected $connection = 'ereimburse_trs';
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

    public function reimburse()
    {
    	return $this->belongsTo('App\Models\EReimburse\Reimburse', 'id_reimburse')->withTrashed();
    }
}
