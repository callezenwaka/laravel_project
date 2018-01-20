@extends('admin.layouts.dashboard')

@section('title', '| Admin | Edit | Role')

@section('content')

<div>
	<div>
		<div class="row center">
			<a href="{{route('role.index')}}" class="buttons">Back</a>
			<div class="head center"><h1>Edit Role</h1></div>
		</div>
       
       <hr>

       <form method="POST" action="{{ route('role.update',$role->slug) }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

	       	<div class="row">
	       		<label for="name">Name:</label>
	       		<input type="text" class="input" name="name" id="name" value="{{ $role->name }}" placeholder="Role Name" required="">
	       	</div>

	       	<div class="" style="text-align: center;"><label><strong>Permissions:</strong></label></div>

	       	<div style="display: flex;justify-content: space-around;">
	       		<div style="text-align: left;">
	       			<label for="name"><strong>Posts:</strong></label>
		       		@foreach ($permissions as $permission)
		       			@if ($permission->for == 'post')
		       				<div class="checkbox">
		       				<label><input type="checkbox" name="permission[]" value="{{ $permission->id }}" 
		       					@foreach ($role->permissions as $role_permit)
		       						@if ($role_permit->id == $permission->id)
		       							checked
		       						@endif
		       					@endforeach>{{ $permission->name }}</label>
		       				</div>
		       			@endif
		       		@endforeach
	       		</div>
	       		<div style="text-align: left;">
	       			<label for="name"><strong>Blogs:</strong></label>
		       		@foreach ($permissions as $permission)
		       			@if ($permission->for == 'blog')
		       				<div class="checkbox">
		       				<label><input type="checkbox" name="permission[]" value="{{ $permission->id }}" 
		       					@foreach ($role->permissions as $role_permit)
		       						@if ($role_permit->id == $permission->id)
		       							checked
		       						@endif
		       					@endforeach>{{ $permission->name }}</label>
		       				</div>
		       			@endif
		       		@endforeach
	       		</div>
	       		<div style="text-align: left;">
	       			<label for="name"><strong>Homily:</strong></label>
		       		@foreach ($permissions as $permission)
		       			@if ($permission->for == 'homily')
		       				<div class="checkbox">
		       				<label><input type="checkbox" name="permission[]" value="{{ $permission->id }}"
		       					@foreach ($role->permissions as $role_permit)
		       						@if ($role_permit->id == $permission->id)
		       							checked
		       						@endif
		       					@endforeach>{{ $permission->name }}</label>
		       				</div>
		       			@endif
		       		@endforeach
	       		</div>
	       		<div style="text-align: left;">
	       			<label for="name"><strong>Users:</strong></label>
		       		@foreach ($permissions as $permission)
		       			@if ($permission->for == 'user')
		       				<div class="checkbox">
		       				<label><input type="checkbox" name="permission[]" value="{{ $permission->id }}" 
		       					@foreach ($role->permissions as $role_permit)
		       						@if ($role_permit->id == $permission->id)
		       							checked
		       						@endif
		       					@endforeach>{{ $permission->name }}</label>
		       				</div>
		       			@endif
		       		@endforeach
	       		</div>
	       		<div style="text-align: left;">
	       			<label for="name"><strong>Other:</strong></label>
		       		@foreach ($permissions as $permission)
		       			@if ($permission->for == 'other')
		       				<div class="checkbox">
		       				<label><input type="checkbox" name="permission[]" value="{{ $permission->id }}" 
		       					@foreach ($role->permissions as $role_permit)
		       						@if ($role_permit->id == $permission->id)
		       							checked
		       						@endif
		       					@endforeach>{{ $permission->name }}</label>
		       				</div>
		       			@endif
		       		@endforeach
	       		</div>
	       	</div>

	       	<div class="row center">
	       	    <button type="submit" class="buttons">Update Role</button>
	       	</div>

	       	@include('admin.layouts.errors')

       </form>
    </div>
</div><!-- /.blog-main -->

@endsection