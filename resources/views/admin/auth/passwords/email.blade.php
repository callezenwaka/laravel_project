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
        <div class="panel-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif                    
        </div>
       <div class="head"><h1>Reset Password</h1></div>
            <form class="form-horizontal" role="form" method="POST" action="{{ route('password.email') }}">
                {{ csrf_field() }}

                <div class="row">
                    <label for="email" class="col-md-4 control-label">E-Mail Address: </label>
                    <input id="email" type="email" class="input" name="email" value="{{ old('email') }}" required>
                    <div class="col-md-6">
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <button type="submit" class="formButton">
                        Send Password Reset Link
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection