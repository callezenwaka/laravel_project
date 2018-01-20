@extends('admin.layouts.dashboard')

@section('title', '| Admin | Show | Admins')


@section('content')
    
<div class="content top-margin">  

  <div style="display: flex;">
      <a href="{{route('admin.index')}}"><button>Back</button></a>
      <h3 style="margin: 0 auto;">{{ $user->first_name }} {{ $user->last_name }}'s Profile</h3>
      <a style="padding-right: 20px;" href="{{route('admin.edit',$user->slug) }}"><button>Edit</button></a>
  </div>
  <hr><br>
       
  <div>
  <!-- <h3><strong>Url: </strong></h3><p>{{ $user->slug }} </p> /uploads/avatars/{{ $user->image }}Storage::url('file1.jpg'); <img src="{{ asset($user->test )}}" width="" alt="">-->
    <div class="bioImg"><span><img class="profilePage" src="{{ asset('storage/uploads/admins/'.$user->image) }}" alt="{{ $user->first_name }} {{ $user->last_name }}'s image"></span></div>
    <div class="userDetails">
      <h3><strong>Email: </strong><small>{{ $user->email }}</small></h3>
      <h3><strong>Phone Number: </strong><small>{{ $user->phone }}</small></h3>
      <!-- <h3><strong>Address: </strong><small>{{ $user->street_name }}</small></h3> -->
    </div>
  </div>

</div><!-- /.blog-main -->

@endsection