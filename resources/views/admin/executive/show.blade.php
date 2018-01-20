@extends('admin.layouts.dashboard')

@section('title', '| Admin | Show | Executive')


@section('content')
    
<div class="">
  <div>
      <h3>{{ $executive->title }} {{ $executive->first_name }} {{ $executive->last_name }}'s Profile</h3>
      <a class="buttons" href="{{route('executive.edit',$executive->slug) }}">Edit User</a>
      <a href="{{route('executive.index')}}">Back</a>
     
  </div>
            <br><hr><br>
       
  <div>
    <div class="bioImg"><span><img class="profilePage" src="{{ asset('storage/uploads/executive/'.$executive->image) }}" alt="{{ $executive->first_name }} {{ $executive->last_name }}'s image"></span></div>
    <div class="userDetails">
      <h3><strong>Portfolio: </strong><small>{{ $executive->portfolio }}</small></h3>
      <h3><strong>Email: </strong><small>{{ $executive->email }}</small></h3>
      <h3><strong>Phone Number: </strong><small>{{ $executive->phone }}</small></h3>
      <!-- <h3><strong>Address: </strong><small>{{ $executive->street_name }}</small></h3> -->
    </div>
  </div>

</div><!-- /.blog-main -->

@endsection