@extends('layouts.view')


@section('content')

<div>
  </div>  

       <h1>Edit an image</h1>
       
       <hr>

       @if(Session::has('flash_message'))
		    <div class="alert alert-success">
		        {{ Session::get('flash_message') }}
		    </div>
		@endif

       <form method="POST" action="/users/{{Auth::user()->id}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

	       	<div class="form-group">
	       		<label for="image">Image:</label>
	       		<input type="file" class="form-control" name="image" id="image" required="">
	       	</div>

	       	<div class="form-group">
	       	    <button type="submit" class="btn btn-primary">Update</button>
	       	</div>

	       	@include('layouts.errors')

       </form>

</div><!-- /.blog-main -->

@endsection