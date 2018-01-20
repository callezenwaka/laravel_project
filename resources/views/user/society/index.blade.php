@extends('user.layouts.page')

@section('title', '| Societies')

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
      <h3>Religious Group Page</h3>
    </div>      
    <hr>
      <ul style="list-style-type:none;text-align: center;">
        @foreach($past_orgs as $orgs)
          <li>
             <a href="/society/?year={{ $orgs['year'] }}">Religious Groups {{ $orgs['year'] }}</a>
          </li>
          <hr>
        @endforeach
      </ul>
      <hr>
  </div>
</div><!-- /.blog-main -->

@endsection