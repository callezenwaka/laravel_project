@extends('admin.layouts.dashboard')

@section('title', '| Admin | Show | Post')


@section('content')
    
<div class="">
  <a class="pull-right"  href="{{route('post.index')}}">Back</a>
        <h1>{{ $post->title }}</h1>
        Posted by Admin
        <div class="pull-right">
          {{ $post->created_at->diffForHumans() }}   
        </div>
        
        <br><br>

        <div>
          <article>
            <p>{{ $post->body }}</p>         
          </article>
        </div>

</div><!-- /.blog-main -->

@endsection