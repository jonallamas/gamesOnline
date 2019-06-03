<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title><?php echo $juego->nombre; ?></title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome-4.7.0/css/font-awesome.min.css">
	<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
</head>
<body>
<style>
	
.appmain{
	overflow: hidden;
	width: 100%;
	height: 100%;
	position: fixed;
	background-color: #000;
	top: 0;
	left: 0;
	z-index: 10;
}

.app-navbar{
	z-index: 15;
	position: fixed;
	top: 0;
	left: 0;
	background-color: #333;
	box-shadow: 0px 15px 25px -15px rgba(0,0,0,0.35);
	line-height: 55px;
	height: 55px;
	width: 55px;
}
	.app-navbar .top-left-button{
		display: block;
		height: 55px;
		width: 55px;
		float: left;
		position: relative;
		text-align: center;
		background-color: rgba(255,255,255,.3);
	}
		.app-navbar .top-left-button button{
			background-color: transparent;
			border: none;
			color: #fff;
			outline: none;
			font-size: 20px;
			width: 100%;
			height: 100%;
		}

</style>
	<nav class="app-navbar">
		<div class="top-left-button">
			<button type="button" class="icon-menu"><i class="fa fa-bars" aria-hidden="true"></i></button>
		</div>
	</nav>
	<div class="appmain">
		<iframe src="<?php echo $juego->url_juego; ?>" scrolling="no" style="border:0;height: 1px; min-height: 100%;width: 1px; min-width: 100%;"></iframe>
	</div>

	<script>
		$('.icon-menu').on('click', function(e){
			e.preventDefault();
			console.log('Hola');
		});
	</script>
</body>
</html>
