<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function blogs()
    {
        return $this->belongsToMany('App\Model\Admin\Blog::class','Blog_Tag');
    }
}
