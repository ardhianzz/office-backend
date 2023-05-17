<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KartuKeluarga extends Model
{
    use SoftDeletes;

    protected $table = 'kartu_keluarga';
    protected $connection = 'master_sys';
    protected $fillable = [
        'id_profil_user',
        'path',
        'nama',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    public function profil_user()
    {
    	return $this->belongsTo('App\Models\Master\ProfilUser', 'id_profil_user')->withTrashed();
    }
}
