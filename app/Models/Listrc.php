<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listrc extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function rc(){
        return $this->belongsTo(RiskControl::class,'rc_id');
    }

    public function rlist(){
        return $this->belongsTo(Rlist::class,'list_id');
    }
}
