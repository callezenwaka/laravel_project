@extends('user.layouts.page')

@section('title', '| Show | Blog')

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
      <a class="" href="{{ route('blog_user')}}"><button>Back</button></a>
      <h1 class="head_margin">{{ $blog->title }}</h1>
    </div>      
    Posted {{ $blog->created_at->diffForHumans() }}   
    <br>
    <div>
      <article>
        <p>{{ $blog->body }}</p>         
      </article>
    </div>
  </div>
</div><!-- /.blog-main -->

@endsection