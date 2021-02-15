<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rcprocess extends Model
{
    use HasFactory;
    protected $table = 'rcprocesses';
    public $timestamps = true;

    protected $fillable = [
        'rc_id',
        'pro_id',
    ];
}
