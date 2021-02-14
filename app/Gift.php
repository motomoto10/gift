<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gift extends Model
{
    
    protected $fillable = ['gift','relation','anniversary','gender','old','price','day','explain'];
    
        public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function favorite()
    {
        return $this->belongsToMany(User::class,'favorite_gift','gift_id', 'user_id')->withTimestamps();
    }
    
    public function loadRelationshipCounts()
    {
        $this->loadCount(['favorite']);
    }
}
