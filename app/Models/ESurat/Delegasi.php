<?php

namespace App\Models\ESurat;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Delegasi extends Model
{
    use SoftDeletes;

    protected $table = 'delegasi';
    protected $connection = 'esurat_trs';
    protected $fillable = [
        'id_juu_penerbit',
        'id_juu_delegasi',
        'id_juu_penerima',
        'status',
        'waktu_mulai',
        'waktu_berakhir',
        'keterangan',
        'activated_at',
        'finished_at',
        'id_surat',
        'id_juu_delegasi_penerima',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    public function juu_penerbit()
    {
    	return $this->belongsTo('App\Models\Master\JabatanUnitUser', 'id_juu_penerbit')->withTrashed();
    }

    public function juu_delegasi()
    {
    	return $this->belongsTo('App\Models\Master\JabatanUnitUser', 'id_juu_delegasi')->withTrashed();
    }

    public function juu_penerima()
    {
    	return $this->belongsTo('App\Models\Master\JabatanUnitUser', 'id_juu_penerima')->withTrashed();
    }

    public function status_delegasi()
    {
    	return $this->belongsTo('App\Models\ESurat\StatusDelegasi', 'status')->withTrashed();
    }

    public function surat()
    {
    	return $this->belongsTo('App\Models\ESurat\Surat', 'id_surat')->withTrashed();
    }

    public function juu_delegasi_penerima()
    {
    	return $this->belongsTo('App\Models\Master\JabatanUnitUser', 'id_juu_delegasi_penerima')->withTrashed();
    }
}
