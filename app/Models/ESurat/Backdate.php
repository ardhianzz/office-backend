<?php

namespace App\Models\ESurat;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Backdate extends Model
{
    use SoftDeletes;

    protected $table = 'backdate';
    protected $connection = 'esurat_trs';
    protected $fillable = [
        'id_user',
        'status',
        'waktu_mulai',
        'waktu_berakhir',
        'keterangan',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    public function user()
    {
    	return $this->belongsTo('App\Models\Master\User', 'id_user')->withTrashed();
    }

    public function status_backdate()
    {
    	return $this->belongsTo('App\Models\ESurat\StatusBackdate', 'status')->withTrashed();
    }
}
