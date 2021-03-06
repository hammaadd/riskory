<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id'
    ];

    public function control(){
        return $this->belongsTo(Control::class,'control_id');
    }
}
