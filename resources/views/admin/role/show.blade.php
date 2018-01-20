@extends('admin.layouts.dashboard')

@section('title', '| Admin | Show | Role')

@section('content')
    
<div>
  <div>
    <div class="row center">
      <a href="{{route('role.index')}}" class="buttons">Back</a>
      <div class="head center"><h1>User Roles</h1></div>
    </div>
        <h1><strong>Role Name: </strong>{{ $role->name }}</h1>
        <h1><strong>Created At: </strong>{{ $role->created_at }}</h1><hr>
  </div>
</div><!-- /.blog-main -->

@endsection