@extends('layouts.page')

@section('title', '| Reset Password')
@section('stylesheets')
<style>
    background-color: blue;
</style>
@endsection
@section('content')
<div class="content top-margin">
    <div class="wrapper">
       <div class="head"><h1>Reset Password</h1></div>
            <form class="form-horizontal" role="form" method="POST" action="{{ route('password.request') }}">
                    {{ csrf_field() }}

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="row">
                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                    <input id="email" type="email" class="input" name="email" value="{{ $email or old('email') }}" required autofocus>
                    <div class="col-md-6">
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <label for="password" class="col-md-4 control-label">Password</label>
                    <input id="password" type="password" class="input" name="password" required>
                    <div class="col-md-6">
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                    <input id="password-confirm" type="password" class="input" name="password_confirmation" required>
                    <div class="col-md-6">
                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="formButton">
                        Reset Password
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection