@extends('admin.layouts.dashboard')

@section('title', '| Admin | Edit | Post')


@section('content')

<div>
    <div class="">
      <a href="{{route('post.index')}}">Back</a>
    </div>

       <h1>Edit Post</h1>
       
       <hr>

       <form method="POST" action="{{route('post.update',$post->slug)}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

	       	<div class="row {{ $errors->has('title') ? 'has-error' : '' }}">
                    <div class="input1">
                        <label for="title" class="col-md-4 control-label" style="text-align: right;">Title: </label>
                        <input id="title" type="text" class="input" name="title" value="{{ $post->title }}" placeholder="Title" required autofocus>
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
                        <textarea class="input" name="body" id="editor" placeholder="Body">{{ $post->body }}</textarea>
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
              	<button type="submit" class="buttons">Create</button>
          	</div>

	       	@include('admin.layouts.errors')

       </form>

</div><!-- /.blog-main -->

@endsection