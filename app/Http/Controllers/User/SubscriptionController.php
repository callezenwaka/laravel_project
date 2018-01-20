<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User\Subscription;

class SubscriptionController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'email' => 'required|email|unique:subscriptions',
        ]);
        
        $subscribe = new Subscription;
        $subscribe->email = request('email');
        $subscribe->save();

        return redirect()->back()->with('message','Your subscription was successful.');
    }
}
