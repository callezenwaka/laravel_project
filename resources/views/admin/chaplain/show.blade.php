@extends('admin.layouts.dashboard')

@section('title', '| Admin | Show | Chaplain')


@section('content')
    
<div class="main">  
  <button><a class="" href="{{route('chaplain.index')}}">Back</a></button>
   <div>
      <h3>{{ $chaplain->title }} {{ $chaplain->first_name }} {{ $chaplain->last_name }}'s Profile</h3>
      <a class="" href="{{route('chaplain.edit',$chaplain->slug) }}"><button>Edit User</button></a>
      <a href="{{route('chaplain.index')}}"><button>Back</button></a>
      
  </div>
            <br><hr><br>
       
  <div>
    <div class="bioImg"><span><img class="profilePage" src="{{ asset('storage/uploads/chaplain/'.$chaplain->image) }}" alt="{{ $chaplain->first_name }} {{ $chaplain->last_name }}'s image"></span><p style="padding: 0 10px;"><strong>Bio: </strong>{{ $chaplain->bio }}</p></div>
    <div class="userDetails">
      <h3><strong>Priestly Anniversary: </strong><small>{{ $chaplain->ordained }}</small></h3>
      <h3><strong>Birthday: </strong><small>{{ $chaplain->d_o_b }}</small></h3>
      <h3><strong>Email: </strong><small>{{ $chaplain->email }}</small></h3>
      <h3><strong>Phone Number: </strong><small>{{ $chaplain->phone }}</small></h3>
      <!-- <h3><strong>Address: </strong><small>{{ $chaplain->street_name }}</small></h3> -->
    </div>
  </div>

</div><!-- /.blog-main -->

@endsection