<?php

namespace App\Models\EReimburse;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StatusPersetujuanReimburse extends Model
{
    use SoftDeletes;

    protected $table = 'status_persetujuan_reimburse';
    protected $connection = 'ereimburse_sys';
    protected $guarded = [];
}
