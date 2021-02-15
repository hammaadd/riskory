<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rctag extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function tag(){
        return $this->belongsTo(Tag::class,'tag_id');
    }

    public function rc(){
        return $this->belongsTo(RiskControl::class);
    }
}
