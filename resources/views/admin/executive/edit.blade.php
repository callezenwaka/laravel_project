@extends('admin.layouts.dashboard')

@section('title', '| Admin | Edit | Executive')


@section('content')
    
<div>
  <div>
    <div class="">
      <a href="{{route('executive.index')}}">Back</a>
    </div>
  </div>  

       <h1>Edit Executive</h1>
       
       <hr>

       <form method="POST" action="{{route('executive.update',$executive->slug)}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

          <div class="row {{ $errors->has('title') ? 'has-error' : '' }}">
                    <div class="input1">
                        <label for="title" class="col-md-4 control-label" style="text-align: right;">Title: </label>
                        <input id="title" type="text" class="input" name="title" value="{{ $executive->title }}" placeholder="Title" required autofocus>
                    </div>
                    <div class="col-md-6">
                        @if ($errors->has('title'))
                            <span class="help-block">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

          <div class="row {{ $errors->has('first_name') ? 'has-error' : '' }}">
                    <div class="input1">
                        <label for="first_name" class="col-md-4 control-label" style="text-align: right;">First Name: </label>
                        <input id="first_name" type="text" class="input" name="first_name" value="{{ $executive->first_name }}" placeholder="First Name" required autofocus>
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
                        <label for="last_name" class="col-md-4 control-label" style="text-align: right;">Last Name: </label>
                        <input id="last_name" type="text" class="input" name="last_name" value="{{ $executive->last_name }}" placeholder="Last Name" required autofocus>
                    </div>
                    <div class="col-md-6">
                        @if ($errors->has('last_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('last_name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row {{ $errors->has('portfolio') ? 'has-error' : '' }}">
                    <div class="input1">
                        <label for="portfolio" class="col-md-4 control-label" style="text-align: right;">Portfolio: </label>
                        <input id="portfolio" type="text" class="input" name="portfolio" value="{{ $executive->portfolio }}" placeholder="Portfolio" required autofocus>
                    </div>
                    <div class="col-md-6">
                        @if ($errors->has('portfolio'))
                            <span class="help-block">
                                <strong>{{ $errors->first('portfolio') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row {{ $errors->has('image') ? 'has-error' : '' }}">
                    <div class="input1">
                        <label for="image" class="col-md-4 control-label" style="text-align: right;">Image: </label>
                        <input id="image" type="file" class="input" name="image">
                    </div>
                    <div class="col-md-6">
                        @if ($errors->has('image'))
                            <span class="help-block">
                                <strong>{{ $errors->first('image') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row {{ $errors->has('phone') ? 'has-error' : '' }}">
                    <div class="input1">
                        <label for="phone" class="col-md-4 control-label" style="text-align: right;">Phone Number: </label>
                        <input id="phone" type="text" class="input" name="phone" value="{{ $executive->phone }}" placeholder="Phone Number" required autofocus>
                    </div>
                    <div class="col-md-6">
                        @if ($errors->has('phone'))
                            <span class="help-block">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row {{ $errors->has('email') ? 'has-error' : '' }}">
                    <div class="input1">
                        <label for="email" class="col-md-4 control-label" style="text-align: right;">Email: </label>
                        <input id="email" type="email" class="input" name="email" value="{{ $executive->email }}" placeholder="Email" required autofocus>
                    </div>
                    <div class="col-md-6">
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                   <div class="row {{ $errors->has('start') ? 'has-error' : '' }}">
                    <div class="input1">
                        <label for="start" class="col-md-4 control-label" style="text-align: right;">From: </label>
                        <input id="start" type="date" class="input" name="start" value="{{ $executive->start }}" required autofocus>
                    </div>
                    <div class="col-md-6">
                        @if ($errors->has('start'))
                            <span class="help-block">
                                <strong>{{ $errors->first('start') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row {{ $errors->has('end') ? 'has-error' : '' }}">
                    <div class="input1">
                        <label for="end" class="col-md-4 control-label" style="text-align: right;">To: </label>
                        <input id="end" type="date" class="input" name="end" value="{{ $executive->end }}" required autofocus>
                    </div>
                    <div class="col-md-6">
                        @if ($errors->has('end'))
                            <span class="help-block">
                                <strong>{{ $errors->first('end') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                    

          <div class="row">
              <button type="submit" class="buttons">Update</button>
          </div>

          @include('admin.layouts.errors')

       </form>

</div><!-- /.blog-main -->

@endsection