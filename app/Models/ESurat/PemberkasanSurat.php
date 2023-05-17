<?php

namespace App\Models\ESurat;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PemberkasanSurat extends Model
{
    use SoftDeletes;

    protected $table = 'pemberkasan_surat';
    protected $connection = 'esurat_trs';
    protected $fillable = [
        'id_surat',
        'is_qrcode',
        'is_header_footer',
        'id_jenis_pemberkasan',
        'path',
        'nama',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    public function surat()
    {
    	return $this->belongsTo('App\Models\ESurat\Surat', 'id_surat')->withTrashed();
    }

    public function jenis_pemberkasan()
    {
    	return $this->belongsTo('App\Models\ESurat\JenisPemberkasan', 'id_jenis_pemberkasan')->withTrashed();
    }
}
