<?php

namespace App\Models\EReimburse;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reimburse extends Model
{
    use SoftDeletes;

    protected $table = 'reimburse';
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

    public function statusReimburse()
    {
    	return $this->belongsTo('App\Models\EReimburse\StatusReimburse', 'status')->withTrashed();
    }

    public function juuPosisi()
    {
    	return $this->belongsTo('App\Models\Master\JabatanUnitUser', 'posisi')->withTrashed();
    }

    public function hasDetailReimburse()
    {
    	return $this->hasMany('App\Models\EReimburse\DetailReimburse', 'id_reimburse');
    }

    public function hasPemeriksaReimburse()
    {
        return $this->hasOne('App\Models\EReimburse\PemeriksaReimburse', 'id_reimburse');
    }

    public function hasRiwayatReimburse()
    {
    	return $this->hasMany('App\Models\EReimburse\RiwayatReimburse', 'id_reimburse');
    }

    public function hasQRCodeReimburse()
    {
    	return $this->hasOne('App\Models\EReimburse\QRCodeReimburse', 'id_reimburse');
    }

    public function hasBerkasReimburse()
    {
    	return $this->hasOne('App\Models\EReimburse\BerkasReimburse', 'id_reimburse');
    }

    public function hasPenomoranReimburse()
    {
    	return $this->hasOne('App\Models\EReimburse\PenomoranReimburse', 'id_reimburse');
    }

    public function hasLampiranReimburse()
    {
    	return $this->hasOne('App\Models\EReimburse\LampiranReimburse', 'id_reimburse');
    }
}
