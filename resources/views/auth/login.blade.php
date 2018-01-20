@extends('user.layouts.page')

@section('title', '| Login')

@section('header')
<style>
    .header {
        background-color: #ee6e73;
    }
</style>
@endsection

@section('content')
<div class="content top-margin">
    <div class="wrapper">
        @include('user.includes.messages')
       <div class="head center"><h1>Login</h1></div>
            <form class="center" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}

                <div class="row {{ $errors->has('email') ? 'has-error' : '' }}">
                    <div class="input1">
                        <label for="email" class="label">E-Mail Address: </label>
                        <input id="email" type="email" class="input" name="email" value="{{ old('email') }}" placeholder="E-Mail" required autofocus>
                    </div>
                        <div style="margin-top: 10px;">
                            @if ($errors->has('email'))
                            <span class="help-block" style="color: red;margin-left: 30px;">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                </div>

                <div class="row {{ $errors->has('password') ? 'has-error' : '' }}">
                    <div class="input1">
                        <label for="password" class="label">Password: </label>
                        <input id="password" type="password" class="input" name="password" placeholder="Password" required>
                    </div>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                </div>

                <div class="row">
                    <div class="checkbox center col-xs-12 col-sm-12 col-md-12">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                        </label>
                    </div>
                </div>

                <div class="row">
                    <div class=" center col-xs-12 col-sm-12 col-md-12 ">
                        <button class="buttons " type="submit">
                        Login
                        </button>
                        <a class="" href="{{ route('password.request') }}">
                            <strong>Forgot Your Password?</strong>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection