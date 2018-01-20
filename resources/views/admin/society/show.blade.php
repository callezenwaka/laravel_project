@extends('admin.layouts.dashboard')

@section('title', '| Admin | Show | Society')

@section('content')
    
<div class="">
  <div style="display: flex;">
    <h3 style="margin: 0 auto;">{{ $society->name }}'s Profile</h3>
    <a style="padding-right: 20px;" href="{{route('society.index')}}">Back</a>
  </div><hr><br>
       
  <div>
    <div class="bioImg"><span><img class="profilePage" src="{{ asset('storage/uploads/avatars/'.$society->image) }}" alt="{{ $society->name }}'s logo"></span><p style="padding: 0 10px;"><strong>Bio: </strong>{{ $society->bio }}</p></div>
    <div class="userDetails">
      <h3><strong>Email: </strong><small>{{ $society->email }}</small></h3>
      <h3><strong>Phone Number: </strong><small>{{ $society->phone }}</small></h3>
      <!-- <h3><strong>Address: </strong><small>{{ $society->street_name }}</small></h3> -->
    </div>
  </div>

</div><!-- /.blog-main -->

@endsection