@extends('user.layouts.page')

@section('title', '| Assistant Chaplains')

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
      <a class="" href="{{ route('assistant_chaplain')}}">Back</a>
      <h1 class="head_margin">Assistant Chaplain Page</h1>
    </div>      
    <hr>
      @foreach($assistChaplains as $assistChaplain) 
        <div>
          <p>{{ $assistChaplain->title }} <a href="{{ route('assistant_chaplain.show_user',$assistChaplain->slug)}}">{{ $assistChaplain->first_name }} {{ $assistChaplain->last_name }}</a> {{ $assistChaplain->start->format('m/d/Y') }} - {{ $assistChaplain->end->format('m/d/Y') }}</p><hr>
        </div><hr>
      @endforeach
      <hr>
  </div>
</div><!-- /.blog-main -->

@endsection