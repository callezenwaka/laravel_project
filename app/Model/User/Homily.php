<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon; 

class Homily extends Model
{
	protected $dates = ['published_at'];

    public function scopePublished($query)
    {
        $query->where('published_at','<=',Carbon::now());
    }

    public function scopeUnpublished($query)
    {
        $query->where('published_at','>',Carbon::now());
    }
	
    public function scopeFilter($query, $filters)
    {
        if ($month = $filters['month']) {
            $query->whereMonth('published_at', Carbon::parse($month)->month);
        }

        if ($year = $filters['year']) {
            $query->whereYear('published_at', $year);
        }
    }

    public static function archives()
    {
    	return static::selectRaw('year(published_at) year, monthname(published_at) month, count(*) published')
            ->published()
            ->groupBy('year', 'month')
            ->orderByRaw('min(published_at) desc')
            ->take(12)
            ->get()
            ->toArray();
    }
}
