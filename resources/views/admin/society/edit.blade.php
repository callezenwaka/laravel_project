@extends('admin.layouts.dashboard')

@section('title', '| Admin | Edit | Society')


@section('content')
    
<div>
  <div>
      <a href="{{route('society.index')}}">Back</a>
    </div>
       <h1>Create Society</h1>
       
       <hr>

       <form method="POST" action="{{route('society.update',$society->slug)}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

          <div class="row {{ $errors->has('name') ? 'has-error' : '' }}">
                    <div class="input1">
                        <label for="name" class="col-md-4 control-label" style="text-align: right;">Name: </label>
                        <input id="name" type="text" class="input" name="name" value="{{ $society->name }}" placeholder="Name" required autofocus>
                    </div>
                    <div class="col-md-6">
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

          <div class="row {{ $errors->has('image') ? 'has-error' : '' }}">
                    <div class="input1">
                        <label for="image" class="col-md-4 control-label" style="text-align: right;">Image: </label>
                        <input id="image" type="file" class="input" name="image" autofocus>
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
                        <input id="phone" type="text" class="input" name="phone" value="{{ $society->phone }}" placeholder="Phone Number" required autofocus>
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
                        <input id="email" type="email" class="input" name="email" value="{{ $society->email}}" placeholder="Email" required autofocus>
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
                        <input id="start" type="date" class="input" name="start" value="{{ $society->start }}"  required autofocus>
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
                        <input id="end" type="date" class="input" name="end" value="{{ $society->end }}" required autofocus>
                    </div>
                    <div class="col-md-6">
                        @if ($errors->has('end'))
                            <span class="help-block">
                                <strong>{{ $errors->first('end') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

             <div class="row {{ $errors->has('body') ? 'has-error' : '' }}">
                    <div class="input1">
                        <label for="body" class="col-md-4 control-label" style="text-align: right;">Body: </label>
                        <textarea class="input" name="body" id="editor" placeholder="Body">{{ $society->body }}</textarea>
                    </div>
                    <div class="col-md-6">
                        @if ($errors->has('body'))
                            <span class="help-block">
                                <strong>{{ $errors->first('body') }}</strong>
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