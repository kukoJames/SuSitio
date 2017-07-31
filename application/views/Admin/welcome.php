		<!-- Charts Section-->
		<section class="charts">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="line-chart-example card">
							<div class="card-header d-flex align-items-center">
								<h3 class="h4">Listado principal</h3>
								<div style="margin-left: auto;" class="">
									<a href="#" title="Agregar" class="btn btn-item bg-green"> <i class="fa fa-plus"></i></a>
								</div>
							</div>
							<div class="card-body">
								<table class="table table-striped">
									<thead>
										<tr>
											<th>NO</th>
											<th>NOMBRE</th>
											<th>PRECIO</th>
											<th>DESCRIPCIÓN</th>
											<th>CATEGORÍA</th>
											<th>IMAGEN</th>
											<th>ACCIIÓN</th>
								  		</tr>
									</thead>
									<tbody>
										<?php if ($productos): ?>
											<?php foreach ($productos as $key => $value): ?>
												<tr>
													<th scope="row"><?php echo $value->id_producto ?></th>
													<td><?php echo $value->producto ?></td>
													<td>$<?php echo number_format($value->precio, 2, '.', ',') ?></td>
													<td><?php echo $value->descripcion ?></td>
													<td><?php echo $value->categoria ?></td>
													<td><?php echo '' ?></td>
													<td>
														<a href="#" title="Actualizar" class="btn btn-item bg-blue"> <i class="fa fa-pencil"></i></a>
														<hr>
														<a href="#" title="Eliminar" class="btn btn-item bg-red"> <i class="fa fa-times"></i></a>
													</td>
										  		</tr>
											<?php endforeach ?>
										<?php endif ?>
								  	</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
