<?php

namespace App\Models\ESurat;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bahasa extends Model
{
    use SoftDeletes;

    protected $table = 'bahasa';
    protected $connection = 'esurat_sys';
    protected $fillable = [
        'kode',
        'nama',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
}
