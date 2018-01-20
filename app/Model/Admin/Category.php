<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function blogs()
    {
        return $this->belongsToMany('App\Model\Admin\Blog::class','Blog_Category');
    }
}
