@extends('user.layouts.page')

@section('title', '| Edit Profile')

@section('header')
<style>
    .header {
        background-color: #ee6e73;
    }
</style>
@endsection

@section('content')

<div class="content top-margin"> 
	<div class="wrapper">
	<div class="center">
		<h3>Edit Profile</h3>
	   <a class="buttons" href="{{route('user.show_user',Auth::user()->slug)}}">Back To Profile Page</a>
       
       <hr>
		<h3>Change Profile Picture</h3>
	</div>
		<form class="center" method="POST" action="{{route('user.image_update',Auth::user()->slug)}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

	       	<div class="form-group">
	       		<label for="image">Image:</label>
	       		<input type="file" class="form-control" name="image" id="image">
	       	</div>

	       	<div class="form-group">
	       	    <button type="submit" class="buttons">Update</button>
	       	</div>

	       	@include('user.layouts.errors')

       </form><br/>

	   <hr>
		<h3 class="center">Update Profile Details</h3>
       <form method="POST" action="{{route('user.update_user',Auth::user()->slug)}}" enctype="multipart/form-data">
                {{ csrf_field() }}
				{{ method_field('PUT') }}
			<div class="row">
				<div class="input1">
					<label class="label" for="first_name">First Name:</label>
					<input type="text" class="input" name="first_name" id="first_name" value="{{ Auth::user()->first_name }}" required="">
				</div>
				<!-- <input type="text" class="form-control" name="last_name" id="last_name" value="{{ Auth::user()->last_name }}" required=""> -->
			</div>
			<div class="row">
				<div class="input1">
					<label class="label" for="last_name">Last Name:</label>
					<input type="text" class="input" name="last_name" id="last_name" value="{{ Auth::user()->last_name }}" required="">
				</div>
	       	</div>
	       	<div class="row">
	       		<div class="input1">
	       			<label class="label" for="gender">Gender: </label>
					<select class="input" name="gender" id="gender" value="{{ Auth::user()->gender }}">
						<option value="Female">Female</option>	
						<option value="Male">Male</option>
					</select>
	       		</div>
	       	</div>
			<div class="row">
	       		<div class="input1">
	       			<label class="label" for="level">Level: </label>
				   	<select class="input" name="level" id="level" value="{{ Auth::user()->level }}">
					   <option value="100">100</option>
					   <option value="200">200</option>
					   <option value="300">300</option>
					   <option value="400">400</option>
					   <option value="500">500</option>
					   <option value="600">600</option>
				   	</select>
	       		</div>
	       	</div>
			<div class="row">
	       		<div class="input1">
	       			<label class="label" for="department">Department:</label>
	       			<input type="text" class="input" name="department" id="department" value="{{ Auth::user()->department }}" required="">
	       		</div>
	       	</div>
			<div class="row">
				<div class="input1">
		       		<label class="label" for="faculty">Faculty:</label>
		       		<select class="input" name="faculty" id="faculty" value="{{ Auth::user()->faculty }}">
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
	       	</div>
			<div class="row">
				<div class="input1">
		       		<label class="label" for="street_name">Address:</label>
		       		<input type="text" class="input" name="street_name" id="street_name" value="{{ Auth::user()->street_name }}" required="">
		       	</div>
	       	</div>
			<div class="row">
				<div class="input1">
		       		<label class="label" for="city">City:</label>
		       		<input type="text" class="input" name="city" id="city" value="{{ Auth::user()->city }}" required="">
		       	</div>
	       	</div>
			<div class="row">
				<div class="input1">
		       		<label class="label" for="state">State:</label>
		       		<input type="text" class="input" name="state" id="state" value="{{ Auth::user()->state }}" required="">
		       	</div>
	       	</div>
			<div class="row">
				<div class="input1">
		       		<label class="label" for="country">Country:</label>
		       		<input type="text" class="input" name="country" id="country" value="{{ Auth::user()->country }}" required="">
		       	</div>
	       	</div>
			<div class="row">
				<div class="input1">
		       		<label class="label" for="d_o_b">Date of Birth:</label>
		       		<input type="date" class="input" name="d_o_b" id="d_o_b" value="{{ Auth::user()->d_o_b }}" required="">
		       	</div>
	       	</div>
			<div class="row">
				<div class="input1">
		       		<label class="label" for="phone">Phone Number:</label>
		       		<input type="text" class="input" name="phone" id="phone" value="{{ Auth::user()->phone }}" required="">
		       	</div>
	       	</div>
			<div class="row">
				<div class="input1">
		       		<label class="label" for="username">Username:</label>
		       		<input type="text" class="input" name="username" id="username" value="{{ Auth::user()->username }}" required="">
		       	</div>
			</div>
			<div class="row">
				<div class="input1">
		       		<label class="label" for="email">Email:</label>
		       		<input type="text" class="input" name="email" id="email" value="{{ Auth::user()->email }}" required="">
		       	</div>
	       	</div>

	       	<div class="row">
	       		<div class="input1">	       		
		       		<label class="label" for="bio">Bio:</label>
		       		<textarea class="input" name="bio" id="">{{ Auth::user()->bio }}</textarea>	
		       	</div>
	       	</div>

	       	<div class="row center">
	       	    <button type="submit" class="buttons">Update</button>
	       	</div>

	       	@include('user.layouts.errors')

       </form>
    </div>
</div><!-- /.blog-main -->

@endsection