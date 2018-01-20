@extends('user.layouts.view')

@section('title', '| Update Profile')

@section('content')

<div>
	<div>
		<div class="">
			<a href="/admin/posts"><button type="submit" class="btn btn-primary">Back</button></a>
		</div>
  	</div>  

       <h1>Publish a Post</h1>
       
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
				<label for="first_name">First Name:</label>
				<input type="text" class="form-control" name="first_name" id="deparfirst_nametment" placeholder="First Name" required="">
			</div>
			<div class="form-group">
				<label for="last_name">Last Name:</label>
				<input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" required="">
	       	</div>
	       	<div class="form-group">
	       		<label for="gender">Title:</label>
				<select name="gender" id="gender">
					<option value="Female">Female</option>	
					<option value="Male">Male</option>
				</select>
	       	</div>
			<div class="form-group">
	       		<label for="level">Level:</label>
				   <select name="level" id="level">
					   <option value="100">100</option>
					   <option value="200">200</option>
					   <option value="300">300</option>
					   <option value="400">400</option>
					   <option value="500">500</option>
					   <option value="600">600</option>
				   </select>
	       	</div>
			<div class="form-group">
	       		<label for="department">Department:</label>
	       		<input type="text" class="form-control" name="department" id="department" placeholder="Department" required="">
	       	</div>
			<div class="form-group">
	       		<label for="faculty">Title:</label>
	       		<select name="faculty" id="faculty">
					   <option value="Agriculture">Agriculture</option>
					   <option value="Arts">Arts</option>
					   <option value="Comm. &amp; Information Science">Comm. &amp; Information Science</option>
					   <option value="Basic Medical Sciences">Basic Medical Sciences</option>
					   <option value="Clinical Sciences">Clinical Sciences</option>
					   <option value="Education">Education</option>
					   <option value="Engineering and Technology">Engineering and Technology</option>
					   <option value="Environmental Science">Environmental Science</option>
					   <option value="Life Science">Life Science</option>
					   <option value="Law">Law</option>
					   <option value="Management Sciences">Management Sciences</option>
					   <option value="Pharmaceutical Science">Pharmaceutical Science</option>
					   <option value="Physical Science">Physical Science</option>
					   <option value="Social Sciences">Social Sciences</option>
					   <option value="Veterinary Medicine">Veterinary Medicine</option>
				   </select>
	       	</div>
			   <div class="form-group">
	       		<label for="street_name">Address:</label>
	       		<input type="text" class="form-control" name="street_name" id="street_name" placeholder="Stree Name" required="">
	       	</div>
			<div class="form-group">
	       		<label for="city">City:</label>
	       		<input type="text" class="form-control" name="city" id="city" placeholder="City" required="">
	       	</div>
			<div class="form-group">
	       		<label for="state">State:</label>
	       		<input type="text" class="form-control" name="state" id="state" placeholder="State" required="">
	       	</div>
			<div class="form-group">
	       		<label for="country">Country:</label>
	       		<input type="text" class="form-control" name="country" id="country" placeholder="Country" required="">
	       	</div>
			<div class="form-group">
	       		<label for="d_o_b">Date of Birth:</label>
	       		<input type="date" class="form-control" name="d_o_b" id="d_o_b" placeholder="Date of Birth" required="">
	       	</div>
			<div class="form-group">
	       		<label for="phone">Phone Number:</label>
	       		<input type="text" class="form-control" name="phone" id="phone" placeholder="Phone Number" required="">
	       	</div>
			<div class="form-group">
	       		<label for="username">Username:</label>
	       		<input type="text" class="form-control" name="username" id="username" placeholder="Username" required="">
			</div>
			<div class="form-group">
	       		<label for="email">Email:</label>
	       		<input type="text" class="form-control" name="email" id="email" placeholder="New Email" required="">
	       	</div>

	       	<div class="form-group">	       		
	       		<label for="bio">Bio:</label>
	       		<textarea class="form-control my-editor" name="bio" id="bio" placeholder="About you" required=""></textarea>	
	       	</div>

	       	<div class="form-group">
	       	    <button type="submit" class="btn btn-primary">Update</button>
	       	</div>

	       	@include('layouts.errors')

       </form>

</div><!-- /.blog-main -->

@endsection