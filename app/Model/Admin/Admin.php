<?php

namespace App\Model\Admin;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name','slug','image', 'email', 'password','phone','status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Model\Admin\Role');
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }

    public function homilies()
    {
        return $this->hasMany(Homily::class);
    }

    public function getFirstNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function isAdmin()
    {
        return $this->admin; // this looks for an admin column in your users table
    }
}

