<?php

namespace App\Models\ESurat;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class RiwayatDisposisiSurat extends Model
{
    use SoftDeletes;

    protected $table = 'riwayat_disposisi_surat';
    protected $connection = 'esurat_trs';
    protected $fillable = [
        'id_surat_disposisi',
        'id_aksi_disposisi_surat',
        'detail_aksi',
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

    public function surat_disposisi()
    {
    	return $this->belongsTo('App\Models\ESurat\SuratDisposisi', 'id_surat_disposisi')->withTrashed();
    }

    public function aksi_disposisi_surat()
    {
    	return $this->belongsTo('App\Models\ESurat\AksiDisposisiSurat', 'id_aksi_disposisi_surat')->withTrashed();
    }
}
