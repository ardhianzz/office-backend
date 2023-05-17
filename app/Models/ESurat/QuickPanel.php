<?php

namespace App\Models\ESurat;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuickPanel extends Model
{
    use SoftDeletes;

    protected $table = 'quick_panel';
    protected $connection = 'esurat_trs';
    protected $fillable = [
        'id_juu',
        'id_surat',
        'link',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    public function juu()
    {
    	return $this->belongsTo('App\Models\Master\JabatanUnitUser', 'id_juu')->withTrashed();
    }

    public function surat()
    {
    	return $this->belongsTo('App\Models\ESurat\Surat', 'id_surat')->withTrashed();
    }
}
