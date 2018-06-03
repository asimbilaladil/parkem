	<div id="flex_wrapper">
		<div id="header_area">
			<div class="wrapper">
				<table>
							<tr>
								<td style=" width: 35%; ">
									
								</td>
								<td style="width: 50%; border: 0px solid black;" >
									<a href="/select-lot/"><img style="width:  36%;" src="<?php echo base_url('includes/website/assets/img/ParkemLong.png'); ?>" alt="Logo" class="logo"></a>
								</td>
								<td>
									
								</td>
							</tr>
						</table>
				<div id="nav_area">
						</div>
						
				
				<div class="clearfix"></div>
			</div>
		</div>
		<div id="content_area">
			<div id="content_header"></div>
			<div id="content_tabs">
				<a href="<?php echo site_url(''); ?>" class="selected">Map</a>
				<a href="<?php echo site_url('Location'); ?>">Location ID</a>
				<a href="<?php echo site_url('Payment'); ?>">Pay Citation</a>
				<a style="font-size: 20px; float: right;" href="<?php echo site_url('Admin'); ?>" <i class="fa fa-user fa-2x" id="settings_menu_toggle"></i> Admin </a>

				
			</div>
			<div id="content_messages">
			</div>
			<div id="content">
				<form action="/select-lot/mode=map" method="post">
	<div id="lot_map" style="bottom: 59px;"></div>

</form>
<div id="find_by_code" class="overlay_dialog">
	<div class="col">
		<a href="#" id="find_by_map" class="fbmTop find_by_map"><i class="fa fa-chevron-circle-left"></i> Return to Map</a>
		<div id="location_error">
			<span class="error-title">Oops. <i class="fa fa-location-arrow"></i></span>
			<div class="error-message">We couldn't determine where you were. This is probably because you have location disabled.  If you enable it on this site, we can try to automatically find you some parking nearby.</div>
		</div>
		<form action="/select-lot/mode=map" method="post" class="overlayForm">
			<label for="lot_code">Please enter the Location ID:</label>
			<input type="number" name="lot_code" id="lot_code" value="" required="required" /><br />
			<button type="submit" class="button-dark">Next</button>
		</form>
		<a href="#" id="find_by_map" class="fbmTop find_by_map"><i class="fa fa-chevron-circle-left"></i> Return to Map</a>
	</div>
</div>

<script type="text/javascript">
	function initialize() {
		if(navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(function(position) {
				var pos = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);

				map.setCenter(pos);
				map.setZoom(15);
			}, no_location);
		} else {
			no_location(false);
		}
		var mapOptions = {
			center: {
				lat: 53.554654,
				lng: -113.491545
			},
			zoom: 8
		};
		var map = new google.maps.Map(document.getElementById('lot_map'), mapOptions);
		mc = new MarkerClusterer(map,[],{
			averageCenter: true,
			styles: [{
				url: "<?php echo base_url('includes/website/assets/img/map-cluster.png') ?>",
				width: 53,
				height: 53
			}]
		});
		<?php echo $data['html']; ?>
	}
	google.maps.event.addDomListener(window, 'load', initialize);
</script>
			</div>
			<div id="content_gradient"></div>
		</div>
	</div>
<script type="text/javascript">


    var registerNumber =  function registerNumber(id){
      	window.location = "<?php echo site_url('Register?id='); ?>"+ id;

    }

</script>

	<!--[if IE]>
	<script type="text/javascript" src="js/ie.min.js"></script>
	<![endif]-->
