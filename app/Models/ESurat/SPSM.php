<?php

namespace App\Models\ESurat;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class SPSM extends Model
{
    use SoftDeletes;

    protected $table = 'spsm';
    protected $connection = 'esurat_trs';
    protected $fillable = [
        'id_surat_masuk',
        'id_surat',
        'id_jenis_spsm',
        'keterangan',
        'nomor',
        'accepted_at',
        'status',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('id', 'asc');
        });
    }

    public function surat_masuk()
    {
    	return $this->belongsTo('App\Models\ESurat\SuratMasuk', 'id_surat_masuk')->withTrashed();
    }

    public function surat()
    {
    	return $this->belongsTo('App\Models\ESurat\Surat', 'id_surat')->withTrashed();
    }

    public function created_by_juu()
    {
    	return $this->belongsTo('App\Models\Master\JabatanUnitUser', 'created_by')->withTrashed();
    }

    public function updated_by_juu()
    {
    	return $this->belongsTo('App\Models\Master\JabatanUnitUser', 'updated_by')->withTrashed();
    }

    public function status_spsm()
    {
    	return $this->belongsTo('App\Models\Master\StatusSPSM', 'status')->withTrashed();
    }

    public function jenis_spsm()
    {
    	return $this->belongsTo('App\Models\ESurat\JenisSPSM', 'id_jenis_spsm')->withTrashed();
    }
}
