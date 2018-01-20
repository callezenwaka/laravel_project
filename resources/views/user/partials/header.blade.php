<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="icon" href="/favicon.ico">
<title>Site @yield('title')</title>
<link rel="stylesheet" type="text/css" href="{{asset('font-awesome/css/font-awesome.min.css')}}">

<link href="https://fonts.googleapis.com/css?family=Kaushan+Script|Libre+Baskerville:700i" rel="stylesheet"><!-- 
<link href="https://fonts.googleapis.com/css?family=Libre+Baskerville:700" rel="stylesheet"> -->
<link rel="stylesheet" type="text/css" href="{{asset('css/new.css')}}">
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>

@section('header')

@show
