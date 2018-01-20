<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use App\Mail\ContactEmail;
use Mail;

class ContactController extends Controller
{
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
        	'name' => 'required',
            'email' => 'required|email',
            'title' => 'required|max:50',
            'body' => 'required'
        ]);

        Mail::send('email.contact',[
        	'title' => $request->title,
        	'message_body' => $request->body,
        	'name' => $request->name,
        	'email' => $request->email
        ], function ($mail) use($request) {
        	$mail->from($request->email, $request->name, $request->title);

        	$mail->to('callisezenwaka@gmail.com')->subject('NFCS Inquiry');
        });

        //dd($request->all());
        return redirect(route('contact.create'))->with('message','Message sent successfully.');
    }
}
