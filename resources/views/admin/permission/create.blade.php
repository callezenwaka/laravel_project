@extends('admin.layouts.dashboard')

@section('title', '| Admin | Create | Permission')

@section('content')

<div>
	<div>
		<div class="row center">
			<a href="{{route('permission.index')}}" class="buttons">Back</a>
			<div class="head center"><h1>Add Permission</h1></div>
		</div>

	       
	       <hr>

	    <form method="POST" action="{{route('permission.store')}}" enctype="multipart/form-data">
	                {{ csrf_field() }}

	       	<div class="row">
	       		<label for="name">Name:</label>
	       		<input type="text" class="input" name="name" id="name" value="{{ old('name') }}" placeholder="e.g Table Create" required="" autofocus="">
	       	</div>

	       	<div class="row">
	       		<label for="for">Permission For:</label>
	       		<select name="for" id="for" class="input">
	       			<option selected disabled>Select permission for</option>
	       			<option value="user">User</option>
	       			<option value="post">Post</option>
	       			<option value="homily">Homily</option>
	       			<option value="blog">Blog</option>
	       			<option value="other">Others</option>
	       		</select>
	       	</div>

	       	<div class="row center">
	       	    <button type="submit" class="buttons">create permission</button>
	       	</div>

	       	@include('admin.layouts.errors')

	    </form>
	</div>
</div><!-- /.blog-main -->

@endsection