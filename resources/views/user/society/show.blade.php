@extends('user.layouts.page')

@section('title', '| Show | Society')

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
    <a href="{{ route('society')}} buttons"><button>Back</button></a>
    <h3 class="head_margin">{{ $society->name }}'s Profile Page</h3>    
  </div>
    <br><hr><br>
  <div>
    <div class="bioImg"><span><img class="profilePage" src="{{ asset('storage/uploads/avatars/'.$society->logo) }}" alt="{{ ${{ $society->name }}->logo }}'s image"></span><p><strong>About {{ $society->name }}: </strong>{{ $society->body }}</p></div>
    <div class="userDetails">
      <h3><strong>Email: </strong><small>{{ $society->email }}</small></h3>
      <h3><strong>Phone Number: </strong><small>{{ $society->phone }}</small></h3>
      <h3><strong>Served: </strong><small>{{ $society->start->format('m/d/Y') }}</small> - <small>{{ $society->end->format('m/d/Y') }}</small></h3>
    </div>
  </div>    
</div><!-- /.blog-main -->

@endsection