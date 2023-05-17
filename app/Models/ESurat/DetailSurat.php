<?php

namespace App\Models\ESurat;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailSurat extends Model
{
    use SoftDeletes;

    protected $table = 'detail_surat';
    protected $connection = 'esurat_trs';
    protected $fillable = [
        'id_surat',
        'perihal',
        'lampiran',
        'isi',
        'tampilan_dari',
        'tampilan_penerima',
        'tampilan_tembusan',
        'jumlah_ttd',
        'tempat',
        'tanggal',
        'alasan',
        'id_jenis_pemberkasan',
        'nominal',
        'nomor',
        'nomor_urut',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at'
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
