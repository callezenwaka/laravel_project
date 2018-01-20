@extends('user.layouts.page')

@section('title', '| Show | Assistant Chaplain')

@section('header')
<style>
    .header {
        background-color: #ee6e73;
    }
</style>
@endsection

@section('content')
<div class="content top-margin">
  <div class="wrapper">
    <div class="head">
      <a class="" href="{{ route('assistant_chaplain')}}">Back</a>
      <h3 class="head_margin">{{ $assistChaplain->title }} {{ $assistChaplain->first_name }} {{ $assistChaplain->last_name }}'s Profile</h3>    
    </div>
      <br><hr><br>
    <div>
      <div class="bioImg"><span><img class="profilePage" src="{{ asset('storage/uploads/assist/'.$assistChaplain->image) }}" alt="{{ $assistChaplain->first_name }} {{ $assistChaplain->last_name }}'s image"></span><p><strong>Bio: </strong>{{ $assistChaplain->bio }}</p></div>
      <div class="userDetails">
        <h3><strong>Birthday: </strong><small>{{ $assistChaplain->d_o_b }}</small></h3>
        <h3><strong>Ordained : </strong><small>{{ $assistChaplain->ordained }}</small></h3>
        <h3><strong>Email: </strong><small>{{ $assistChaplain->email }}</small></h3>
        <h3><strong>Phone Number: </strong><small>{{ $assistChaplain->phone }}</small></h3>
        <h3><strong>Served: </strong><small>{{ $assistChaplain->start->format('m/d/Y') }}</small> - <small>{{ $assistChaplain->end->format('m/d/Y') }}</small></h3>
      </div>
    </div>
  </div>    
</div><!-- /.blog-main -->

@endsection