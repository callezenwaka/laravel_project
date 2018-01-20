@extends('user.layouts.page')

@section('title', '| Register')

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
        <div class="head center"><h1>Register</h1></div>
            <form class=" form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}

                <div class="row {{ $errors->has('first_name') ? 'has-error' : '' }}">
                    <div class="input1">
                        <label for="first_name" class="col-md-4 control-label" style="text-align: right;">First Name: </label>
                        <input id="first_name" type="text" class="input" name="first_name" value="{{ old('first_name') }}" placeholder="First Name" required autofocus>
                    </div>
                    <div class="col-md-6">
                        @if ($errors->has('first_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('first_name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row {{ $errors->has('last_name') ? 'has-error' : '' }}">
                    <div class="input1">
                        <label for="last_name" class="col-md-4 control-label">Last Name: </label>
                        <input id="last_name" type="text" class="input" name="last_name" value="{{ old('last_name') }}" placeholder="Last Name" required autofocus>
                    </div>
                    <div class="col-md-6">
                        @if ($errors->has('last_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('last_name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row {{ $errors->has('email') ? 'has-error' : '' }}">
                    <div class="input1">
                        <label for="email" class="col-md-4 control-label">E-Mail Address: </label>
                        <input id="email" type="email" class="input" name="email" value="{{ old('email') }}" placeholder="Email" required>
                    </div>
                    <div class="col-md-6">
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="input1">
                        <label for="password" class="">Password: </label>
                        <input id="password" type="password" class="input" name="password" placeholder="Password" required>
                    </div>
                    <div class="col-md-6">
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row {{ $errors->has('password') ? 'has-error' : '' }}">
                    <div class="input1">
                        <label for="password-confirm" class="">Confirm Password: </label>
                        <input id="password-confirm" type="password" class="input" name="password_confirmation" placeholder="Confirm Password" required>
                    </div>
                </div>
                <div class="row center">
                    <button type="submit" class="buttons">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection