<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon; 

class Post extends Model
{
    public function admin()
    {
        return $this->belongsTo('App\Model\Admin\Admin::class');
    }
}
