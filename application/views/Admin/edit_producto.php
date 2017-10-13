<style type="text/css" media="screen">
	.datepicker, #mapa{
		z-index: 9999 !important;
	}
</style>

<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC6VBEfhHWNZKNUoJbw5YqazrU83u59sbc&callback=initMap"></script> -->

<div class="ibox-content">
	<div class="row">
		<?php echo form_open("", array("id"=>'form_producto_edit')); ?>
		<input type="hidden" name="id_producto" id="id_producto" value="<?php echo $producto->id_producto ?>">
		<div class="row">
			<div class="col-sm-4">
				<div class="form-group">
					<label for="nombre">Nombre</label>
					<input type="text" name="nombre" value="<?php echo $producto->nombre ?>" class="form-control" placeholder="Nombre">
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<label for="precio">Precio</label>
					<input type="text" name="precio" value="<?php echo $producto->precio ?>" class="form-control" placeholder="0.00">
				</div>
			</div>
			<div class="col-sm-4"">
				<div class="form-group">
					<label for="id_categoria">Categorias</label>
					<select name="id_categoria" class="form-control">
						<option value="-1">Seleccionar...</option>
						<?php if ($categorias):foreach ($categorias as $key => $value): ?>
						<option value="<?php echo $value->id_categoria ?>" <?php echo $producto->id_categoria == $value->id_categoria ? 'selected' : '' ?> ><?php echo $value->nombre ?></option>
						<?php endforeach; endif ?>
					</select>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="form-group">
					<label for="descripcion">Descripcioón</label>
					<textarea name="descripcion" id="descripcion" class="form-control" placeholder="Describa una descripción"><?php echo $producto->descripcion ?></textarea>
				</div>
			</div>
		</div>

		<div class="row">
			<input type="hidden" name="latitud" id="latitud" value="<?php echo $producto->latitud ?>">
			<input type="hidden" name="longitud" id="longitud" value="<?php echo $producto->longitud ?>">
			<div class="col-sm-12">
				<div id="show_mapa" style="height: 300px; width: 550px;"> 
					<!--Para mostrar el Mapa --> 
				</div>
			</div>
		</div>
		<?php echo form_close(); ?>
	</div>
</div>

<script type="text/javascript">
	$(".update").click(function () {
		sendDatos("Main_control/accion/U/",$("#form_producto_edit"));
	});

	function initMap() {
		var mapa = new google.maps.Map(document.getElementById('show_mapa'),{
			center:{
				lat:19.7006,
				lng:-101.186
			},
			zoom:20
		});

		var marker = new google.maps.Marker({
			position:{
				lat:19.7006,
				lng:-101.186
			},
			map:mapa,
			draggable:true,
			title:"Estás aqui"
		});

		google.maps.event.addListener(marker, 'dragend', function(){
			$("#latitud").val(marker.getPosition().lat());
			$("#longitud").val(marker.getPosition().lng());
			console.log("Latitud =",marker.getPosition().lat(), "	Longitud =",marker.getPosition().lng());
		});
	}
</script>
