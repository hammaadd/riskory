<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rcframework extends Model
{
    use HasFactory;
    protected $table = 'rcframeworks';
    public $timestamps = true;

    protected $fillable = [
        'rc_id',
        'fr_id',
    ];
}
