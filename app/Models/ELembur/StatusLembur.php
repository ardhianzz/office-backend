<?php

namespace App\Models\ELembur;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StatusLembur extends Model
{
    use SoftDeletes;

    protected $table = 'status_lembur';
    protected $connection = 'elembur_sys';
    protected $guarded = [];
}
