@extends('admin.layouts.dashboard')

@section('title', '| Admin | Show | Homily')


@section('content')
    
<div class="main">  
  <div>
   <h1 >HOMILY</h1>
   <a class="pull-right"  href="{{route('homily.index')}}">Back</a>
  </div>
        <h1>{{ $homily->title }}</h1>
        Posted by Admin
        <div class="pull-right">
          {{ $homily->created_at->diffForHumans() }}   
        </div>
        
        <br><br>

        <div>
          <article>
            <p>{{ $homily->body }}</p>         
          </article>
        </div>

</div><!-- /.blog-main -->

@endsection