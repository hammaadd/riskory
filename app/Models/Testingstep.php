<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testingstep extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function rc(){
        return $this->belongsTo(RiskControl::class);
    }
}
