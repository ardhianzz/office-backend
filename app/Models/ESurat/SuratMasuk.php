<?php

namespace App\Models\ESurat;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class SuratMasuk extends Model
{
    use SoftDeletes;

    protected $table = 'surat_masuk';
    protected $connection = 'esurat_trs';
    protected $fillable = [
        'id_surat',
        'id_juu_penerima',
        'id_jenis_surat_masuk',
        'id_surat_forward',
        'id_surat_disposisi',
        'is_opened',
        'opened_at',
        'is_hidden',
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

    public function juu_penerima()
    {
    	return $this->belongsTo('App\Models\Master\JabatanUnitUser', 'id_juu_penerima')->withTrashed();
    }

    public function jenis_surat_masuk()
    {
    	return $this->belongsTo('App\Models\ESurat\JenisSuratMasuk', 'id_jenis_surat_masuk')->withTrashed();
    }

    public function surat_disposisi()
    {
    	return $this->hasMany('App\Models\ESurat\SuratDisposisi', 'id_surat_masuk');
    }

    public function surat_forward()
    {
    	return $this->hasMany('App\Models\ESurat\SuratForward', 'id_surat_masuk');
    }

    public function parent_surat_disposisi()
    {
    	return $this->belongsTo('App\Models\ESurat\SuratDisposisi', 'id_surat_disposisi')->withTrashed();
    }

    public function parent_surat_forward()
    {
    	return $this->belongsTo('App\Models\ESurat\SuratForward', 'id_surat_forward')->withTrashed();
    }

    public function pengolahan_disposisi_surat_masuk()
    {
    	return $this->hasMany('App\Models\ESurat\PengolahanDisposisiSuratMasuk', 'id_surat_masuk');
    }

    public function spsm()
    {
    	return $this->hasOne('App\Models\ESurat\SPSM', 'id_surat_masuk');
    }
}
