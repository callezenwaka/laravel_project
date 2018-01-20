@extends('admin.layouts.dashboard')

@section('title', '| Admin | Create | Post')

@section('content')

<div>
	<div class="head">
		<a href="{{route('post.index')}}"><button>Back</button></a>
        <h1 class="head_margin">Publish a Post</h1>
  	</div>  
       <hr>

       <form method="POST" action="{{route('post.store')}}" enctype="multipart/form-data">
                {{ csrf_field() }}


	       	<div class="row {{ $errors->has('title') ? 'has-error' : '' }}">
                    <div class="input1">
                        <label for="title" class="col-md-4 control-label" style="text-align: right;">Title: </label>
                        <input id="title" type="text" class="input" name="title" value="{{ old('title') }}" placeholder="Title" required autofocus>
                    </div>
                    <div class="col-md-6">
                        @if ($errors->has('title'))
                            <span class="help-block">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

	       	<div class="row {{ $errors->has('body') ? 'has-error' : '' }}">
                    <div class="input1">
                        <label for="body" class="col-md-4 control-label" style="text-align: right;">Body: </label>
                        <textarea class="input" name="body" id="editor" placeholder="Body">{{ old('body') }}</textarea>
                    </div>
                    <div class="col-md-6">
                        @if ($errors->has('body'))
                            <span class="help-block">
                                <strong>{{ $errors->first('body') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

	       	<div class="row center">
	       	    <button type="submit" class="buttons">Publish</button>
	       	</div>

	       	@include('admin.layouts.errors')

       </form>

</div> 

@endsection