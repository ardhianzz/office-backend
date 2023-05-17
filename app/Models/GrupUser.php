<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GrupUser extends Model
{
    use SoftDeletes;

    protected $table = 'grup_user';
    protected $connection = 'sys';
    protected $fillable = [
        'id_grup',
        'id_user',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    public function user()
    {
    	return $this->belongsTo('App\Models\Master\User', 'id_user');
    }

    public function grup()
    {
    	return $this->belongsTo('App\Models\Grup', 'id_grup');
    }
}
