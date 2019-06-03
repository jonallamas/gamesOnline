<div class="jumbotron">
	<div class="row menuInfoModulo">
		<div class="col-sm-12">
			<h2><?php echo $titulo_edicion; ?></h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore quia repudiandae, est placeat.</p>
		</div>
	</div>
</div>

<form action="<?php echo base_url(); ?>admin/categorias/guardar" method="post" id="f_categoria" name="f_categoria" class="form-horizontal" enctype="multipart/form-data">
	<div class="row" id="moduloCarga">
		<div class="col-sm-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Modificar categoria</h3>
				</div>
				<div class="panel-body">
					<div class="form-group">
						<div class="col-sm-4">
							<label for="f_categoria_nombre">Nombre</label>
							<input type="text" name="f_categoria_nombre" id="f_categoria_nombre" class="form-control" value="<?php echo $categoria->nombre; ?>">
						</div>
						<div class="col-sm-8">
							<label for="f_categoria_descripcion">Descripción</label>
							<input type="text" name="f_categoria_descripcion" id="f_categoria_descripcion" class="form-control" value="<?php echo $categoria->descripcion; ?>">
						</div>
					</div>
				</div>
				<div class="panel-footer text-right">
					<a href="<?php echo base_url(); ?>admin/categorias" class="btn btn-sm btn-default">Cancelar</a>
					<button type="submit" class="btn btn-sm btn-primary">Modificar</button>
					<input type="hidden" name="f_categoria_id" id="f_categoria_id" value="<?php echo $categoria->id; ?>">
				</div>
			</div>
		</div>
	</div>
</form>