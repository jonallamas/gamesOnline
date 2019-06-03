<div class="jumbotron">
	<div class="row menuInfoModulo">
		<div class="col-sm-12">
			<h2><?php echo $titulo_edicion; ?></h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore quia repudiandae, est placeat.</p>
		</div>
	</div>
</div>

<form action="<?php echo base_url(); ?>admin/juegos/guardar" method="post" id="f_juego" name="f_juego" class="form-horizontal" enctype="multipart/form-data">
	<div class="row" id="moduloCarga">
		<div class="col-sm-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Modificar juego</h3>
				</div>
				<div class="panel-body">
					<div class="form-group">
						<div class="col-sm-8">
							<label for="f_juego_nombre">Nombre</label>
							<input type="text" name="f_juego_nombre" id="f_juego_nombre" class="form-control" value="<?php echo $juego->nombre; ?>">
						</div>
						<div class="col-sm-4">
			              <label for="f_imagen">Imagen Principal (JPG o PNG) <span class="requerido"><i class="fa fa-asterisk"></i></span></label>
			              <input type="file" name="f_imagen">
			            </div>
					</div>
					<div class="form-group">
						<div class="col-sm-5">
							<label for="f_juego_tipo">Tipo de juego</label>
							<select name="f_juego_tipo" id="f_juego_tipo" class="form-control">
								<option value="1" <?php if($juego->tipo_id == 1){ echo 'selected'; } ?>>Desktop</option>
								<option value="2" <?php if($juego->tipo_id == 2){ echo 'selected'; } ?>>Mobile</option>
							</select>
						</div>
						<div class="col-sm-5">
							<label for="f_juego_categoria">Categoría</label>
							<select name="f_juego_categoria" id="f_juego_categoria" class="form-control">
								<option value="">Seleccione una opción</option>
								<?php foreach ($categorias as $categoria) { ?>
								<option value="<?php echo $categoria->id; ?>" <?php if($juego->categoria_id == $categoria->id){ echo 'selected'; } ?>><?php echo $categoria->nombre; ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="col-sm-2">
							<label for="f_juego_destacado">Destacado</label><br>
							<label class="radio-inline"><input type="radio" name="f_juego_destacado" value="1" <?php if($juego->destacado == 1){ echo 'checked'; } ?>>Si</label>
							<label class="radio-inline"><input type="radio" name="f_juego_destacado" value="0" <?php if($juego->destacado == 0){ echo 'checked'; } ?>>No</label>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-12">
							<label for="f_juego_descripcion">Descripción</label>
							<input type="text" name="f_juego_descripcion" id="f_juego_descripcion" class="form-control" value="<?php echo $juego->descripcion; ?>">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-12">
							<label for="f_juego_iframe">URL iFrame</label>
							<input type="text" name="f_juego_iframe" id="f_juego_iframe" class="form-control" value="<?php echo $juego->url_juego; ?>">
						</div>
					</div>
				</div>
				<div class="panel-footer text-right">
					<a href="<?php echo base_url(); ?>admin/juegos" class="btn btn-sm btn-default">Cancelar</a>
					<button type="submit" class="btn btn-sm btn-primary">Modificar</button>
					<input type="hidden" name="f_juego_id" id="f_juego_id" value="<?php echo $juego->id; ?>">
				</div>
			</div>
		</div>
	</div>
</form>
