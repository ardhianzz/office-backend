<?php

namespace App\Models\ELembur;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AksiLembur extends Model
{
    use SoftDeletes;

    protected $table = 'aksi_lembur';
    protected $connection = 'elembur_sys';
    protected $guarded = [];
}
