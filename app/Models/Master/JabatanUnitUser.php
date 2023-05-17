<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\ESurat\JabatanUnitPenerbitSurat;
use App\Models\ESurat\JabatanUnitPenerimaSurat;

class JabatanUnitUser extends Model
{
    use SoftDeletes;

    protected $table = 'jabatan_unit_user';
    protected $connection = 'master_sys';
    protected $fillable = [
        'kode',
        'id_user',
        'id_jabatan_unit',
        'id_jenis_juu',
        'id_unit_khusus',
        'id_parent',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    public function user()
    {
    	return $this->belongsTo('App\Models\Master\User', 'id_user')->withTrashed();
    }

    public function jabatan_unit()
    {
    	return $this->belongsTo('App\Models\Master\JabatanUnit', 'id_jabatan_unit')->withTrashed();
    }

    public function jenis_juu()
    {
    	return $this->belongsTo('App\Models\Master\JenisJabatanUnitUser', 'id_jenis_juu')->withTrashed();
    }

    public function unit_khusus()
    {
    	return $this->belongsTo('App\Models\Master\Unit', 'id_unit_khusus')->withTrashed();
    }

    public function delegasi()
    {
    	return $this->hasOne('App\Models\ESurat\Delegasi', 'id_juu_delegasi_penerima');
    }

    public function pengaktivasi_sekretaris()
    {
    	return $this->hasOne('App\Models\ESurat\PengaktivasiSekretaris', 'id_juu');
    }

    public function parent()
    {
    	return $this->belongsTo('App\Models\Master\JabatanUnitUser', 'id_parent')->withTrashed();
    }

    public function hasPemeriksaCuti()
    {
    	return $this->hasMany('App\Models\ECuti\PejabatPemeriksaCuti', 'id_juu');
    }

    public static function daftarPenerbitSurat($id_jenis_surat = NULL)
    {
        $daftar_penerbit_surat = self::whereIn('id_jabatan_unit', JabatanUnitPenerbitSurat::where('id_jenis_surat', $id_jenis_surat)->pluck('id_jabatan_unit'))
            ->where('id_jenis_juu', JENIS_JKU_ASLI)
            ->with(['user', 'jabatan_unit', 'jabatan_unit.jabatan', 'jabatan_unit.unit'])
            ->get(['id', 'id_user', 'id_jabatan_unit']);

        return $daftar_penerbit_surat;
    }

    public static function daftarPenerimaSurat($id_jenis_surat = NULL)
    {
        $daftar_penerima_surat = self::whereIn('id_jabatan_unit', JabatanUnitPenerimaSurat::where('id_jenis_surat', $id_jenis_surat)->pluck('id_jabatan_unit'))
            ->where('id_jenis_juu', JENIS_JKU_ASLI)
            ->with(['user', 'jabatan_unit', 'jabatan_unit.jabatan', 'jabatan_unit.unit'])
            ->get(['id', 'id_user', 'id_jabatan_unit']);

        return $daftar_penerima_surat;
    }
}
