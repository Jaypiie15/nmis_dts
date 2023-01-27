<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Tracking extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'tracking_tbl';

    protected $guarded = [];

}
