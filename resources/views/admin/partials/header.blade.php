<header class="header" id="header">
	<nav class="nav" id="nav">
		<div class="Menubar" id="Menubar">
			<div class="button" id="button">
				  <div class="bar1"></div>
				  <div class="bar2"></div>
				  <div class="bar3"></div>
			</div>
			<a class="logo" id="logo" href="/">SITE LOGO</a>
			<!-- <form method="POST" action="/" class="search" id="search">
				<input placeholder="search"/>
				<input type="hidden" name="submit">
			</form> 
			<a class="searchIcon" id="searchIcon" href="#"><img src="/images/btn-search-header.png"></a>-->
			@if(Auth::guest())
				<a href="{{ route('admin.login') }}">Sign in</a>
			@else
				<a href="{{ route('admin.logout') }}"
						onclick="event.preventDefault();
									document.getElementById('logout-form').submit();">
						<button type="submit" class="btn btn-primary">Logout</button>
				</a>
				<form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
					{{ csrf_field() }}
				</form>
			@endif
		</div> <!-- End of Logo, search, open -->
	</nav> <!-- End of small screen menu &#9587;-->
</header> <!-- End of header -->