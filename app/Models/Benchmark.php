<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Benchmark extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function rc(){
        return $this->belongsTo(RiskControl::class,'rc_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
