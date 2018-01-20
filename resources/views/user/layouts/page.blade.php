<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	@include('user.partials.header')
	<style>
		#map {
			height: 100%;
			width: 100%;
			{{--  height: 446px;  --}}
			{{--  width: 425px;  --}}
		}
		#twitter {
			height: 100%;
			width: 100%;
			{{--  height: 446px;  --}}
			{{--  width: 425px;  --}}
		}
	</style>
</head>
<body>
<div id="overlay" class="overlay"></div>
<div class="container">

	@include('user.partials.navbar')

	@section('content')

	@show
	
@include('user.partials.footer')


</div> <!-- End of container --> 
</body>
</html>