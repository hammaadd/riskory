<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable implements MustVerifyEmail
{
    use LaratrustUserTrait;
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
        'avatar',
        'cover',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $guarded = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];

    public function country(){
        return $this->belongsTo(Country::class,'country_id');
    }

    public function industries()
    {
        return $this->hasMany('App\Models\Industry');
    }

    public function followers(){
        return $this->hasMany(Follow::class);
    }

    public function tagFollowers(){
        return $this->hasMany(FollowTags::class);
    }

    public function bookmarks(){
        return $this->hasMany(Bookmark::class);
    }

    public function benchmarks(){
        return $this->hasMany(Benchmark::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }

    public function dislikes(){
        return $this->hasMany(Dislike::class);
    }

    public function rcs(){
        return $this->hasMany(RiskControl::class,'user_id');
    }

    public function userFollowers(){
        return $this->hasMany(Followuser::class,'user_id');
    }

    public function userFollowing(){
        return $this->hasMany(Followuser::class,'follower_id');
    }

    public function followedBy(User $user){
        return $this->userFollowers->contains('follower_id',$user->id);
    }

    public function rlists(){
        return $this->hasMany(Rlist::class,'user_id');
    }

    public function followControls(){
        return $this->hasMany(Follow::class,'user_id');
    }

    public function followTags(){
        return $this->hasMany(FollowTags::class,'user_id');
    }

    public function recommendedTags(){
        return $this->hasMany(Tag::class,'created_by');
    }
    


    
}
