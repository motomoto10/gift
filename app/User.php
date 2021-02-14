<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','born','gender','myself'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    static $genders = [
        '男', '女','その他'
    ];
    
    
    public function gifts()
    {
        return $this->hasMany(Gift::class);
    }
    
        public function loadRelationshipCounts()
    {
        $this->loadCount('gifts');
    }
    
    
    public function favorites()
    {
        return $this->belongsToMany(Gift::class,'favorite_gift', 'user_id','gift_id')->withTimestamps();
    }
    
    public function favorite($giftId)
    {
        // すでにいいねしているかの確認
        $exist = $this->is_favorites($giftId);
        
        if($exist) {
            return false;
        }else {
            $this->favorites()->attach($giftId);
            return true;
        }
    }
    
    public function unfavorite($giftId)
    {
        // すでにいいねしているかの確認
        $exist = $this->is_favorites($giftId);
        
        if($exist) {
            $this->favorites()->detach($giftId);
            return true;
        }else {
            return false;
        }
    }
    
    public function is_favorites($giftId)
    {
        // お気に入り中giftの中に $giftIdのものが存在するか
        return $this->favorites()->where('gift_id', $giftId)->exists();
    }
}
