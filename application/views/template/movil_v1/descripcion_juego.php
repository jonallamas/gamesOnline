<style>

.play-game-container{
	padding-top: 75px;
}
	.play-game-container .image-box{
		float: left;
	}
		.play-game-container .image-box img{
			box-shadow: 0 3px 10px 0 rgba(0,0,0,0.14);
			border-radius: 15px;
			width: 125px;
			height: 125px;
		}
	.play-game-container .info-box{
		padding-left: 145px;
		margin-bottom: 30px;
	}
		.play-game-container .info-box h1{
			margin-top: 10px;
			margin-bottom: 5px;
			font-size: 22px;
		}
		.play-game-container .info-box .category{
			opacity: .6;
		}
		.play-game-container .info-box .btn{
			padding: 10px 80px;
			/*width: 50%;*/
			/*margin-bottom: 20px;*/
		}
		.play-game-container .info-box .btn-principal{
			background-color: red;
			color: #fff;
		}
	.play-game-container .description-box{
		display: block;
		position: relative;
		width: 100%;
	}

</style>


<section class="app-container">
	<div class="play-game-container">
		<div class="image-box">
			<img src="<?php echo base_url(); ?>cloud/juegos/juego_<?php echo $juego->codigo; ?>.jpg" alt="">
		</div>
		<div class="info-box">
			<h1><?php echo $juego->nombre; ?></h1>
			<p class="category"><?php echo $juego->categoria_nombre; ?></p>
			<a href="<?php echo base_url(); ?>play/<?php echo $juego->codigo; ?>" class="btn btn-principal">Play</a>
		</div>
		<div class="description-box">
			<p><?php echo $juego->descripcion; ?></p>
		</div>
	</div>
</section>