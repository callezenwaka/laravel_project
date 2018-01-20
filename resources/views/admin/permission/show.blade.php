@extends('admin.layouts.dashboard')

@section('title', '| Admin | Show | Permission')

@section('content')
    
<div>
  <div>
    <div class="row center">
      <a href="{{route('permission.index')}}" class="buttons">Back</a>
      <div class="head center"><h1>User Permission</h1></div>
    </div>
        <h1><strong>Permission Name: </strong>{{ $permission->name }}</h1>
        <h1><strong>Created At: </strong>{{ $permission->created_at }}</h1><hr>
  </div>
</div><!-- /.blog-main -->

@endsection