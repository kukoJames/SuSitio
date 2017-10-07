<style type="text/css" media="screen">
	.datepicker{
		z-index: 9999 !important;
	}
</style>

<div class="ibox-content">
	<div class="row">
		<?php echo form_open("", array("id"=>'form_producto_edit')); ?>
		<input type="hidden" name="id_producto" id="id_producto" value="<?php echo $producto->id_producto ?>">
		<div class="row col-sm-12">
			<div class="form-group col-sm-4">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" value="<?php echo $producto->nombre ?>" class="form-control" placeholder="Nombre">
			</div>
			<div class="form-group col-sm-4"">
				<label for="precio">Precio</label>
				<input type="text" name="precio" value="<?php echo $producto->precio ?>" class="form-control" placeholder="0.00">
			</div>
			<div class="form-group col-sm-4"">
				<label for="id_categoria">Categorias</label>
				<select name="id_categoria" class="form-control">
					<option value="-1">Seleccionar...</option>
					<?php if ($categorias):foreach ($categorias as $key => $value): ?>
					<option value="<?php echo $value->id_categoria ?>" <?php echo $producto->id_categoria == $value->id_categoria ? 'selected' : '' ?> ><?php echo $value->nombre ?></option>
					<?php endforeach; endif ?>
				</select>
			</div>
		</div>
		<div class="row col-sm-12">
			<div class="form-group col-sm-12">
				<label for="curp">Descripcioón</label>
				<textarea name="descripcion" id="descripcion" class="form-control" placeholder="Describa una descripción"><?php echo $producto->descripcion ?></textarea>
			</div>
		</div>
		<?php echo form_close(); ?>
	</div>
</div>

<script type="text/javascript">
	$(".update").click(function () {
		sendDatos("Main_control/accion/U/",$("#form_producto_edit")
		);
	});
</script>
