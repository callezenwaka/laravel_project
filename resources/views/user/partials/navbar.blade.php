<header class="header" id="header">
			<nav class="nav" id="navbar">
				<div class="Menubar" id="Menubar">
					<div class="button" id="button">
						  <div class="bar1"></div>
						  <div class="bar2"></div>
						  <div class="bar3"></div>
					</div>
					<a class="logo" id="logo" style="font-family: 'Kaushan Script', cursive;text-shadow: 4px 4px 4px rgba(51, 51, 51, 0.5);" href="/"><strong>NFCS UNILORIN</strong></a>
					<!-- <form method="POST" action="/" class="search" id="search">
						<i class="fa fa-search" style="margin-left: 3px;" aria-hidden="true"></i>
						<input placeholder="search"/>
						<input type="hidden" name="submit">
					</form>
					<i class="fa fa-search searchIcon" id="searchIcon" aria-hidden="true"></i> -->
					@if(Auth::check())
					<a href="/users/{{Auth::user()->slug}}">
						<img class="profileImage" src="{{ asset('storage/uploads/avatars/'.Auth::user()->image) }}" alt="{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}'s image">
					</a>
					@endif
				</div> <!-- End of Logo, search, open -->
				<div>
					<ul id="Menu" class="Menu">
						<li class="{{ Request::is('/') ? 'active' : '' }}"><a href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a></li>
						<li class="{{ Request::is('about') ? 'active' : '' }}"><a href="{{ route('about') }}">About</a></li>
						<li class="{{ Request::is('contact') ? 'active' : '' }}"><a href="{{ route('contact.create') }}">Contact</a></li>
						<li class="{{ Request::is('blog') ? 'active' : '' }}"><a href="{{ route('blog_user')}}">Blog</a></li>
						{{--  <li class="{{ Request::is('products') ? 'active' : '' }}"><a href="#">Products</a></li>  --}}
						@if(Auth::check())
						<li class="drop" id="drop">
							<a class="user" id="user" href="#" onclick="event.preventDefault();">
							<img class="profileImage" src="{{ asset('storage/uploads/avatars/'.Auth::user()->image) }}" alt="{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}'s image">Profile<!-- {{ Auth::user()->first_name }} {{ Auth::user()->last_name }} -->
							<!-- <span>{{ Auth::user()->last_name }} {{ Auth::user()->first_name }}</span> -->
							<span class="mobile_arrow">
								<i class="fa fa-angle-up up"></i>
								<i class="fa fa-angle-down down"></i>
								<i class="fa fa-angle-right right"></i>
							</span>
							</a>
							<ul class="subMenu">
								<li><a href="{{route('user.show_user',Auth::user()->slug)}}"><i class="fa fa-user-circle" aria-hidden="true"></i><span> Profile</span></a>
									<span class="mobile_arrow">
										<i class="fa fa-angle-right"></i>
										<i class="fa fa-angle-down"></i>
									</span>
								</li>
								<li><a href="#" class=""><span>Careers</span></a>
									<span class="mobile_arrow">
										<i class="fa fa-angle-right"></i>
										<i class="fa fa-angle-down"></i>
									</span>
								</li>
								<li><a href="{{ route('logout') }}"
										onclick="event.preventDefault();
													document.getElementById('logout-form').submit();">
										<i class="fa fa-sign-out" aria-hidden="true"></i> Logout
									</a>
									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
										{{ csrf_field() }}
									</form>
									<span class="mobile_arrow">
										<i class="fa fa-angle-right right"></i>
										<i class="fa fa-angle-down down"></i>
									</span>
								</li>
							</ul>
						</li>
						@else
						<li class="{{ Request::is('login') ? 'active' : '' || Request::is('admin-login') ? 'active' : ''}}"><a href="{{ route('login') }}"><i class="fa fa-sign-in" aria-hidden="true"></i> Sign in</a>	</li>
						<li class="{{ Request::is('register') ? 'active' : '' }}"><a href="{{ route('register') }}"><i class="fa fa-user-plus" aria-hidden="true"></i> Register</a></li>
						@endif
					</ul>
				</div>
			</nav> <!-- End of small screen menu &#9587;-->
	</header> <!-- End of header -->