<style type="text/css" media="screen">
	.datepicker, #show_mapa{
		z-index: 9999 !important;
	}
</style>


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
					<label for="descripcion">Descripción</label>
					<textarea name="descripcion" id="descripcion" class="form-control" placeholder="Describa una descripción"></textarea>
				</div>
			</div>
		</div>
	
		<div class="row">
			<input type="hidden" name="latitud" id="latitud" value="">
			<input type="hidden" name="longitud" id="longitud" value="">
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
	$(".save").click(function () {
		sendDatos("Main_control/accion/I/",$("#form_producto_new"));
	});
	
	var latitud =  document.getElementById("latitud");
	var longitud = document.getElementById('longitud');

	startMap("show_mapa", latitud, longitud);

</script>