<?php

namespace App\Models\ESurat;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AksesSuratTerbit extends Model
{
    use SoftDeletes;

    protected $table = 'akses_surat_terbit';
    protected $connection = 'esurat_trs';
    protected $fillable = [
        'id_user',
        'status',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    public function user()
    {
    	return $this->belongsTo('App\Models\Master\User', 'id_user')->withTrashed();
    }

    public function status_akses_surat_terbit()
    {
    	return $this->belongsTo('App\Models\ESurat\StatusAksesSuratTerbit', 'status')->withTrashed();
    }
}
