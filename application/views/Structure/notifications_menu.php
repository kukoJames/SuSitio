	<?php $user = $this->ion_auth->user()->row(); ?>

		<div class="page charts-page">
			<!-- Main Navbar-->
			<header class="header">
				<nav class="navbar">
					<!-- Search Box-->
					<div class="search-box">
						<button class="dismiss"><i class="icon-close"></i></button>
						<form id="searchForm" action="#" role="search">
							<input type="search" placeholder="Buscar" class="form-control">
						</form>
					</div>
					<div class="container-fluid">
						<div class="navbar-holder d-flex align-items-center justify-content-between">
							<!-- Navbar Header-->
							<div class="navbar-header">
								<!-- Navbar Brand --><a href="#" class="navbar-brand">
									<div class="brand-text brand-big hidden-lg-down"><span>Bootstrap </span><strong>Dashboard</strong></div>
									<div class="brand-text brand-small"><strong>BD</strong></div></a>
								<!-- Toggle Button--><a id="toggle-btn" href="#" class="menu-btn active"><span></span><span></span><span></span></a>
							</div>
							<!-- Navbar Menu -->
							<ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
								<!-- Logout    -->
								<li class="nav-item"> BIENVENIDO : <?php echo strtoupper($user->username) ?>
								</li>
								<li class="nav-item">
									<a href="<?php echo site_url('Auth/logout')?>" class="nav-link logout">Salir<i class="fa fa-sign-out"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</nav>
			</header>
