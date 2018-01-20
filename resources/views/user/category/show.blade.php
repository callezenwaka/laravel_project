@extends('user.layouts.page')

@section('title', '| Show | Category')

@section('content')
    
<div class="" style="text-align:; width: 100%; padding: 0 15%;">  

  <h1>New Post</h1>
    <hr>
        <h1>{{ $post->title }}</h1>
       <p>Posted by {{ $post->user->first_name }}  {{ $post->user->last_name }} &nbsp{{ $post->created_at->diffForHumans() }}</p> 
        <!-- <br> -->
        <div>
          <article>
            <p>{{ $post->body }}</p>         
          </article>
        </div>
</div><!-- /.post-main -->

@endsection