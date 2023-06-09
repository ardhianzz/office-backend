<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Laravel\Lumen\Auth\Authorizable;
use Tymon\JWTAuth\Contracts\JWTSubject;
// use Illuminate\Notifications\Notifiable;
// use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;



// class User extends Model implements JWTSubject, AuthenticatableContract, AuthorizableContract
class User extends Model
{
    // use SoftDeletes, Authenticatable, Authorizable;
    use SoftDeletes, Authenticatable;

    protected $table = 'user';
    protected $connection = 'master_sys';
    protected $fillable = [
        'nik',
        'password',
        'is_active',
        'access_token',
        'token_reset_password',
        'id_juu_aktif',
        'id_juu_default',
        'is_notified',
        'autosave',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    protected $hidden = [
        'password', 'access_token', 'token_reset_password'
    ];

    public function grup()
    {
    	return $this->hasMany('App\Models\GrupUser', 'id_user');
    }

    public function jabatan_unit_user()
    {
    	return $this->hasMany('App\Models\Master\JabatanUnitUser', 'id_user');
    }

    public function jabatan_unit()
    {
        return $this->belongsToMany('App\Models\Master\JabatanUnit', 'jabatan_unit_user', 'id_user', 'id_jabatan_unit');
    }

    public function juu_aktif()
    {
    	return $this->belongsTo('App\Models\Master\JabatanUnitUser', 'id_juu_aktif')->withTrashed();
    }

    public function profil_user()
    {
    	return $this->hasOne('App\Models\Master\ProfilUser', 'id_user')->withTrashed();
    }

    public function karyawan()
    {
    	return $this->hasOne('App\Models\Master\Karyawan', 'id_user')->withTrashed();
    }

    public function hasJatahCutiHarian()
    {
    	return $this->hasOne('App\Models\ECuti\JatahCutiHarian', 'id_user');
    }

    public function grup_modul()
    {
        return $this->belongsToMany('App\Models\Master\GrupModul', 'user_grup_modul', 'id_user', 'id_grup_modul');
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
