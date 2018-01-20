<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon; 

class Post extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}