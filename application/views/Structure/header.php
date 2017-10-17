<!DOCTYPE html>
<html>
  <head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Administración</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="robots" content="all,follow">

	<script type="text/javascript">
		var base_url = "<?php echo base_url("/") ?>";
		var urlbase = "<?php echo site_url("/") ?>";
	</script>

	<!-- Bootstrap CSS-->
	<link rel="stylesheet" href="<?php echo base_url('/assets/css/bootstrap.min.css'); ?>">

	<link href="<?php echo base_url('/assets/font-awesome/css/font-awesome.css'); ?>" rel="stylesheet">

	<!-- Toastr style -->
	<link href="<?php echo base_url('/assets/css/plugins/toastr/toastr.min.css'); ?>" rel="stylesheet">

	<!-- Gritter -->
	<link href="<?php echo base_url('/assets/js/plugins/gritter/jquery.gritter.css'); ?>" rel="stylesheet">

	<link href="<?php echo base_url('/assets/css/animate.css'); ?>" rel="stylesheet">

	<link href="<?php echo base_url('/assets/css/style.css'); ?>" rel="stylesheet">

	<!-- Google fonts - Roboto -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">

	<!-- Favicon-->
	<link rel="shortcut icon" href="<?php echo base_url('/assets/img/favicon.ico'); ?>">
	<!-- Font Awesome CDN-->
	<!-- you can replace it by local Font Awesome-->
	<script src="https://use.fontawesome.com/99347ac47f.js"></script>
	<!-- Font Icons CSS-->
	<link rel="stylesheet" href="https://file.myfontastic.com/da58YPMQ7U5HY8Rb6UxkNf/icons.css">
	<!-- Tweaks for older IEs--><!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>

	<!-- Estructura de la ventana modal par insertar, modificar y eliminar datos -->
	<div class="modal inmodal fade" id="myModal" tabindex="-1" role="dialog"  aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">

			</div>
		</div>
	</div>

<body>