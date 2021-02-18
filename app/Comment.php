<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function gift()
    {
        return $this->belongsTo(Gift::class);
    }
}
