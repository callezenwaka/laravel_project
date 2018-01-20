@extends('user.layouts.page')

@section('title', '| Society')

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
    <div class="head center">
      <h1>Religious Group Page</h1>
    </div>      
    <hr>
      @foreach($societies as $society) 
        <div>
          <div><a href="{{ route('society.show_user',$society->slug)}}">{{ $society->name }} <i class="fa fa-external-link-square" aria-hidden="true"></i></a></div><hr>
          <div>
            {{ substr(strip_tags($society->body), 0, 100) }}{{ strlen(strip_tags($society->body)) > 100 ? "..." : "" }}
            <a href="{{ route('society.show_user',$society->slug)}}"></a>
          </div>
        </div><hr>
      @endforeach
      <a href="{{ route('society.index_user')}}"><button>More</button></a>
      <hr>
  </div>
</div><!-- /.blog-main -->

@endsection