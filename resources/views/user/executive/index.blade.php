@extends('user.layouts.page')

@section('title', '| Executives')

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
        <h1>Executive Page</h1>
      </div>      
      <hr>
      <ul style="list-style-type:none;text-align: center;">
        @foreach($past_excos as $excos)
          <li>
             <a href="/executive/?year={{ $excos['year'] }}">Executives {{ $excos['year'] }}</a>
          </li>
          <hr>
        @endforeach
      </ul>
      <hr>
  </div>
</div><!-- /.blog-main -->

@endsection