<div class="ibox-content">
	<div class="row">
		<?php echo form_open_multipart("", "id='upload_foto'"); ?>
			<div class="form-group col-sm-6">
				<input class="btn btn-warning" type="file" id="userfile" name="userfile" size="20" value="">
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
	$("#upload").click(function(event){
		event.preventDefault();
		var data = new FormData($("#upload_foto").serializeArray())[0];
		$.post("<?php echo site_url('Main_control/uploadFoto') ?>", data, function (resp) {
			console.log("Respuesta "+resp);
			// if (resp.type == 'error')
			// 	toastr.error(resp.desc);
			// else
			// 	toastr.success(resp.desc);
		});
	});
</script>
