<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserGrupModul extends Model
{
    use SoftDeletes;

    protected $table = 'user_grup_modul';
    protected $connection = 'master_sys';
    protected $fillable = [
        'id_user',
        'id_grup_modul',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\Master\User', 'id_user');
    }

    public function grup_modul()
    {
        return $this->belongsTo('App\Models\Master\GrupModul', 'id_grup_modul');
    }
}
