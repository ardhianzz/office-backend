<?php

namespace App\Models\ESurat;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PengaktivasiSekretaris extends Model
{
    use SoftDeletes;

    protected $table = 'pengaktivasi_sekretaris';
    protected $connection = 'esurat_trs';
    protected $fillable = [
        'id_juu',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    public function juu()
    {
    	return $this->belongsTo('App\Models\Master\JabatanUnitUser', 'id_juu')->withTrashed();
    }

    public function aktivasi_sekretaris()
    {
    	return $this->hasOne('App\Models\ESurat\AktivasiSekretaris', 'id_pengaktivasi_sekretaris');
    }
}
