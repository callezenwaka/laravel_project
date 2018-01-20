@extends('admin.layouts.dashboard')

@section('title', '| Admin | Edit | Blog')


@section('content')
    
<div>

   <div class="">
      <a href="{{route('blog.index')}}">Back</a>
    </div>
       <h1>Edit Blog</h1>
       
       <hr>

       <form method="POST" action="{{route('blog.update',$blog->slug)}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

          <div class="row {{ $errors->has('title') ? 'has-error' : '' }}">
                    <div class="input1">
                        <label for="title" class="col-md-4 control-label" style="text-align: right;">Title: </label>
                        <input id="title" type="text" class="input" name="title" value="{{ $blog->title }}" placeholder="Title" required autofocus>
                    </div>
                    <div class="col-md-6">
                        @if ($errors->has('title'))
                            <span class="help-block">
                                <strong>{{ $errors->first('title') }}</strong>
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

                <div class="row {{ $errors->has('body') ? 'has-error' : '' }}">
                    <div class="input1">
                        <label for="body" class="col-md-4 control-label" style="text-align: right;">Body: </label>
                        <textarea class="input" name="body" id="editor" placeholder="Body">{{ $blog->body }}</textarea>
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