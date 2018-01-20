<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class Society extends Model
{
    protected $dates = ['start','end'];
    
    public function scopeFilter($query, $filters)
    {
        if ($year = $filters['year']) {
            $query->whereYear('start', $year);
        }
    }

    public static function orgs()
    {
    	return static::selectRaw('year(start) year, count(*) published')
            ->groupBy('year')
            ->orderByRaw('min(start) desc')
            ->take(1)
            ->get()
            ->toArray();
    }

    public static function past_orgs()
    {
        return static::selectRaw('year(start) year, count(*) published')
            ->groupBy('year')
            ->orderByRaw('min(start) desc')
            ->get()
            ->toArray();
    }
}
