	<!-- Page Content -->
	<div class="container">

		<div class="row">

			<div class="col-lg-3">

				<h1 class="my-4"> </h1>
				<div class="list-group">
					<?php if ($categorias): ?>
						<?php foreach ($categorias as $key => $value): ?>
							<a href="<?php echo site_url($value->url) ?>" class="list-group-item"><?php echo strtoupper ($value->nombre) ?></a>
						<?php endforeach; ?>
					<?php endif; ?>
				</div>

			</div>
			<!-- /.col-lg-3 -->

			<div class="col-lg-9" id="main_container">

				<div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel" style="">
					<ol class="carousel-indicators">
						<?php if ($productos):foreach($productos as $key => $value): ?>
							<?php if ($key == 0): ?>
								<li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $key ?>" class="active"></li>
							<?php else: ?>
								<li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $key ?>"></li>
							<?php endif ?>
						<?php endforeach; endif ?>
					</ol>
					<div class="carousel-inner" role="listbox">
						<?php if ($productos):foreach($productos as $key => $value): ?>
							<?php if ($key == 0): ?>
								<div class="carousel-item active">
									<img class="card-img-top img-fluid" width=850 height=400 src="<?php echo base_url("{$value->ruta_imagen}{$value->nombre_imagen}") ?>"  alt="">
								</div>
							<?php else: ?>
								<div class="carousel-item">
									<img class="card-img-top img-fluid" width=850 height=400 src="<?php echo base_url("{$value->ruta_imagen}{$value->nombre_imagen}") ?>"  alt="">
								</div>
							<?php endif ?>
						<?php endforeach; endif ?>
					</div>
					<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>

				<div class="row">
					<div class="col-lg-12 col-md-6 mb-4">

						<div class="card h-100">
							<div class="card-block">
							<h3>Aqui alguna informacion extra</h3>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<?php if ($productos): ?>
						<?php foreach ($productos as $key => $value): ?>
							<div class="col-lg-4 col-md-6 mb-4">
								<div class="card h-100">
									<a class="show_information" href="#" data-id_producto="<?php echo $value->id_producto ?>" >
										<img class="card-img-top img-fluid" width=400 height=1 src="<?php echo base_url("{$value->ruta_imagen}{$value->nombre_imagen}") ?>"  alt="Mas información">
									</a>
									<div class="card-block">
										<h4 class="card-title"><a href="#"><?php echo $value->producto ?></a></h4>
										<h5>$ <?php echo number_format($value->precio, 2, '.', ',') ?></h5>
										<p class="card-text"><?php echo $value->descripcion ?></p>
									</div>
									<div class="card-footer">
										<small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
									</div>
								</div>
							</div>
						<?php endforeach ?>
					<?php endif ?>
				</div>
				<!-- /.row -->

			</div>
			<!-- /.col-lg-9 -->

			<div class="col-lg-9" id="detail_container">
			<br>
				<!-- Aqui cargaremos el detalle-->

			</div>

		</div>
		<!-- /.row -->

	</div>
	<!-- /.container -->

	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$("#detail_container").hide()
		});
		$(".show_information").click(function (event) {
			event.preventDefault();
			$.get("Welcome/showDetalle/"+$(this).data('id_producto'), function(resp) {

				$("#main_container").hide();
				$("#detail_container").show();
				$("#detail_container").html(resp);
			});
		});
	</script>
