<?php

namespace App\Models\ELembur;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PemeriksaLembur extends Model
{
    use SoftDeletes;

    protected $table = 'pemeriksa_lembur';
    protected $connection = 'elembur_trs';
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

    public function lembur()
    {
    	return $this->belongsTo('App\Models\ELembur\Lembur', 'id_lembur')->withTrashed();
    }

    public function juuPemeriksa()
    {
    	return $this->belongsTo('App\Models\Master\JabatanUnitUser', 'id_juu_pemeriksa')->withTrashed();
    }
}
