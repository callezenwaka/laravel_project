@extends('user.layouts.page')

@section('title', '| Chaplain')

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
      <h1>Chaplain Page</h1>
    </div>      
    <hr>
      @foreach($chaplains as $chaplain) 
        <div>
          <p>{{ $chaplain->title }} <a href="{{ route('chaplain.show_user',$chaplain->slug)}}">{{ $chaplain->first_name }} {{ $chaplain->last_name }}</a> {{ $chaplain->start->format('m/d/Y') }} - {{ $chaplain->end->format('m/d/Y') }}</p><hr>
        </div><hr>
      @endforeach
  </div>
</div><!-- /.blog-main -->

@endsection