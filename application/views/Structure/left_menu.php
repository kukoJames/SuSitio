	<?php $user = $this->ion_auth->user()->row(); ?>

		<div class="page-content d-flex align-items-stretch">
			<!-- Side Navbar -->
			<nav class="side-navbar">
				<!-- Sidebar Header-->
				<div class="sidebar-header d-flex align-items-center">
					<div class="avatar">
						<img src="<?php echo base_url("/assets/img/avatar-5.JPG") ?>" alt="..." class="img-fluid rounded-circle">
					</div>
					<div class="title">
						<h1 class="h4"><?php echo strtoupper($user->first_name) ?></h1>
						<p>Web Designer</p>
					</div>
				</div>
				<!-- Sidebar Navidation Menus-->
				<ul class="list-unstyled">
					<?php if ($menu_left): ?>
						<?php foreach ($menu_left as $key => $value): ?>
							<?php if ($value->nivel == 1): ?>
                                <li>
                                <?php if ($value->ruta != ''): ?>
                                	<a href="<?php echo site_url($value->ruta); ?>">
                                    	<i class="<?php echo $value->icono ?>"></i>
                                    	<span class="nav-label"><?php echo strtoupper($value->nombre) ?></span>
                                	</a>
                                <?php else: ?>
                                	<a href="#">
                                    	<i class="<?php echo $value->icono ?>"></i>
                                    	<span class="nav-label"><?php echo strtoupper($value->nombre) ?></span>
                                    	<span class="fa arrow"></span>
                                	</a>
                                <?php endif ?>
                                </li>
                            <?php endif ?>
                        <?php endforeach ?>
					<?php endif ?>
				</ul>
			</nav>
			<div class="content-inner">
				<!-- Page Header-->
				<header class="page-header">
					<div class="container-fluid">
						<h2 class="no-margin-bottom">Submenu</h2>
					</div>
				</header>



