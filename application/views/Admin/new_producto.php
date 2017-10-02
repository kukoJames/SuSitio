<style type="text/css" media="screen">
	.datepicker, #mapa{
		z-index: 9999 !important;
	}
</style>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC6VBEfhHWNZKNUoJbw5YqazrU83u59sbc&callback=initMap"></script>

<div class="ibox-content">
	<div class="row">
		<?php echo form_open("", array("id"=>'form_producto_new')); ?>
		<div class="row">
			<div class="col-sm-4">
				<div class="form-group">
					<label for="nombre">Nombre</label>
					<input type="text" name="nombre" value="" class="form-control" placeholder="Nombre">
				</div>
			</div>
			
			<div class="col-sm-4">
				<div class="form-group">
					<label for="precio">Precio</label>
					<input type="text" name="precio" value="" class="form-control" placeholder="0.00">
				</div>
			</div>

			<div class="col-sm-4">
				<div class="form-group">
					<label for="id_categoria">Categorias</label>
					<select name="id_categoria" class="form-control">
						<option value="-1">Seleccionar...</option>
						<?php if ($categorias):foreach ($categorias as $key => $value): ?>
						<option value="<?php echo $value->id_categoria ?>"><?php echo $value->nombre ?></option>
						<?php endforeach; endif ?>
					</select>
				</div>
			</div>		
		</div>
		
		<div class="row">
			<div class="col-sm-12">
				<div class="form-group">
					<label for="curp">Descripción</label>
					<textarea name="descripcion" id="descripcion" class="form-control" placeholder="Describa una descripción"></textarea>
				</div>
			</div>
		</div>
	
		<div class="row">
			<input type="hidden" name="latitud" id="latitud" value="">
			<input type="hidden" name="longitud" id="longitud" value="">
			<div class="col-sm-12">
				<div id="mapa" style="height: 300px; width: 550px;"> 
					<!--Para mostrar el Mapa --> 
				</div>
			</div>
		</div>
		<?php echo form_close(); ?>
	</div>
</div>

<script type="text/javascript">
	$(".save").click(function () {
		sendDatos("Main_control/accion/I/",$("#form_producto_new")
		);
	});

	jQuery(document).ready(function($) {
		if(navigator.geolocation){
			var option = {
				enableHighAccurancy : true,
				timeout : Infinity,
				maximumAge : 0
			};
			var ubicacion = navigator.geolocation.watchPosition(success, failure, option);
		}else{
			toastr.warning("Su navegador no soporta la geolocalización", "Alerta");
		}
		
		function success(position) {
			var myLatitude = position.coords.latitude;
			var myLongitude = position.coords.longitude;
			$("#latitud").val(myLatitude);
			$("#longitud").val(myLongitude);
			var coords = new google.maps.LatLng(myLatitude, myLongitude);
			var mapOptions = {
				zoom : 20,
				center : coords,
				MapTypeId : google.maps.MapTypeId.ROADMAP
			}
			var map = new google.maps.Map(document.getElementById("mapa"), mapOptions);
			var marker = new google.maps.Marker({map:map, position: coords, title: 'Estas aquí'});
		}

		function failure(position){
			toastr.error("Falló al obtener la ubicación  "+position, "Error");
		}
	});
</script>
