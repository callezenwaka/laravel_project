@extends('user.layouts.page')

@section('title', '| Show | Homily')

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
            <a class="" href="{{route('homily')}}"><button>Back</button></a>
            <h3 class="head_margin">{{ $homily->title }}</h3>
        </div>      
        <hr>
        Posted by {{ $homily->created_at->diffForHumans() }}
        <br>
        <div>
          <article>
            <p>{{ strip_tags($homily->body) }}</p>         
          </article>
        </div>
    </div><!-- homily-main -->
</div>
@endsection