<?php

namespace App\Models\ESurat;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class RiwayatSurat extends Model
{
    use SoftDeletes;

    protected $table = 'riwayat_surat';
    protected $connection = 'esurat_trs';
    protected $fillable = [
        'id_surat',
        'id_juu',
        'status',
        'id_aksi_surat',
        'detail_aksi',
        'keterangan',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at'
    ];

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('id', 'asc');
        });
    }

    public function surat()
    {
    	return $this->belongsTo('App\Models\ESurat\Surat', 'id_surat')->withTrashed();
    }

    public function juu()
    {
    	return $this->belongsTo('App\Models\Master\JabatanUnitUser', 'id_juu')->withTrashed();
    }

    public function status_persetujuan()
    {
    	return $this->belongsTo('App\Models\ESurat\StatusPersetujuanSurat', 'status')->withTrashed();
    }

    public function aksi_surat()
    {
    	return $this->belongsTo('App\Models\ESurat\AksiSurat', 'id_aksi_surat')->withTrashed();
    }
}
