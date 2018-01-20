<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon; 

class Post extends Model
{
    public function tag()
    {
        return $this->belongsToMany('App\Model\Admin\Admin::class');
    }
}
