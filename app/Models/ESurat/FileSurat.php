<?php

namespace App\Models\ESurat;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FileSurat extends Model
{
    use SoftDeletes;

    protected $table = 'file_surat';
    protected $connection = 'esurat_trs';
    protected $fillable = [
        'id_surat',
        'path',
        'nama',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at'
    ];

    public function surat()
    {
    	return $this->belongsTo('App\Models\ESurat\Surat', 'id_surat')->withTrashed();
    }
}
