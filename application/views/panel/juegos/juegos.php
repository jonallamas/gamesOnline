<div class="jumbotron">
	<div class="row menuInfoModulo">
		<div class="col-sm-6">
			<h2><?php echo $titulo; ?></h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore quia repudiandae, est placeat.</p>
		</div>
		<div class="col-sm-6 text-right">
			<div class="menuBotones">
				<a href="<?php echo base_url(); ?>admin/categorias" class="btn btn-sm btn-default">Categorías</a> 
				<button type="button" class="btn btn-sm btn-primary" onclick="mostrar_ocultar_modulo('f_juego_nombre')"><i class="fa fa-plus"></i> Nuevo</button>
			</div>
		</div>
	</div>
</div>

<form action="<?php echo base_url(); ?>admin/juegos/guardar" method="post" id="f_juego" name="f_juego" class="form-horizontal" enctype="multipart/form-data">
	<div class="row" id="moduloCarga" style="display: none;">
		<div class="col-sm-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Nuevo juego</h3>
				</div>
				<div class="panel-body">
					<div class="form-group">
						<div class="col-sm-8">
							<label for="f_juego_nombre">Nombre</label>
							<input type="text" name="f_juego_nombre" id="f_juego_nombre" class="form-control">
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
								<option value="1">Desktop</option>
								<option value="2" selected>Mobile</option>
							</select>
						</div>
						<div class="col-sm-5">
							<label for="f_juego_categoria">Categoría</label>
							<select name="f_juego_categoria" id="f_juego_categoria" class="form-control">
								<option value="">Seleccione una opción</option>
								<?php foreach ($categorias as $categoria) { ?>
								<option value="<?php echo $categoria->id; ?>"><?php echo $categoria->nombre; ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="col-sm-2">
							<label for="f_juego_destacado">Destacado</label><br>
							<label class="radio-inline"><input type="radio" name="f_juego_destacado" value="1">Si</label>
							<label class="radio-inline"><input type="radio" name="f_juego_destacado" value="0" checked>No</label>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-12">
							<label for="f_juego_descripcion">Descripción</label>
							<input type="text" name="f_juego_descripcion" id="f_juego_descripcion" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-12">
							<label for="f_juego_iframe">URL iFrame</label>
							<input type="text" name="f_juego_iframe" id="f_juego_iframe" class="form-control">
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
				<h3 class="panel-title">Lista juegos</h3>
			</div>
			<table class="table table-striped" id="tabla_juegos"  width="100%">
				<thead>
					<tr>
						<th width="1%"></th>
						<th width="1%"></th>
						<th width="90%">Nombre</th>
						<th width="1%">Categoría</th>
						<th width="1%">Tipo</th>
						<th width="1%">Destacado</th>
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
		// Scripts de Validación
		// var validator = new FormValidator('f_form', [{
		//       name: 'f_nombre',
		//       rules: 'required'
		//   }
		// ], function(errors, event) {
		//       form_error_eliminar("#f_form"); 
		//       if(errors.length > 0) {
		//           //Creando todas las alertas
		//           for (var i=0; i<errors.length; i++) {
		//               var id = errors[i]["id"];
		//               var mensaje = errors[i]["message"];
		//               form_error(id, mensaje);
		//               if(i == 0){ $("#"+id).focus(); }
		//           }
		//       }
		// });

		// Datatable
		tabla = $('#tabla_juegos').DataTable({
			"autoWidth": false,
			"language": {
				"url": base_url+"scripts/script_tablas/spanish.json"
			},
			serverSide: true,
			columns: [
				{ data: 'id', 'visible':false, 'orderable': true, 'searchable': false },
				{ data: 'icono', 'visible':true, 	'orderable': false, 'searchable': false },
				{ data: 'nombre',	'visible':true, 	'orderable': true, 'searchable': true },
				{ data: 'categoria_nombre',	'visible':true, 	'orderable': true, 'searchable': true },
				{ data: 'tipo_id',	'visible':true, 	'orderable': false, 'searchable': true, 'className': 'text-center', 'render': function(val, type, row)
					{
						if(row.tipo_id == 1){
							return '<i class="fa fa-desktop" style="font-size: 16px" aria-hidden="true"></i>';
						}else{
							return '<i class="fa fa-mobile" style="font-size: 20px" aria-hidden="true"></i>';
						}
					}
				},
				{ data: 'destacado',	'visible':true, 	'orderable': true, 'searchable': true, 'className': 'text-center', 'render': function(val, type, row) 
					{
						if(row.destacado == 1){
							return '<i class="fa fa-circle" aria-hidden="true"></i>';
						}else{
							return '<i class="fa fa-circle" style="opacity: .5" aria-hidden="true"></i>';
						}
					}
				},
				{ data: 'id', 'visible':true, 'searchable':false, 'orderable': false, 'render': function (val, type, row)
          			{
            			var opciones = '<div class="mismalinea">';
						opciones += '<a href="juegos/editar/'+row.id+'" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-pencil"></i></a> ';
            			opciones += '</div>';

			            return opciones;
			    	}
			    }
			],
			order: [
				[ 0, 'asc' ]
			],
			ajax: {
				url: 'juegos/lista',
				type: 'POST'
			}
		});
	});

</script>
