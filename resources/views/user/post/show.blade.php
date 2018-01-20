@extends('user.layouts.page')

@section('title', '| Show | Post')

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
      <a href="{{route('post')}}"><button>Back</button></a>
      <h1 class="head_margin">{{ $post->title }}</h1>
      Posted {{ $post->created_at->diffForHumans() }}   
    </div>      
    
    <br>
    <div>
     
        <p>{{ $post->body }}</p>         
      
    </div>

  </div>
</div><!-- /.post-main -->

@endsection