<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Sitio</title>
	<!-- Bootstrap core CSS -->
	<link href="<?php echo base_url('/assets/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
	<!-- Custom styles for this template -->
	<link href="<?php echo base_url('/assets/css/shop-homepage.css'); ?>" rel="stylesheet">
	<!-- Toastr script -->
	<script src="<?php echo base_url('/assets/js/plugins/toastr/toastr.min.js');?>"></script>
	<!-- Toastr style -->
	<link href="<?php echo base_url('/assets/css/plugins/toastr/toastr.min.css');?>" rel="stylesheet">

	<script src="<?php echo base_url("/assets/vendor/jquery/jquery-2.1.1.js");?>"></script>

	<!-- Temporary navbar container fix -->
	<style>
	.navbar-toggler {
		z-index: 1;
	}

	@media (max-width: 576px) {
		nav > .container {
			width: 100%;
		}
	}
	/* Temporary fix for img-fluid sizing within the carousel */

	.carousel-item.active,
	.carousel-item-next,
	.carousel-item-prev {
		display: block;
	}
	</style>

</head>

<body>
	<!-- Inicia el cuerpo -->
