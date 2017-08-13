	<!-- Navigation -->
	<nav class="navbar fixed-top navbar-toggleable-md navbar-inverse bg-inverse">
		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarExample" aria-controls="navbarExample" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="container">
			<a class="navbar-brand" href="#">Start Bootstrap</a>
			<div class="collapse navbar-collapse" id="navbarExample">
				<ul class="navbar-nav ml-auto">
					<?php if ($opciones): ?>
						<?php foreach ($opciones as $key => $value): ?>
							<li class="nav-item active">
								<a class="nav-link" href="<?php echo site_url($value->url) ?>"><?php echo strtoupper ($value->nombre) ?><span class="sr-only">(current)</span></a>
							</li>
						<?php endforeach; ?>
					<?php endif; ?>
					<li class="nav-item active">
						<a class="nav-link" target="_blank" href="<?php echo site_url('Auth/login'); ?>">LOGIN<span class="sr-only">(current)</span></a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
