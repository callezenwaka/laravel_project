@extends('admin.layouts.dashboard')

@section('title', '| Admin | Create | Role')

@section('content')

<div>
	<div>
		<div class="row center">
			<a href="{{route('role.index')}}" class="buttons">Back</a>
			<div class="head center"><h1>Add Role</h1></div>
		</div>

	       
	       <hr>

	    <form method="POST" action="{{route('role.store')}}" enctype="multipart/form-data">
	                {{ csrf_field() }}

	       	<div class="row">
	       		<label for="name">Role Name:</label>
	       		<input type="text" class="input" name="name" id="name" value="{{ old('name') }}" placeholder="Role Name" required="">
	       	</div>
	       	<div class="row" style="text-align: center;"><label><strong>Permissions:</strong></label></div>

	       	<div style="display: flex;justify-content: space-around;">
	       		<div style="text-align: left;">
	       			<label for="name"><strong>Posts:</strong></label>
		       		@foreach ($permissions as $permission)
		       			@if ($permission->for == 'post')
		       				<div class="checkbox" style="text-align: left;">
		       				<label><input type="checkbox" name="permission[]" value="{{ $permission->id }}">{{ $permission->name }}</label>
		       				</div>
		       			@endif
		       		@endforeach
	       		</div>
	       		<div style="text-align: left;">
	       			<label for="name"><strong>Blogs:</strong></label>
		       		@foreach ($permissions as $permission)
		       			@if ($permission->for == 'blog')
		       				<div class="checkbox">
		       				<label><input type="checkbox" name="permission[]" value="{{ $permission->id }}">{{ $permission->name }}</label>
		       				</div>
		       			@endif
		       		@endforeach
	       		</div>
	       		<div style="text-align: left;">
	       			<label for="name"><strong>Homily:</strong></label>
		       		@foreach ($permissions as $permission)
		       			@if ($permission->for == 'homily')
		       				<div class="checkbox">
		       				<label><input type="checkbox" name="permission[]" value="{{ $permission->id }}">{{ $permission->name }}</label>
		       				</div>
		       			@endif
		       		@endforeach
	       		</div>
	       		<div style="text-align: left;">
	       			<label for="name"><strong>Users:</strong></label>
		       		@foreach ($permissions as $permission)
		       			@if ($permission->for == 'user')
		       				<div class="checkbox">
		       				<label><input type="checkbox" name="permission[]" value="{{ $permission->id }}">{{ $permission->name }}</label>
		       				</div>
		       			@endif
		       		@endforeach
	       		</div>
	       		<div style="text-align: left;">
	       			<label for="name"><strong>Other:</strong></label>
		       		@foreach ($permissions as $permission)
		       			@if ($permission->for == 'other')
		       				<div class="checkbox">
		       				<label><input type="checkbox" name="permission[]" value="{{ $permission->id }}">{{ $permission->name }}</label>
		       				</div>
		       			@endif
		       		@endforeach
	       		</div>
	       	</div>

	       	<div class="row center">
	       	    <button type="submit" class="buttons">create Role</button>
	       	</div>

	       	@include('admin.layouts.errors')

	    </form>
	</div>
</div><!-- /.blog-main -->

@endsection