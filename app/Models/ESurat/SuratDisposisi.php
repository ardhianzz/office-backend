<?php

namespace App\Models\ESurat;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class SuratDisposisi extends Model
{
    use SoftDeletes;

    protected $table = 'surat_disposisi';
    protected $connection = 'esurat_trs';
    protected $fillable = [
        'id_surat_masuk',
        'id_juu_pengirim',
        'id_juu_penerima',
        'id_parent',
        'is_stop',
        'is_opened',
        'keterangan',
        'hasil',
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

    public function has_surat_masuk()
    {
    	return $this->hasOne('App\Models\ESurat\SuratMasuk', 'id_surat_disposisi');
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
    	return $this->belongsTo('App\Models\ESurat\SuratDisposisi', 'id_parent')->withTrashed();
    }

    public function lampiran_surat_disposisi()
    {
    	return $this->hasOne('App\Models\ESurat\LampiranSuratDisposisi', 'id_surat_disposisi');
    }

    public function riwayat_disposisi()
    {
    	return $this->hasMany('App\Models\ESurat\RiwayatDisposisiSurat', 'id_surat_disposisi');
    }

    public function disposisi_child()
    {
    	return $this->hasMany('App\Models\ESurat\SuratDisposisi', 'id_parent');
    }
}
