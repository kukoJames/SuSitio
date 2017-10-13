<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAoV1bFOgIhMTNzhQLLhaXuaOcuLHF7XEU&callback=initMap"></script>

<br>
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
		width: 100%;
		height: 400px;
	}
</style>

<script type="text/javascript">

	function initMap(){
		const ubication = {
				lat:19.7006,
				lng:-101.186
			}
		
		const options={
			center:ubication,
			zoom:15
		}

		var map = document.getElementById('map');
		const mapa =new google.maps.Map(map, options);

		const marcador = new google.maps.Marker({
			position: ubication,
			map:mapa,
			title:"Mi marcador"
		});

		var info = new google.maps.InfoWindow({
			content:'<h1>Hola mundo</h1>'+'<p>Master cracks</p>'+'<a href="#">pagina web</a>'
		});

		marcador.addListener('click', function() {
			info.open(mapa,marcador);
		});

	}

</script>