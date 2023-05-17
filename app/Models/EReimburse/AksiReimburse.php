<?php

namespace App\Models\EReimburse;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AksiReimburse extends Model
{
    use SoftDeletes;

    protected $table = 'aksi_reimburse';
    protected $connection = 'ereimburse_sys';
    protected $guarded = [];
}
