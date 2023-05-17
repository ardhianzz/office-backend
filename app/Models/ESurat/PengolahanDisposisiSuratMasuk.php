<?php

namespace App\Models\ESurat;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class PengolahanDisposisiSuratMasuk extends Model
{
    use SoftDeletes;

    protected $table = 'pengolahan_disposisi_surat_masuk';
    protected $connection = 'esurat_trs';
    protected $fillable = [
        'id_surat_masuk',
        'id_pengolahan_disposisi',
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

    public function pengolahan_disposisi()
    {
    	return $this->belongsTo('App\Models\ESurat\PengolahanDisposisi', 'id_pengolahan_disposisi')->withTrashed();
    }
}
