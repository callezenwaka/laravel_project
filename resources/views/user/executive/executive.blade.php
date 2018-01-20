@extends('user.layouts.page')

@section('title', '| Executive')

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
      <h3>Executive Page</h3>
  </div>      
    <hr>
      
          @foreach($executives as $executive)
            <div>
              <p>{{ $executive->title }} <a href="{{ route('executive.show_user',$executive->slug)}}">{{ $executive->first_name }} {{ $executive->last_name }} <i class="fa fa-external-link-square" aria-hidden="true"></i></a></p> <p>{{ $executive->portfolio }}</p> <p>{{ $executive->start->format('m/d/Y') }} - {{ $executive->end->format('m/d/Y') }}<hr></p>
            </div><hr>
           @endforeach
           <a href="{{ route('executive.index_user')}}">More</a>
  </div>
</div><!-- /.blog-main -->

@endsection