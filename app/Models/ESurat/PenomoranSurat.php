<?php

namespace App\Models\ESurat;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class PenomoranSurat extends Model
{
    use SoftDeletes;

    protected $table = 'penomoran_surat';
    protected $connection = 'esurat_trs';
    protected $fillable = [
        'id_surat',
        'waktu',
        'nomor',
        'status',
        'id_jenis_surat',
        'id_jabatan_unit',
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

    public function surat()
    {
    	return $this->belongsTo('App\Models\ESurat\Surat', 'id_surat')->withTrashed();
    }

    public function status_penomoran_surat()
    {
    	return $this->belongsTo('App\Models\ESurat\StatusPenomoranSurat', 'status')->withTrashed();
    }

    public function jenis_surat()
    {
    	return $this->belongsTo('App\Models\ESurat\JenisSurat', 'id_jenis_surat')->withTrashed();
    }

    public function jabatan_unit()
    {
    	return $this->belongsTo('App\Models\Master\JabatanUnit', 'id_jabatan_unit')->withTrashed();
    }
}
