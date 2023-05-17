<?php

namespace App\Models\ESurat;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LampiranSuratDisposisi extends Model
{
    use SoftDeletes;

    protected $table = 'lampiran_surat_disposisi';
    protected $connection = 'esurat_trs';
    protected $fillable = [
        'id_surat_disposisi',
        'path',
        'nama',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at'
    ];

    public function surat_disposisi()
    {
    	return $this->belongsTo('App\Models\ESurat\SuratDisposisi', 'id_surat_disposisi')->withTrashed();
    }
}
