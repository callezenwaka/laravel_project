@extends('user.layouts.page')

@section('title', '| Blog')

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
        <a class="" href="{{ route('home')}}"><button>Back</button></a>
        <h3 class="head_margin">Blog Page</h3>
      </div>       
        <hr>
        @foreach($blogs as $blog)
          <div>
            <h2><a href="{{ route('blog.show_user',$blog->slug)}}">{{ $blog->title }}</a></h2>
            <div>
              <p>
                Posted <strong>{{ $blog->created_at->diffForHumans() }}</strong>
              <div>
                {{ substr(strip_tags($blog->body), 0, 100) }}{{ strlen(strip_tags($blog->body)) > 100 ? "..." : "" }}
                <a href="{{ route('blog.show_user',$blog->slug)}}"><i class="fa fa-external-link-square" aria-hidden="true"></i></a>
              </div>
              </p>
            </div>
          </div>
        @endforeach
        <a class="" href="{{ route('blog.index_user')}}">More</a>
  </div>
</div><!-- /.blog-main -->

@endsection