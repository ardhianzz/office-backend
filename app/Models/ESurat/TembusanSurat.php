<?php

namespace App\Models\ESurat;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class TembusanSurat extends Model
{
    use SoftDeletes;

    protected $table = 'tembusan_surat';
    protected $connection = 'esurat_trs';
    protected $fillable = [
        'id_surat',
        'id_juu_tembusan',
        'tampilan',
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

    public function juu_tembusan()
    {
    	return $this->belongsTo('App\Models\Master\JabatanUnitUser', 'id_juu_tembusan')->withTrashed();
    }
}
