@extends('user.layouts.page')

@section('title', '| Category')

@section('content')
    
@foreach($posts as $post)
    
            <div>
              <h2><a href="/posts/{{$post->slug}}" target="_blank">{{ $post->title }}</a></h2>
            </div>
              Posted by {{ $post->user->first_name }}  {{ $post->user->last_name }}
              <strong>{{ $post->created_at->diffForHumans() }}</strong>
              <div>
                {{ substr(strip_tags($post->body), 0, 100) }}{{ strlen(strip_tags($post->body)) > 100 ? "..." : "" }}
                <a href="/posts/{{$post->slug}}">Read More</a>
              </div>
              <br>
          @endforeach

@endsection

<!-- <div>  

  <div>
    <div class="main">
      <h1>News</h1>
    </div>      
    <hr>
      <div>

          @foreach($posts as $post)
    
            <div>
              <h2><a href="/posts/{{$post->id}}">{{ $post->title }}</a></h2>
            </div>
              Posted by Admin  
              <strong>{{ $post->created_at->diffForHumans() }}</strong>
              <div>
                {{ substr(strip_tags($post->body), 0, 100) }}{{ strlen(strip_tags($post->body)) > 100 ? "..." : "" }}
                <a href="/posts/{{$post->id}}">Read More</a>
              </div>
              <br>
          @endforeach

      </div> 
    
  </div>

</div>/.post-main -->