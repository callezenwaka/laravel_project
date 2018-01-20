@extends('user.layouts.page')

@section('title', '| Post')

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
      <h3>Post Page</h3>
  </div>       
    <hr>
    @foreach($posts as $post)
      <div class="center">
        <h2><a href="{{ route('post.show_user',$post->slug)}}">{{ $post->title }}</a></h2>
        <div>
          <p>
            Posted <strong>{{ $post->created_at->diffForHumans() }}</strong>
          <div>
            {{ substr(strip_tags($post->body), 0, 100) }}{{ strlen(strip_tags($post->body)) > 100 ? "..." : "" }}
            <a href="{{ route('post.show_user',$post->slug)}}"><i class="fa fa-external-link-square" aria-hidden="true"></i></a>
          </div>
          </p>
        </div>
      </div>
    @endforeach
    <div class="center"><a href="{{route('post.index_user')}}">View More</a></div>
  </div>
</div><!-- /.post-main -->

@endsection