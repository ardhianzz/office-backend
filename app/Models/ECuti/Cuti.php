<?php

namespace App\Models\ECuti;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cuti extends Model
{
    use SoftDeletes;

    protected $table = 'cuti';
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

    public function statusCuti()
    {
    	return $this->belongsTo('App\Models\ECuti\StatusCuti', 'status')->withTrashed();
    }

    public function jenisCuti()
    {
    	return $this->belongsTo('App\Models\ECuti\JenisCuti', 'id_jenis_cuti')->withTrashed();
    }

    public function juuPosisi()
    {
    	return $this->belongsTo('App\Models\Master\JabatanUnitUser', 'posisi')->withTrashed();
    }

    public function hasPemeriksaCuti()
    {
        return $this->hasMany('App\Models\ECuti\PemeriksaCuti', 'id_cuti');
    }

    public function hasRiwayatCuti()
    {
    	return $this->hasMany('App\Models\ECuti\RiwayatCuti', 'id_cuti');
    }

    public function hasQRCodeCuti()
    {
    	return $this->hasOne('App\Models\ECuti\QRCodeCuti', 'id_cuti');
    }

    public function hasBerkasCuti()
    {
    	return $this->hasOne('App\Models\ECuti\BerkasCuti', 'id_cuti');
    }

    public function hasPenomoranCuti()
    {
    	return $this->hasOne('App\Models\ECuti\PenomoranCuti', 'id_cuti');
    }

    public function hasLampiranCuti()
    {
    	return $this->hasMany('App\Models\ECuti\LampiranCuti', 'id_cuti');
    }
}
