<?php

namespace App\Models\ESurat;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AktivasiSekretaris extends Model
{
    use SoftDeletes;

    protected $table = 'aktivasi_sekretaris';
    protected $connection = 'esurat_trs';
    protected $fillable = [
        'id_pengaktivasi_sekretaris',
        'id_juu_sekretaris',
        'id_tipe_aktivasi',
        'waktu_mulai',
        'waktu_berakhir',
        'keterangan',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    public function pengaktivasi_sekretaris()
    {
    	return $this->belongsTo('App\Models\ESurat\PengaktivasiSekretaris', 'id_pengaktivasi_sekretaris')->withTrashed();
    }

    public function juu_sekretaris()
    {
    	return $this->belongsTo('App\Models\Master\JabatanUnitUser', 'id_juu_sekretaris')->withTrashed();
    }

    public function tipe_aktivasi()
    {
    	return $this->belongsTo('App\Models\ESurat\TipeAktivasiSekretaris', 'id_tipe_aktivasi')->withTrashed();
    }
}
