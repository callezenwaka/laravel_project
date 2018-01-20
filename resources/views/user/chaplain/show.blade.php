@extends('user.layouts.page')

@section('title', '| Show | Chaplain')

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
    <div class="head">
      <a href="{{ route('chaplain.index_user')}}" class="">Back</a>
      <h3 class="head_margin">{{ $chaplain->title }} {{ $chaplain->first_name }} {{ $chaplain->last_name }}'s Profile</h3>    
    </div>
      <br><hr><br>
    <div>
      <div class="bioImg"><span><img class="profilePage" src="{{ asset('storage/uploads/chaplain/'.$chaplain->image) }}" alt="{{ $chaplain->first_name }} {{ $chaplain->last_name }}'s image"></span><p><strong>Bio: </strong>{{ $chaplain->bio }}</p></div>
      <div class="userDetails">
        <h3><strong>Birthday: </strong><small>{{ $chaplain->d_o_b }}</small></h3>
        <h3><strong>Ordained : </strong><small>{{ $chaplain->ordained }}</small></h3>
        <h3><strong>Email: </strong><small>{{ $chaplain->email }}</small></h3>
        <h3><strong>Phone Number: </strong><small>{{ $chaplain->phone }}</small></h3>
        <h3><strong>Served: </strong><small>{{ $chaplain->start->format('m/d/Y') }}</small> - </h3>
      </div>
    </div>
  </div>
</div><!-- /.blog-main -->

@endsection