<div class="jumbotron">
	<div class="row menuInfoModulo">
		<div class="col-sm-6">
			<h2><?php echo $titulo; ?></h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore quia repudiandae, est placeat.</p>
		</div>
		<div class="col-sm-6 text-right">
			<div class="menuBotones">
				<a href="<?php echo base_url(); ?>admin/juegos" class="btn btn-sm btn-default">Juegos</a> 
				<button type="button" class="btn btn-sm btn-primary" onclick="mostrar_ocultar_modulo('f_categoria_nombre')"><i class="fa fa-plus"></i> Nuevo</button>
			</div>
		</div>
	</div>
</div>

<form action="<?php echo base_url(); ?>admin/categorias/guardar" method="post" id="f_categoria" name="f_categoria" class="form-horizontal" enctype="multipart/form-data">
	<div class="row" id="moduloCarga" style="display: none;">
		<div class="col-sm-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Nuevo categoria</h3>
				</div>
				<div class="panel-body">
					<div class="form-group">
						<div class="col-sm-4">
							<label for="f_categoria_nombre">Nombre</label>
							<input type="text" name="f_categoria_nombre" id="f_categoria_nombre" class="form-control">
						</div>
						<div class="col-sm-8">
							<label for="f_categoria_descripcion">Descripción</label>
							<input type="text" name="f_categoria_descripcion" id="f_categoria_descripcion" class="form-control">
						</div>
					</div>
				</div>
				<div class="panel-footer text-right">
					<button type="button" class="btn btn-sm btn-default" onclick="mostrar_ocultar_modulo()">Cancelar</button>
					<button type="submit" class="btn btn-sm btn-primary">Guardar</button>
				</div>
			</div>
		</div>
	</div>
</form>

<div class="row" id="moduloInformacion">
	<div class="col-sm-12">
		
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Lista categorias</h3>
			</div>
			<table class="table table-striped" id="tabla_categorias"  width="100%">
				<thead>
					<tr>
						<th width="1%"></th>
						<th width="1%"></th>
						<th width="90%">Nombre</th>
						<th width="1%"></th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>

	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() 
	{
		// Datatable
		tabla = $('#tabla_categorias').DataTable({
			"autoWidth": false,
			"language": {
				"url": base_url+"scripts/script_tablas/spanish.json"
			},
			serverSide: true,
			columns: [
				{ data: 'id', 'visible':false, 'orderable': true, 'searchable': false },
				{ data: 'icono', 'visible':true, 	'orderable': false, 'searchable': false },
				{ data: 'nombre',	'visible':true, 	'orderable': true, 'searchable': true },
				{ data: 'id', 'visible':true, 'searchable':false, 'orderable': false, 'render': function (val, type, row)
          			{
            			var opciones = '<div class="mismalinea">';
						opciones += '<a href="categorias/editar/'+row.id+'" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-pencil"></i></a> ';
            			opciones += '</div>';

			            return opciones;
			    	}
			    }
			],
			order: [
				[ 0, 'asc' ]
			],
			ajax: {
				url: 'categorias/lista',
				type: 'POST'
			}
		});
	});

</script>
