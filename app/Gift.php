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
}
