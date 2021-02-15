<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;

class RiskControl extends Model implements Viewable
{
    use InteractsWithViews;
    use HasFactory;
    use Sluggable;
    protected $table = 'risk_controls';
    public $timestamps = true;
    const EXCERPT_LENGTH = 10;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title',
            ],
        ];
    }

    protected $fillable = [
        'title',
        'obj_summary',
        'objective',
        'description',
        'frequency',
        'implementation_type',
        'business_impact',
        'recommendation',
        'status',
        'user_id',
        'is_comment_disabled'
    ];


    

    // public function industry(){
    //     return $this->morphToMany(Industry::class,'rcindustry');
    // }

    public function controls(){
        return $this->hasMany(Rccontrol::class,'rc_id');
    }

    public function tags(){
        return $this->hasMany(Rctag::class,'rc_id');
    }

    public function testingsteps(){
        return $this->hasMany(Testingstep::class,'rc_id');
    }

    public function excerpt()
    {
        return Str::limit($this->obj_summary, RiskControl::EXCERPT_LENGTH);
    }

    public function bookmarks(){
        return $this->hasMany(Bookmark::class,'rc_id');
    }

    public function bookmarkedBy(User $user){
        return $this->bookmarks->contains('user_id',$user->id);
    }

    public function likes(){
        return $this->hasMany(Like::class,'rc_id');
    }

    public function likedBy(User $user){
        return $this->likes->contains('user_id',$user->id);
    }

    public function dislikes(){
        return $this->hasMany(Dislike::class,'rc_id');
    }

    public function dislikedBy(User $user){
        return $this->dislikes->contains('user_id',$user->id);
    }

   
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function relations(){
        return $this->hasMany(Relation::class,'rc_id');
    }

    public function benchmarks(){
        return $this->hasMany(Benchmark::class,'rc_id');
    }

    public function comments(){
        return $this->hasMany(Comment::class,'rc_id');
    }

    public function benchmarkedBy(User $user){
        $u_id = $this->benchmarks->contains('user_id',$user->id);
        $rc_id = $this->benchmarks->contains('rc_id',$this->id);
        if($u_id == true && $rc_id==true){
            return true;
        }else{
            return false;
        }
    }

    public function ratings(){
        return $this->hasMany(Rating::class,'rc_id');
    }

    public function ratingAvg(){
        return $this->ratings->avg('rating')?:0;
    }
}
