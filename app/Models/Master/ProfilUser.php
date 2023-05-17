<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProfilUser extends Model
{
    use SoftDeletes;

    protected $table = 'profil_user';
    protected $connection = 'master_sys';
    protected $fillable = [
        'id_user',
        'nama',
        'email',
        'id_negara_hp',
        'no_hp',
        'foto_path',
        'id_negara_asal',
        'alamat_asal',
        'alamat_sekarang',
        'id_agama',
        'id_jenis_kelamin',
        'tanggal_lahir',
        'no_ktp',
        'no_kk',
        'usia',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    public function user()
    {
    	return $this->belongsTo('App\Models\Master\User', 'id_user')->withTrashed();
    }

    public function agama()
    {
    	return $this->belongsTo('App\Models\Master\Agama', 'id_agama')->withTrashed();
    }

    public function jenis_kelamin()
    {
    	return $this->belongsTo('App\Models\Master\JenisKelamin', 'id_jenis_kelamin')->withTrashed();
    }

    public function negara_asal()
    {
    	return $this->belongsTo('App\Models\Master\Negara', 'id_negara_asal')->withTrashed();
    }

    public function negara_hp()
    {
    	return $this->belongsTo('App\Models\Master\Negara', 'id_negara_hp')->withTrashed();
    }

    public function kartu_keluarga()
    {
    	return $this->hasOne('App\Models\Master\KartuKeluarga', 'id_profil_user');
    }
}
