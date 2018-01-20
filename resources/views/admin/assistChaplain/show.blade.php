@extends('admin.layouts.dashboard')

@section('title', '| Admin | Show | AssistChaplain')


@section('content')
    
<div class="">
  <div style="display: flex;">
      <a href="{{route('assistChaplain.index')}}"><button>Back</button></a>
      <h3 style="margin: 0 auto;">{{ $assistChaplain->first_name }} {{ $assistChaplain->last_name }}'s Profile</h3>
      <a style="padding-right: 20px;" href="{{route('assistChaplain.edit',$assistChaplain->slug) }}"><button>Edit</button></a>
  </div><hr><br>
       
  <div>
    <div class="bioImg"><span><img class="profilePage" src="{{ asset('storage/uploads/assist/'.$assistChaplain->image) }}" alt="{{ $assistChaplain->first_name }} {{ $assistChaplain->last_name }}'s image"></span></div>
    <div class="userDetails">
      <h3><strong>Email: </strong><small>{{ $assistChaplain->email }}</small></h3>
      <h3><strong>Phone Number: </strong><small>{{ $assistChaplain->phone }}</small></h3>
      <!-- <h3><strong>Address: </strong><small>{{ $assistChaplain->street_name }}</small></h3> -->
    </div>
  </div>

</div><!-- /.blog-main -->

@endsection