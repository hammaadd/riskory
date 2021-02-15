<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bprocess extends Model
{
    use HasFactory;

    protected $table = 'bprocesses';
    public $timestamps = true;

    protected $fillable = [
        'name',
        'note',
        'created_by',
        'status',
        'parent_id',
    ];


    public function user(){
        return $this->belongsTo('App\Models\User','created_by');
    }

    public function children()
    {
        return $this->hasMany('App\Models\Bprocess','parent_id');
    }

    public function parent()
    {
        return $this->belongsTo('App\Models\Bprocess','parent_id');
    }
}
