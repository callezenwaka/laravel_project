@extends('admin.layouts.dashboard')

@section('title', '| Admin | Create | Tag')

@section('content')

<div>
	<div class="">
      <a href="{{route('tag.index')}}">Back</a>
    </div>
       <h1>Create Tag</h1>
       
       <hr>

       <form method="POST" action="{{route('tag.store')}}" enctype="multipart/form-data">
                {{ csrf_field() }}


	       	<div class="row {{ $errors->has('name') ? 'has-error' : '' }}">
                    <div class="input1">
                        <label for="name" class="col-md-4 control-label" style="text-align: right;">Tag Name: </label>
                        <input id="name" type="text" class="input" name="name" value="{{ old('name') }}" placeholder="Tag Name" required autofocus>
                    </div>
                    <div class="col-md-6">
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

	       	<div class="row">
	       	    <button type="submit" class="buttons">Create Tag</button>
	       	</div>

	       	@include('admin.layouts.errors')

       </form>

</div><!-- /.blog-main -->

@endsection