	<div id="flex_wrapper">
		<div id="header_area">
			<div class="wrapper">
				<div id="nav_area">
					<!-- <span><a href="/" class="home_link">Home</a></span> -->
					<i class="fa fa-cog fa-2x" id="settings_menu_toggle"></i>
				</div>
				
				<div class="clearfix"></div>
			</div>
		</div>
		<div id="content_area">
			<div id="content_header"></div>
			<div id="content_tabs">
				<a href="/select-lot/mode=map" class="selected">Map</a>
				<a href="/select-lot/mode=code">Location ID</a>
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
		placeMarker(map, 50.70545, -120.44265, 9, "Kamloops Airport", false);
		placeMarker(map,  53.540197, -113.603823, 20, "Colleen & Shannon Manor", false);
		placeMarker(map, 53.679066, -113.247798, 26, "Lot 79 - Fort Gardens", false);
		placeMarker(map,  53.616530, -113.640623, 28, "Grandin Village Phase 3", false);
		placeMarker(map, 53.541864, -113.500178, 29, "Icon Tower 1", false);
		placeMarker(map, 53.433547, -113.597955, 30, "Infusion", false);
		placeMarker(map,  53.622429, -113.500221, 31, "Lorelei Close", false);
		placeMarker(map, 53.431020, -113.519358, 32, "MacEwan Village", false);
		placeMarker(map, 53.434385, -113.570599, 34, "MacTaggart Ridge", false);
		placeMarker(map, 53.679159, -113.236616, 36, "Lot 96 - Mission Greens", false);
		placeMarker(map, 53.423695, -113.521557, 38, "Rutherford Village", false);
		placeMarker(map,  53.441457, -113.566515, 39, "Sandalwood", false);
		placeMarker(map, 53.481787, -113.542847, 40, "Aspen Gardens", false);
		placeMarker(map,  53.424213, -113.460651, 41, "Mosaic Point", false);
		placeMarker(map, 53.455594, -113.510614, 44, "One Century Park", false);
		placeMarker(map,  53.475454, -113.364208, 45, "Tamarack", false);
		placeMarker(map,  53.476638, -113.361162, 46, "Tamarack Manor", false);
		placeMarker(map, 53.242431, -113.540618, 48, "Rushes of Southfork", false);
		placeMarker(map,  53.577596, -113.376649, 49, "Rio Hermitage", false);
		placeMarker(map, 53.451011, -113.426838, 51, "Aspen Close", false);
		placeMarker(map,  53.452602, -113.429642, 52, "Mariner Square", false);
		placeMarker(map, 53.463993, -113.422222, 53, "Legacy Park", false);
		placeMarker(map,  53.421861, -113.437451, 54, "Sandstone at Walker Lakes", false);
		placeMarker(map, 53.427450, -113.437057, 55, "Sunvillage Copperstone", false);
		placeMarker(map, 53.458058, -113.452724, 56, "Emerald Place Phase I", false);
		placeMarker(map, 53.444801, -113.400196, 57, "Colony Key", false);
		placeMarker(map, 53.463915, -113.391269, 58, "Creekside Villas", false);
		placeMarker(map, 53.341935, -113.418011, 61, "Place Chaleureuse", false);
		placeMarker(map, 53.509300, -113.664066, 62, "Aspen Lanes", false);
		placeMarker(map, 53.480382, -113.376506, 63, "Aspen Meadows 5 & 6", false);
		placeMarker(map, 53.481375, -113.375768, 64, "Aspen Meadows 3 & 4", false);
		placeMarker(map, 53.481854, -113.376980, 65, "Aspen Meadows 1 & 2", false);
		placeMarker(map, 53.468923, -113.370681, 66, "Park Place Meadows", false);
		placeMarker(map, 53.469267, -113.376901, 67, "Park Place Wild Rose", false);
		placeMarker(map,  53.456666, -113.379930, 68, "Village on the Park", false);
		placeMarker(map, 53.491585, -113.666642, 69, "Mosaic Parkland", false);
		placeMarker(map, 53.454780, -113.574221, 70, "Westhills in Whitemud Oaks", false);
		placeMarker(map, 53.419929, -113.448561, 71, "Southwinds", false);
		placeMarker(map,  53.488067, -113.539721, 73, "Californian Lansdowne", false);
		placeMarker(map, 53.631272, -113.466185, 74, "Brio-Celtic", false);
		placeMarker(map, 53.659902, -113.605768, 75, "Terraces of Oakmont", false);
		placeMarker(map, 53.413820, -113.521644, 77, "Callaghan Ravines", false);
		placeMarker(map, 53.455645, -113.533111, 78, "Kaskitayo Court", false);
		placeMarker(map,  53.413996, -113.443860, 79, "Aurora Summerside", false);
		placeMarker(map, 53.433526, -113.609364, 81, "L'attitude Studios", false);
		placeMarker(map, 53.454666, -113.559644, 82, "Chateaux at Whitemud Ridge", false);
		placeMarker(map, 53.623348, -113.486990, 84, "Park Place Eaux Claires", false);
		placeMarker(map, 53.543936, -113.509724, 85, "Cosmopolitan", false);
		placeMarker(map, 53.608651, -113.412696, 86, "Summerhill Park", false);
		placeMarker(map, 53.445069, -113.575538, 88, "Terwillegar Corners", false);
		placeMarker(map, 53.535254, -113.501974, 89, "Lot 80 - Terrace Court", false);
		placeMarker(map, 53.575208, -113.375435, 91, "Avenue at Hermitage (The)", false);
		placeMarker(map,  53.442473, -113.575266, 93, "Terwillegar Commons", false);
		placeMarker(map,  53.521633, -113.682335, 94, "Lodge at Lewis Estates", false);
		placeMarker(map, 53.416598, -113.530987, 95, "Solaris of Rutherford", false);
		placeMarker(map, 53.545100, -113.506128, 97, "Western Supplies Building", false);
		placeMarker(map, 53.462772, -113.538091, 98, "Derrick Hill Estates", false);
		placeMarker(map, 53.605183, -113.396855, 101, "Cottages (The)", false);
		placeMarker(map, 53.576329, -113.375636, 102, "Elements (The), Phase 3", false);
		placeMarker(map, 53.540430, -113.527145, 103, "Illuminada", false);
		placeMarker(map, 53.640424, -113.636319, 104, "Mission Hill Grande", false);
		placeMarker(map, 53.630859, -113.586927, 105, "Akinsdale Gardens", false);
		placeMarker(map, 53.540481, -113.524822, 106, "Serenity", false);
		placeMarker(map, 53.454535, -113.582045, 107, "Mosaic Ridge", false);
		placeMarker(map, 53.532259, -113.621952, 108, "Point West on the Lake", false);
		placeMarker(map, 53.502629, -113.616695, 109, "Sommerset", false);
		placeMarker(map, 53.601911, -113.545534, 110, "Morello Gate", false);
		placeMarker(map, 53.602148, -113.414216, 111, "Avenue (The)", false);
		placeMarker(map, 53.561379, -113.275503, 112, "Emerald Hills", false);
		placeMarker(map, 53.618563, -113.408981, 115, "Brintnell Landing", false);
		placeMarker(map, 53.600475, -113.410364, 116, "Clareview Courts", false);
		placeMarker(map, 53.560277, -113.271566, 117, "Axxess Summerwood", false);
		placeMarker(map, 53.551199, -113.535497, 119, "Images and Shades - Pay Parking", false);
		placeMarker(map, 53.570565, -113.496831, 120, "Masjid Quba - Pay Parking", false);
		placeMarker(map, 44.654850, -63.603161, 123, "Halifax Forum", false);
		placeMarker(map, 53.536255, -113.502504, 124, "Catholic School Board", false);
		placeMarker(map, 53.550291, -113.494113, 125, "Urban China Pay Parking", false);
		placeMarker(map, 53.451243, -113.564896, 127, "Magrath Green", false);
		placeMarker(map, 53.496591, -113.682844, 129, "Mosaic Meadows", false);
		placeMarker(map, 44.632385, -63.633247, 130, "The Waterton", false);
		placeMarker(map, 53.406500, -113.574864, 131, "Mosaic Vista on the Park", false);
		placeMarker(map, 53.548684, -113.504074, 132, "Modern Beauty Supplies", false);
		placeMarker(map, 53.542171, -113.506270, 133, "Pay Parking - Carbon Copy Digital", false);
		placeMarker(map, 53.480823, -113.454687, 134, "Twin Terrace", false);
		placeMarker(map, 53.481886, -113.664828, 135, "South Hamptons", false);
		placeMarker(map, 53.549649, -113.507297, 136, "Cafe Amore", false);
		placeMarker(map, 51.052815, -114.066815, 137, "Waterfront", false);
		placeMarker(map, 50.947396, -114.068512, 138, "Gateway South Centre", false);
		placeMarker(map, 53.542447, -113.507147, 139, "Riley's", false);
		placeMarker(map, 51.046948, -114.088204, 140, "Kerby Centre", false);
		placeMarker(map, 53.546767, -113.514768, 141, "Oliver Village", false);
		placeMarker(map, 55.198732, -118.771000, 142, "The Vistas", false);
		placeMarker(map, 53.497803, -113.680128, 143, "Novus Granville", false);
		placeMarker(map, 53.411929, -113.460169, 144, "Mosaic Shores", false);
		placeMarker(map, 45.680064, -111.039558, 145, "The Baxter Hotel", false);
		placeMarker(map, 53.5435754, -113.5226037, 146, "SecurePark Demo", false);
		placeMarker(map, 53.522394, -113.641104, 149, "Summerlea Court", false);
		placeMarker(map, 53.406440, -113.465945, 182, "The Grove Townhomes", false);
		placeMarker(map, 43.634657, -79.596969, 192, "Forest Park Circle Residential", false);
		placeMarker(map, 43.634775, -79.595055, 202, "Forest Park Circle Residential", false);
		placeMarker(map, 53.640974, -113.474764, 221, "Lakeview Condominiums", false);
		placeMarker(map, 55.167805, -118.767696, 231, "Aurora Estates", false);
		placeMarker(map, 53.411417, -113.451949, 232, "The Sands", false);
		placeMarker(map, 53.451966, -113.561546, 242, "Magrath Heights", false);
		placeMarker(map, 53.532210, -113.629262, 251, "Stonegate Condominiums", false);
		placeMarker(map, 51.057609, -113.987514, 261, "PPWL Demo", false);
		placeMarker(map, 53.629314, -113.556048, 272, "Elements Albany", false);
		placeMarker(map, 44.644649, -63.573858, 282, "1521/1531 Grafton Parking", false);
		placeMarker(map, 53.545743, -113.503927, 361, "7th Street Lofts", false);
		placeMarker(map, 53.496252, -113.685522, 371, "Mosaic Meadows 1", false);
		placeMarker(map, 53.419559, -113.460873, 381, "Lake Summerside", false);
		placeMarker(map, 43.590954, -79.629694, 382, "The Elmwoods", false);
		placeMarker(map, 43.599976, -79.594731, 392, "Tomken Place", false);
		placeMarker(map, 43.594987, -79.628042, 402, "The Valleywoods", false);
		placeMarker(map, 43.593928, -79.629008, 412, "The Maplewoods", false);
		placeMarker(map, 43.593010, -79.628035, 422, "The Forestwoods", false);
		placeMarker(map, 43.592928, -79.626118, 432, "Aspen Grove I & II", false);
		placeMarker(map, 43.595111, -79.631571, 442, "The Arista", false);
		placeMarker(map, 51.030963, -114.071787, 452, "La Boulangerie", false);
		placeMarker(map, 53.608549, -113.538911, 472, "Palisades Pointe Villas", false);
		placeMarker(map, 53.455893, -113.511505, 481, "Century Park", false);
		placeMarker(map, 43.725791, -79.481286, 541, "2737 Keele St", false);
		placeMarker(map, 43.849224, -79.432539, 572, "9090 Yonge St", false);
		placeMarker(map, 53.545363, -113.499533, 582, "Legacy Condo - 10303 105 St", false);
		placeMarker(map, 53.609496, -113.417711, 591, "Park Place Manning", false);
		placeMarker(map, 41.401170, -75.673205, 602, "Poor Richard's Pub", false);
		placeMarker(map, 53.423714, -113.437198, 612, "Southern Springs", false);
		placeMarker(map, 52.126826, -106.658455, 641, "Sheraton Cavalier Saskatoon Hotel", false);
		placeMarker(map, 53.55040386448049, -113.5223354883259, 642, "Studio Ed", false);
		placeMarker(map, 44.667202037985156, -63.597914623278825, 652, "Barrington Narrows", false);
		placeMarker(map, 44.701629260137814, -63.67463878703302, 662, "390-420 Larry Uteck Blvd", false);
		placeMarker(map, 44.664729136817606, -63.63545561163937, 672, "Icon Bay ", false);
		placeMarker(map, 53.541678, -113.512384, 681, "Meridian Plaza", false);
		placeMarker(map, 33.7651036, -84.37653990000001, 731, "330 McGill Place", false);
		placeMarker(map, 53.54047196863015, -113.48791328125003, 741, "Precise Quebec Demo", false);
		placeMarker(map, 56.1304, -106.3468, 751, "Demo", false);
		placeMarker(map, 51.005936384461556, -114.06563964538577, 771, "Southern Alberta Eye Centre", false);
		placeMarker(map, 62.447718, -114.374607, 781, "Raven's Court", false);
		placeMarker(map, 62.444447, -114.413285, 851, "Birchwood", false);
		placeMarker(map, 53.550532, -113.531549, 861, "Glanora Mansion", false);
		placeMarker(map, 53.419559, -113.460873, 871, "LS Manager Lot", false);
		placeMarker(map, 53.409707, -113.531442, 881, "Heritage Landing", false);
		placeMarker(map, 44.655260952088994, -63.63024751163937, 891, "St. Lawrence Place", false);
		placeMarker(map, 53.4899861, -113.66521599999999, 901, "Park Place Hampton's", false);
		placeMarker(map, 53.629501, -113.555207, 911, "Aviva", false);
		placeMarker(map, 53.547107, -113.532152, 921, "Glenora Gates", false);
		placeMarker(map, 43.3322609, -79.8087999, 931, "760 Brant Street", false);
		placeMarker(map, 53.46495013976336, -113.3821776904449, 932, "Villages on the Creek", false);
		placeMarker(map, 51.0670484, -114.0966919, 942, "L3050 – ONE6", false);
		placeMarker(map, 51.1712611, -114.0488388, 952, "Coventry Station", false);
		placeMarker(map, 41.899774, -87.897029, 962, "Smart Permits Demo", false);
		placeMarker(map, 49.14141, -122.60035, 1, "Trinity Western", true);
		placeMarker(map,  53.609504, -113.479171, 3, "Dickensfield Court", true);
		placeMarker(map, 43.723478, -79.473510, 11, "Precise Parklink Demo", true);
		placeMarker(map, 53.546933, -113.497844, 12, "Ice District", true);
		placeMarker(map, 43.7958041, -79.3495479, 21, "Seneca College", true);
	}
	google.maps.event.addDomListener(window, 'load', initialize);
</script>
			</div>
			<div id="content_gradient"></div>
		</div>
	</div>


	<!--[if IE]>
	<script type="text/javascript" src="js/ie.min.js"></script>
	<![endif]-->
