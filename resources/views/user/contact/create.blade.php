@extends('user.layouts.page')

@section('title', '| Contact')

@section('header')
<style>
    .header {
        background-color: #ee6e73;
    }
</style>
@endsection

@section('content')
<div class="content top-margin">
    <div class="wrapper" id="">
        <div class="head">
            <h1 class="head_margin">CONTACT US</h1></div>
        <div id="content">
            <div>
                <p><i class="fa fa-map-marker" aria-hidden="true"></i> 
                    NFCS University of Ilorin Secretariat<br>
                    &nbsp&nbsp&nbspST THOMAS AQUINAS' CHAPLAINCY (STAC)<br>
                    &nbsp&nbsp&nbspMian Campus,<br>
                    &nbsp&nbsp&nbspP.M.B. 1515,<br>
                    &nbsp&nbsp&nbspUniversity of Ilorin,<br>
                    &nbsp&nbsp&nbspIlorin,<br>
                    &nbsp&nbsp&nbspKwara State.
                </p>
                <p><i class="fa fa-mobile" aria-hidden="true"></i><a href="#"> 08032985995</a></p>
                <p><i class="fa fa-envelope-o" aria-hidden="true"></i> nfcsunilorinchapter@gmail.com</p>
            </div>
            <div class="">
                @include('user.includes.messages')
                <!-- <h1 class="center">Email Us</h1> -->
                <!-- <div> -->
                    <form class="" action="{{ route('contact.store') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="row">
                           <div class="">
                                <label class="label">Name: </label>
                                <input class="input" type="text" name="name" value="{{ old('name') }}" required="" placeholder="Enter your name"/>
                           </div>
                           <div class="input2">
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                           <div class="">
                                <label class="label">Email: </label>
                                <input class="input" type="email" name="email" value="{{ old('email') }}" required="" placeholder="Enter your email"/>
                           </div>
                           <div class="input2">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                           <div class="">
                                <label class="label">Subject: </label>
                                <input class="input" type="text" name="title" value="{{ old('title') }}" required="" placeholder="Enter message title"/>
                           </div>
                           <div class="input2">
                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="">
                                <label class="label">Message: </label>
                                <textarea class="input" type="text" name="body" id="editor" placeholder="Enter your Message">{{ old('body') }}</textarea>
                            </div>
                            <div class="input2">
                                @if ($errors->has('body'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('body') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="center">
                            <button class="formButton" type="submit" name="submit">Submit</button>
                        </div>
                    </form>
               <!--  </div> -->
               <!-- @include('user.layouts.errors') -->
            </div>
        </div>
    </div>
</div>
@endsection