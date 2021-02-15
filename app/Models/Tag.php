<?php

namespace App\Models;

use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model implements Viewable
{
    use InteractsWithViews;
    use HasFactory;
    protected $table = 'tags';
    public $timestamps = true;

    protected $fillable = [
        'name',
        'user_id',
        'status',
        'is_recommended',
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function followers(){
        
        return $this->hasMany(FollowTags::class);
    }

    public function followedBy(User $user){
        return $this->followers->contains('user_id',$user->id);
    }

    public function rctags(){
        return $this->hasMany(Rctag::class,'tag_id');
    }

}
