<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon; 

class Blog extends Model
{
    public function admin()
    {
        return $this->belongsTo('App\Model\Admin\Admin::class');
    }

    public function tag()
    {
        return $this->belongsToMany('App\Model\Admin\Tag::class','Blog_Tags');
    }

    public function category()
    {
        return $this->belongsToMany('App\Model\Admin\Category::class','Blog_Categories');
    }
}
