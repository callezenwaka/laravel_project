@extends('user.layouts.page')

@section('title', '| Home')

@section('content')

<section class="hero hero-row ">
	<div class="hero-background">
	
	</div>
</section>
<section class="info text-align">
		<div class="news center">
			<h2>News</h2><hr>
			@foreach($posts as $post)
				<div>
					<a href="{{route('post.show_user',$post->slug)}}" target="_blank">{{ $post->title }}</a>
				</div>
				<strong><small>{{ $post->created_at->diffForHumans() }}</small></strong>
				<div>
					{{ substr(strip_tags($post->body), 0, 48) }}{{ strlen(strip_tags($post->body)) > 48 ? "..." : "" }}
					<a href="{{route('post.show_user',$post->slug)}}" target="_blank"><i class="fa fa-external-link-square" aria-hidden="true"></i></a>
				</div>
				<hr>
			@endforeach
		</div> <!-- End of news -->

		<div class="events center">
			<div class="homily">
				<h3>Homily</h3>
				<ul style="list-style-type:none;text-align: center;">
					@foreach ($archives as $stats)
						<li style="display: block;">
							<!-- <i class="fa fa-dot-circle-o" aria-hidden="true"></i> -->
							<a href="/homily/?month={{ $stats['month'] }}&year={{ $stats['year'] }}">{{ $stats['month'].' '.$stats['year'] }}</a>
						</li>
					@endforeach
				</ul>
			</div>
			<div class="quotes" style="margin-top: 8px;">
				<iframe align="center" src="http://widget.calendarlabs.com/v1/quot.php?cid=101&uid=3494871794&c=random&l=en&cbg=ee6e73&cb=1&cbc=000000&cf=calibri&cfg=fff&qfs=bi&qta=center&tfg=fff&tfs=bi&afc=000000&afs=i" width="188" height="300" marginwidth=0 marginheight=0 frameborder=no scrolling=no allowtransparency='true'></iframe>
			</div>
		</div> <!-- End of event -->

	</section> <!-- End of info section --> 

	<section class="journal center">
		<div class="editorials center" style="background-color: #ee6e73">
			<div class="inner">
				<h3 style="margin: 0; padding: 5px 0 0 0;">Pastoral Team</h3>
				<p>
					Most Rev. Dr. Ayo-Maria Atoyebi<br>
					Catholic Bishop of Ilorin Diocese
				</p>
				<p>
					@foreach($chaplain as $single_chaplain)
						{{ $single_chaplain->title }} {{ $single_chaplain->first_name }} {{ $single_chaplain->last_name }}<br>{{ $single_chaplain->phone }}<br>Chaplain
					@endforeach
				</p>
				<p>
					@foreach ($single_assist_chaplain as $assist_chaplain)
						{{ $assist_chaplain->title}} {{ $assist_chaplain->first_name}} {{ $assist_chaplain->last_name}}<br>{{ $assist_chaplain->phone }}<br>Assistant Chaplain
					@endforeach
				</p>
				<p>
					Prof. Gabriel Olatunji<br>
					Catechist
				</p>
			</div>
		</div><!-- End of editorials -->
<!-- style="font-family: arial, sans-serif;border-collapse: collapse;width: 100%;" -->
		<div class="report" style="background-color: #ee6e73">
			<div class="inner">
			    <table>
			      <thead>
			        <tr>
			          <th>Activities</th>
			          <th>Day</th>
			          <th>Time</th>
			        </tr>
			      </thead>
			            <tbody>
			                <tr>
			                  <td>
			                  	Masses
			                  	<br>STAC
			                  	<br>Collage
			                  	<br>KWASU
			                  </td>
			                  <td>
			                  	Sunday
			                  	<br>"
			                  	<br>"
			                  	<br>"
			                  </td>
			                  <td>
			                  	<br>9:30 am
			                  	<br>7:00 am
			                  	<br>8:00 am
			                  </td>
			                </tr>
			                <tr>
			                	<td>
			                		Weekday Masses
			                		<br>STAC
			                		<br>"
			                	</td>
			                	<td>
			                		<br>Mon - Thurs. & Sat.
			                		<br>Fri.
			                	</td>
			                	<td>
			                		<br>7:00 am
			                		<br>6:00 pm
			                	</td>
			                </tr>
			                <tr>
			                	<td>
			                		NFCS Fellowwship
			                	</td>
			                	<td>
			                		Monday
			                	</td>
			                	<td>
			                		6:30 pm
			                	</td>
			                </tr>
			                <tr>
			                	<td>
			                		Confessions
			                	</td>
			                	<td>
			                		Fri
			                	</td>
			                	<td>
			                		6:30 pm
			                	</td>
			                </tr>
			            </tbody>
			    </table>
			</div>
		</div> <!-- End of report -->
	</section> <!-- End of main section --> 

	<section class="blog center">
		@include('user.includes.messages')
		<h3>Subscribe to our news letter</h3>
		<form class="subscribe" action="{{ route('subscription.store')}}" method="POST">
			{{ csrf_field() }}
			<input type="email" name="email" required="" placeholder="Enter your email"/>
			<button  type="submit" name="submit">Subscribe</button>
			 <div class="input2">
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
		</form>
		<strong>Follow us on social media</strong>
		<div class="socialMedia">
			<a href="#"><span><i class="fa fa-facebook-square" aria-hidden="true"></i></span></a>
			<a href="#"><span><i class="fa fa-twitter-square" aria-hidden="true"></i></span></a>
			<a href="#"><span><i class="fa fa-instagram" aria-hidden="true"></i></span></a>
			<a href="#"><span><i class="fa fa-whatsapp" aria-hidden="true"></i></span></a>
			<a href="#"><span><i class="fa fa-medium" aria-hidden="true"></i></span></a>
			<a href="#"><span><i class="fa fa-google-plus" aria-hidden="true"></i></span></a>
			<a href="#"><span><i class="fa fa-youtube-square" aria-hidden="true"></i></span></a>
		</div>
	</section> <!-- End of subscription section --> 

	<section class="main center">
		<div class="notes background center">
			<div class="row">
			@foreach ($excos as $stats)
					<a href="/executive/?year={{ $stats['year'] }}">Executives</a>
				@endforeach
				</div>
				<div class="row">
			@foreach ($chaps as $stats)
					<a href="/chaplain/?year={{ $stats['year'] }}">Chaplains</a>				
				@endforeach
				</div>
				<div class="row">
			@foreach ($assists as $stats)			
					<a href="/assistant_chaplain/?year={{ $stats['year'] }}">Assistant Chaplains</a>
				@endforeach
				</div>
				<div class="row">
			@foreach ($orgs as $stats)			
					<a href="/society/?year={{ $stats['year'] }}">Religious Groups</a>
				@endforeach
				</div>
			<div class="row">
				<a href="{{ route('anthem') }}">NFCS Anthem</a>
			</div>
			<div class="row">
				<a href="{{ route('prayer') }}">NFCS Prayer</a>
			</div>
			<div class="row">
				<a href="{{ route('nfcs') }}">History of NFCS</a>
			</div>
		</div> <!-- End of map -->

		<div class="organizers background ">
			<div id="twitter"><a class="twitter-timeline" data-width="330" data-height="318" data-link-color="#ee6e73" href="https://twitter.com/callezenwaka?ref_src=twsrc%5Etfw">Tweets by callezenwaka</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script></div>
		</div> <!-- End of event --> <!-- End of report -->

		<div class="map background center" style="color: #000;">
			<!-- <h1>Map</h1> -->
			<div id="map"></div>
		</div> <!-- End of map --> 
	</section> <!-- End of main section -->  
	
@endsection

