<?php

namespace App\Models\ESurat;

use App\Models\Master\JabatanUnitUser;
use App\Models\Master\ProfilUser;
use App\Models\Master\Unit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AksesSPSM extends Model
{
    use SoftDeletes;

    protected $table = 'akses_spsm';
    protected $connection = 'esurat_trs';
    protected $fillable = [
        'id_juu',
        'id_unit',
        'waktu_mulai',
        'waktu_berakhir',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    public function juu()
    {
    	return $this->belongsTo(JabatanUnitUser::class, 'id_juu', 'id')->withTrashed();
    }

    public function unit()
    {
    	return $this->belongsTo(Unit::class, 'id_unit', 'id')->withTrashed();
    }
}
