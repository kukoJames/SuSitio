<div class="ibox-content">
	<div class="row">
		<?php echo form_open("", array("id" => 'upload_foto')); ?>
			<div class="form-group col-sm-6">
				<input class="btn btn-warning" type="file" id="file" name="file" size="20" value="">
				<input type="hidden" id="id_producto" name="id_producto" value="<?php echo $producto->id_producto ?>">
				<input type="hidden" id="id_categoria" name="id_categoria" value="<?php echo $categoria->id_categoria ?>">
				<input type="hidden" name="categoria" name="categoria" value="<?php echo $categoria->nombre ?>">
			</div>
			<div class="form-group col-sm-6">
				<button class="btn btn-info" type="submit" id="upload"> <i class="fa fa-upload"></i>
					<span class="bold">Subir foto</span>
				</button>
			</div>
		<?php echo form_close(); ?>
	</div>
</div>

<script type="text/javascript">
	$(document).off("click", "#upload").on("click", "#upload", function(event){
		event.preventDefault();
		var fdata = new FormData($("#upload_foto")[0]);
		uploadImagen(fdata)
			.done(function (resp) {
				if (resp.type == 'error'){
					toastr.error(resp.desc, resp.id);
				}else{
					toastr.success(resp.desc, resp.id);
					$("#myModal").modal("hide");
					$("#myModal .modal-body").empty();
				}
			});
	});

	function uploadImagen(form) {
		return $.ajax({
			url: "<?php echo site_url('Main_control/uploadFoto') ?>",
			type: "POST",
			cache: false,
			contentType: false,
			processData:false,
			data: form,
		});
	}
</script>
