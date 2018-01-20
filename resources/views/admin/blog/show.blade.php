@extends('admin.layouts.dashboard')

@section('title', '| Admin | Show | Blog')


@section('content')
    
<div class="">
  <a class="pull-right"  href="{{route('blog.index')}}">Back</a>
  <h1>{{ $blog->title }}</h1>
    
  <div class="">Posted by Admin
    {{ $blog->created_at->diffForHumans() }}   
  </div>
  
  <br><br>

  <div>
    <article>
      <p>{{ $blog->body }}</p>         
    </article>
  </div>

</div><!-- /.blog-main -->

@endsection