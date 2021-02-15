<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relation extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function rc(){
        return $this->belongsTo(RiskControl::class,'rc_id');
    }

    public function relation(){
        return $this->belongsTo(RiskControl::class,'relation_id');
    }

}
