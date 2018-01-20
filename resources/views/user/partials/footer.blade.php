<script>
	function initMap(){
		//Map options
		var options = {
			zoom:15,
			//center:{lat:8.4799, lng:4.5418}
			center:{lat:8.476873,lng:4.673488}
		}
		//New map
		var map = new google.maps.Map(document.getElementById('map'), options);
		//Add marker
		var marker = new google.maps.Marker({
			position:{lat:8.476873,lng:4.673488},
			map:map,
			title: 'ST THOMAS AQUINAS CATHOLIC CHAPLAINCY'
		});

		var infoWindow = new google.maps.InfoWindow({
			content:'<h1>STAC UNILORIN</h1>'
		});
		marker.addListener('click', function(){
			infoWindow.open(map, marker);
		});
		marker.addListener('touchend', function(){
			infoWindow.open(map, marker);
		});
	}
</script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBxbPOJKMbK5lSu4yiTiPtUpREMF0T4Jk0&callback=initMap">
    </script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script type="text/javascript" src="/js/new.js"></script>
@section('footer')

@show

<footer class="footer">
<p class="content center" style="background-color: rgba(51, 51, 51, 0.08);">
  All right reserved &copy {{Carbon\Carbon::now()->year}} || <a href="https://twitter.com/callezenwaka">08032130560</a>
</p>
</footer> <!-- End of footer -->