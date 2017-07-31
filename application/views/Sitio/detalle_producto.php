<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<h3>Mapa</h3>
				</div>
				<div class="ibox-content">
					<div id="map">
						<!-- Aquí se mostrará el mapa -->
					</div>

					<div id="latitude"> </div>

					<div id="longitude"> </div>

				</div>
			</div>
		</div>
	</div>
</div>

<style type="text/css">
	#map{
		width: 1000px;
		height: 450px;
	}
</style>

<script type="text/javascript">
	jQuery(document).ready(function($) {
		if(navigator.geolocation){
			var option = {
				enableHighAccurancy : true,
				timeout : infinty,
				maximumAge : 0
			};

			var watchID = navigator.geolocation.watchPosition(success, failure, option);
		}else{
			toastr.warning("No soporta los mapas", "Alerta");
		}
	});
	// x = navigator.geolocation;
	// x.getCurrentPosition(success, failure);

	function success(position) {
		var my_latitude = position.coords.latitude;
		var my_longitude = position.coords.longitude;
		// $("#latitude").html(my_latitude);
		// $("#longitude").html(my_longitude);

		var coords = new google.maps.LatLng(my_latitude, my_longitude);

		var mapOptions = {
			zoom		:	20,
			center		:	coords,
			MapTypeId	:	google.maps.MapTypeId.ROADMAP
		}

		var map = new google.maps.Map(document.getElementById("map"), mapOptions);

		var marker = new google.maps.Marker({map:map, position: coords});

	}

	function failure(position){
		$("body").append("<p> No encontro latitud ni longitud  </p>")
	}

</script>
