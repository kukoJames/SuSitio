<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
<div class="row">
	<div class="col-lg-12 col-md-6 mb-4">
		<div class="card h-100">
			<a href="#" >
				<img class="card-img-top img-fluid" width=850 height=1 src="<?php echo base_url("{$producto->ruta_imagen}{$producto->nombre_imagen}") ?>"  alt="Mas información">
			</a>
			<div class="card-block">
				<h4 class="card-title"><a href="#"><?php echo $producto->producto ?></a></h4>
				<h5>$ <?php echo number_format($producto->precio, 2, '.', ',') ?></h5>
				<p class="card-text"><?php echo $producto->descripcion ?></p>
			</div>
			<div class="card-footer">
				<small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
			</div>
		</div>
	</div>
</div>

<hr>

<h3>Ubicación</h3>

<div class="row">
	<div class="col-lg-12 col-md-6 mb-4">
		<div class="card h-100">
			<div class="card-block">
				<div id="map">
					<!-- Aquí se mostrará el mapa -->
				</div>

				<div id="latitude"> </div>

				<div id="longitude"> </div>
			</div>
		</div>
	</div>
</div>

<style type="text/css">
	#map{
		width: 880px;
		height: 400px;
	}
</style>

<script type="text/javascript">
	jQuery(document).ready(function($) {
		if(navigator.geolocation){
			var option = {
				enableHighAccurancy : true,
				//timeout : infinty,
				timeout : 60,
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
			zoom		:	30,
			center		:	coords,
			MapTypeId	:	google.maps.MapTypeId.ROADMAP
		}

		var map = new google.maps.Map(document.getElementById("map"), mapOptions);

		var marker = new google.maps.Marker({map:map, position: coords});

	}

	function failure(position){
		console.log("No encontro latitud ni longitud");
	}

</script>
