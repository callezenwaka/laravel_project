@extends('admin.layouts.dashboard')

@section('title', '| Admin | Create | Category')

@section('content')

<div>
	<div class="">
      <a href="{{route('category.index')}}">Back</a>
    </div>
       <h1>Create Category</h1>
       
       <hr>

       <form method="POST" action="{{route('category.store')}}" enctype="multipart/form-data">
                {{ csrf_field() }}


	       	<div class="row {{ $errors->has('name') ? 'has-error' : '' }}">
                    <div class="input1">
                        <label for="name" class="col-md-4 control-label" style="text-align: right;">Category Name: </label>
                        <input id="name" type="text" class="input" name="name" value="{{ old('name') }}" placeholder="Category Name" required autofocus>
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
	       	    <button type="submit" class="buttons">Create</button>
	       	</div>

	       	@include('admin.layouts.errors')

       </form>

</div><!-- /.blog-main -->

@endsection