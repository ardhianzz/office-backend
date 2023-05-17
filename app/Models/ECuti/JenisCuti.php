<?php

namespace App\Models\ECuti;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JenisCuti extends Model
{
    use SoftDeletes;

    protected $table = 'jenis_cuti';
    protected $connection = 'ecuti_sys';
    protected $guarded = [];

    public function parent()
    {
    	return $this->belongsTo('App\Models\ECuti\JenisCuti', 'id_parent')->withTrashed();
    }
}
