<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tanggungan extends Model
{
    use SoftDeletes;

    protected $table = 'tanggungan';
    protected $connection = 'master_sys';
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

    public function karyawan()
    {
    	return $this->belongsTo('App\Models\Master\Karyawan', 'id_karyawan')->withTrashed();
    }

    public function jenisKelamin()
    {
    	return $this->belongsTo('App\Models\Master\JenisKelamin', 'id_jenis_kelamin')->withTrashed();
    }

    public function statusHubunganTanggungan()
    {
    	return $this->belongsTo('App\Models\Master\StatusHubunganTanggungan', 'status_hubungan_tanggungan')->withTrashed();
    }

    public function statusPernikahan()
    {
    	return $this->belongsTo('App\Models\Master\StatusPernikahan', 'status_pernikahan')->withTrashed();
    }

    public function statusTanggungan()
    {
    	return $this->belongsTo('App\Models\Master\StatusTanggungan', 'status')->withTrashed();
    }
}
