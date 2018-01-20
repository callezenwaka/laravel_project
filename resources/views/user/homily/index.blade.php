@extends('user.layouts.page')

@section('title', '| Homilies')

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
      <h1>Homily Page</h1>
    </div>      
    <hr>
      @foreach($homilies as $homily)
        <div>
            <h2><a href="{{ route('homily.show_user',$homily->slug) }}">{{ $homily->title }}</a></h2>
            <strong>{{ $homily->created_at->diffForHumans() }}</strong>
          <div>
            {{ substr(strip_tags($homily->body), 0, 100) }}{{ strlen(strip_tags($homily->body)) > 100 ? "..." : "" }}
            <a href="{{ route('homily.show_user',$homily->slug) }}"><i class="fa fa-external-link-square" aria-hidden="true"></i></a>
          </div>
        </div><hr>
      @endforeach
      <div class="row">
      {{ $homilies->links() }}
    </div>
  </div>
</div><!-- /.blog-main -->

@endsection