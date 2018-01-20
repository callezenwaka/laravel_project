<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class Executive extends Model
{
    protected $dates = ['start','end'];

    public function scopeFilter($query, $filters)
    {
        if ($year = $filters['year']) {
            $query->whereYear('start', $year);
        }
    }

    public static function excos()
    {
    	return static::selectRaw('year(start) year, count(*) published')
            ->groupBy('year')
            ->orderByRaw('min(start) desc')
            ->take(1)
            ->get()
            ->toArray();
    }

    public static function past_excos()
    {
        return static::selectRaw('year(start) year, count(*) published')
            ->groupBy('year')
            ->orderByRaw('min(start) desc')
            ->get()
            ->toArray();
    }
}
