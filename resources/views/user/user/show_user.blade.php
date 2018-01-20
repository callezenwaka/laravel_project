@extends('user.layouts.page')

@section('title', '| Profile')

@section('header')
<style>
    .header {
        background-color: #ee6e73;
    }
</style>
@endsection

@section('content')
<div class="content top-margin">
    <div class="wrapper center"> 
      @include('user.includes.messages')
      <div class="head">
        <a class="" href="{{route('home')}}"><button>Back</button></a>
        <h3 class="head_margin">{{ ucfirst($user->first_name) }} {{ ucfirst($user->last_name) }}'s Profile</h3>
        <a class="" href="{{route('user.edit_user',Auth::user()->slug)}}">Edit Profile</a>
      </div>
        <br><hr><br>
      <div>
            <!-- <h3><strong>Url: </strong></h3><p>{{ $user->slug }} </p> /uploads/avatars/{{ $user->image }}Storage::url('file1.jpg'); <img src="{{ asset($user->test )}}" width="" alt="">-->
            <div class="bioImg"><span><img class="profilePage" src="{{ asset('storage/uploads/avatars/'.$user->image) }}" alt="{{ $user->first_name }} {{ $user->last_name }}'s image"></span><p style="padding: 0 10px;"><strong>Bio: </strong>{{ $user->bio }}</p></div>
            <div class="userDetails">
              <h3><strong>Email: </strong><small>{{ $user->email }}</small></h3>&nbsp&nbsp
              <h3><strong>Phone Number: </strong><small>{{ $user->phone }}</small></h3>&nbsp&nbsp
              <h3><strong>Level: </strong><small>{{ $user->level }}</small></h3>&nbsp&nbsp
              <h3><strong>Department: </strong><small>{{ $user->department }}</small></h3>&nbsp&nbsp
              <h3><strong>Faculty: </strong><small>{{ $user->faculty }}</small></h3>&nbsp&nbsp
              <h3><strong>Gender: </strong><small>{{ $user->gender }}</small></h3>&nbsp&nbsp
              <h3><strong>Birthday: </strong><small>{{ $user->d_o_b }}</small></h3>&nbsp&nbsp
              <h3><strong>State </strong><small>{{ $user->state }}</small></h3>&nbsp&nbsp
              <h3><strong>Country: </strong><small>{{ $user->country }}</small></h3>&nbsp&nbsp
              <h3><strong>Address: </strong><small>{{ $user->street_name }}</small></h3>&nbsp&nbsp
            </div>
      </div>
    </div>    
</div><!-- /.post-main -->

@endsection