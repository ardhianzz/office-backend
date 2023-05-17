<?php

namespace App\Models\ELembur;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lembur extends Model
{
    use SoftDeletes;

    protected $table = 'lembur';
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

    public function statusLembur()
    {
    	return $this->belongsTo('App\Models\ELembur\StatusLembur', 'status')->withTrashed();
    }

    public function juuPosisi()
    {
    	return $this->belongsTo('App\Models\Master\JabatanUnitUser', 'posisi')->withTrashed();
    }

    public function hasPemeriksaLembur()
    {
        return $this->hasOne('App\Models\ELembur\PemeriksaLembur', 'id_lembur');
    }

    public function hasRiwayatLembur()
    {
    	return $this->hasMany('App\Models\ELembur\RiwayatLembur', 'id_lembur');
    }

    public function hasQRCodeLembur()
    {
    	return $this->hasOne('App\Models\ELembur\QRCodeLembur', 'id_lembur');
    }

    public function hasBerkasLembur()
    {
    	return $this->hasOne('App\Models\ELembur\BerkasLembur', 'id_lembur');
    }
}
