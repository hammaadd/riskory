<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rccontrol extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function control(){
        return $this->belongsTo(Control::class,'control_id');
    }

    

    public function rc(){
        return $this->belongsTo(RiskControl::class,'rc_id');
    }

   


}
