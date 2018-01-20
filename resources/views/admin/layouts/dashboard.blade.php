<!DOCTYPE html>
<html>
<head>
	@include('admin.partials.head')
</head>
<body>
<div class="container">
<div id="overlay" class="overlay"></div>
	@include('admin.partials.header')

	<section class="navbar" id="navbar">
		<div>
			@include('admin.partials.navbar')
		</div>
	</section>

	<section class="info">
		<div class="events center">
			@section('content')

			@show
			
		</div> <!-- End of news -->
	</section> <!-- End of info section --> 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="/js/admin/dashboard.js"></script>
</div>
</body>
</html>