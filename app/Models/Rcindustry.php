<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rcindustry extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function industry(){
        return $this->belongsTo(Industry::class,'ind_id');
    }

    public function rc(){
        return $this->belongsTo(RiskControl::class);
    }
}
