@extends('user.layouts.page')

@section('title', '| Show | Executive')

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
      <a href="{{ route('executive.index_user')}}" class="">Back</a>
      <h3 class="head_margin">{{ $executive->title }} {{ $executive->first_name }} {{ $executive->last_name }}'s Profile</h3>    
    </div>
      <br><hr><br>
    <div>
      <div class="bioImg">
        <span>
          <img class="profilePage" src="{{ asset('storage/uploads/executive/'.$executive->image) }}" alt="{{ $executive->first_name }} {{ $executive->last_name }}'s image">
        </span>
        <div class="userDetails">
        <h3><strong>portfolio: </strong><small>{{ $executive->portfolio }}</small></h3>
        <h3><strong>Email: </strong><small>{{ $executive->email }}</small></h3>
        <h3><strong>Phone Number: </strong><small>{{ $executive->phone }}</small></h3>
        <h3><strong>Served: </strong><small>{{ $executive->start->format('m/d/Y') }}</small> - <small>{{ $executive->end->format('m/d/Y') }}</small></h3>
        </div>
      </div>
      
    </div>
  </div>    
</div><!-- /.blog-main -->

@endsection