<?php

namespace App\Models\ESurat;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class SuratForward extends Model
{
    use SoftDeletes;

    protected $table = 'surat_forward';
    protected $connection = 'esurat_trs';
    protected $fillable = [
        'id_surat_masuk',
        'id_juu_pengirim',
        'id_juu_penerima',
        'id_parent',
        'keterangan',
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

    public function surat_masuk()
    {
    	return $this->belongsTo('App\Models\ESurat\SuratMasuk', 'id_surat_masuk')->withTrashed();
    }

    public function juu_pengirim()
    {
    	return $this->belongsTo('App\Models\Master\JabatanUnitUser', 'id_juu_pengirim')->withTrashed();
    }

    public function juu_penerima()
    {
    	return $this->belongsTo('App\Models\Master\JabatanUnitUser', 'id_juu_penerima')->withTrashed();
    }

    public function parent()
    {
    	return $this->belongsTo('App\Models\ESurat\SuratForward', 'id_parent')->withTrashed();
    }
}
