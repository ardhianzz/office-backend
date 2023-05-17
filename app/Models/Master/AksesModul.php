<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AksesModul extends Model
{
    use SoftDeletes;

    protected $table = 'akses_modul';
    protected $connection = 'master_sys';
    protected $fillable = [
        'id_grup_modul',
        'id_modul',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    public function modul()
    {
        return $this->belongsTo('App\Models\Master\Modul', 'id_modul');
    }

    public function grup_modul()
    {
        return $this->belongsTo('App\Models\Master\GrupModul', 'id_grup_modul');
    }
}
