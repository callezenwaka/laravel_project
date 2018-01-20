@extends('admin.layouts.dashboard')

@section('title', '| Admin | Edit | Category')


@section('content')

<div>
	<div class="">
      <a href="{{route('category.index')}}">Back</a>
    </div>
       <h1>Edit Category</h1>
       
       <hr>

       <form method="POST" action="{{route('category.update',$category->slug)}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

	       	<div class="row {{ $errors->has('name') ? 'has-error' : '' }}">
                    <div class="input1">
                        <label for="name" class="col-md-4 control-label" style="text-align: right;">Category Name: </label>
                        <input id="name" type="text" class="input" name="name" value="{{ $category->name') }}" placeholder="Category Name" required autofocus>
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
	       	    <button type="submit" class="buttons">Upddate Category</button>
	       	</div>

	       	@include('admin.layouts.errors')

       </form>

</div><!-- /.blog-main -->

@endsection