@extends('user.layouts.page')

@section('title', '| Categories')


@section('content')
    
<div>  

  <div>
    <div class="">
      <h1>Main Blog Page</h1>
    </div>      
    <hr>
      
      <!--<div class="row main">-->

          @foreach($blogs as $blog)
    
            <div class="card col-sm-6">
              <div>
                <h2><a href="/blogs/{{$blog->id}}">{{ $blog->title }}</a></h2>
                <div class="card-block">
                  <p class="card-text">
                    Posted by Admin  
              <strong>{{ $blog->created_at->diffForHumans() }}</strong>
              <div>
                {{ substr(strip_tags($blog->body), 0, 100) }}{{ strlen(strip_tags($blog->body)) > 100 ? "..." : "" }}
                <a href="/blogs/{{$blog->id}}">Read More</a>
              </div>
                  </p>
                </div>
              </div>
            </div>
          @endforeach
        
      <!--</div>--> <hr>
    
  </div>

</div><!-- /.blog-main -->

@endsection