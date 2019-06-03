	<section class="app-container">
		<div class="app-best-games">
			<div class="head-content">
				<h1><i class="fa fa-star" aria-hidden="true"></i> Best games</h1>
			</div>
			<div class="body-content">
				<?php foreach ($juegos_destacados as $destacado) { ?>
				<div class="item-game">
					<a href="<?php echo base_url(); ?>game/<?php echo $destacado->slug; ?>" class="game-box">
						<img src="<?php echo base_url(); ?>cloud/juegos/juego_<?php echo $destacado->codigo; ?>.jpg" alt="" class="img-game">
						<span class="info-game">
							<h3><?php echo $destacado->nombre; ?></h3>
						</span>
					</a>
				</div>
				<?php } ?>
			</div>
		</div>
	</section>
	
	<section class="app-container">
		<div class="app-more-games">
			<div class="head-content">
				<h2><i class="fa fa-clock-o" aria-hidden="true"></i> New games</h2>
			</div>
			<div class="body-content">
				<?php foreach ($juegos_recientes as $reciente) { ?>
				<div class="item-game">
					<a href="<?php echo base_url(); ?>game/<?php echo $reciente->slug; ?>" class="game-box">
						<img src="<?php echo base_url(); ?>cloud/juegos/juego_<?php echo $reciente->codigo; ?>.jpg" alt="" class="img-game">
						<span class="info-game">
							<h3><?php echo $reciente->nombre; ?></h3>
						</span>
					</a>
				</div>
				<?php } ?>
			</div>
		</div>
	</section>