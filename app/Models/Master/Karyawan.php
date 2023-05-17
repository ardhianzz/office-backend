<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Karyawan extends Model
{
    use SoftDeletes;

    protected $table = 'karyawan';
    protected $connection = 'master_sys';
    protected $fillable = [
        'id_user',
        'nik',
        'id_kota_kerja',
        'id_unit',
        'id_level_karyawan',
        'no_npwp',
        'no_bpjs_tenaga_kerja',
        'no_bpjs_kesehatan',
        'status_tanggungan',
        'tanggal_masuk',
        'tanggal_pensiun',
        'tanggal_keluar',
        'sisa_masa_kerja',
        'id_bank_payroll',
        'no_bank_payroll',
        'id_bank_sppd',
        'no_bank_sppd',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    public function user()
    {
    	return $this->belongsTo('App\Models\Master\User', 'id_user')->withTrashed();
    }

    public function kota_kerja()
    {
    	return $this->belongsTo('App\Models\Master\Kota', 'id_kota_kerja')->withTrashed();
    }

    public function unit()
    {
    	return $this->belongsTo('App\Models\Master\Unit', 'id_unit')->withTrashed();
    }

    public function level_karyawan()
    {
    	return $this->belongsTo('App\Models\Master\LevelKaryawan', 'id_level_karyawan')->withTrashed();
    }

    public function status_tanggungan_karyawan()
    {
    	return $this->belongsTo('App\Models\Master\StatusTanggunganKaryawan', 'status_tanggungan')->withTrashed();
    }

    public function bank_payroll()
    {
    	return $this->belongsTo('App\Models\Master\Bank', 'id_bank_payroll')->withTrashed();
    }

    public function bank_sppd()
    {
    	return $this->belongsTo('App\Models\Master\Bank', 'id_bank_sppd')->withTrashed();
    }

    public function hasTanggungan()
    {
    	return $this->hasMany('App\Models\Master\Tanggungan', 'id_karyawan');
    }
}
