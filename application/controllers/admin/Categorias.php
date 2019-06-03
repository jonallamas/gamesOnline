<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias extends CI_Controller {

	public function __construct(){
		parent::__construct();

		//Carga de los modelos
		$this->load->model('categorias_model');

		//Configurando el data_header
		$this->data_header['titulo'] = 'Administración de categorías';
		$this->data_header['titulo_edicion'] = 'Modificación de categoría';
		$this->data_header['seccion_menu'] = 'seccion_juegos';

		if(!$this->session->userdata('conectado') || $this->session->userdata('usuario_tipo') != 1){
			// redirect(base_url());
		}
	}

	public function index()
	{
		$this->load->view('template/panel_v1/header', $this->data_header);
		$this->load->view('panel/categorias/categorias');
		$this->load->view('template/panel_v1/footer');
	}

	public function guardar()
	{
		if(!$this->input->post()){
			redirect(base_url().'admin/categorias');
			exit();
		}

		$categoria_id = $this->input->post('f_categoria_id');
		
		if($categoria_id)
		{
			$datos_categoria = array(
				'nombre'		=> $this->input->post('f_categoria_nombre'),
				'descripcion'	=> $this->input->post('f_categoria_descripcion')?$this->input->post('f_categoria_descripcion'):NULL,
				
				'actualizado' 	=> date('Y-m-d H:i:s')
			);

			if($this->categorias_model->modifica($datos_categoria, $categoria_id))
			{
				// Alerta de que se realizó con éxito
			}
			else
			{
				// Alerta de que no se pudo realizar
			}
		}else{
			$datos_categoria = array(
				'nombre'		=> $this->input->post('f_categoria_nombre'),
				'descripcion'	=> $this->input->post('f_categoria_descripcion')?$this->input->post('f_categoria_descripcion'):NULL,

				'estado' 		=> 1,
				'creado'		=> date('Y-m-d H:i:s'),
				'actualizado' 	=> date('Y-m-d H:i:s')
			);

			if($this->categorias_model->alta($datos_categoria))
			{
				// Alerta de que se realizó con éxito
			}
			else
			{
				// Alerta de que no se pudo realizar
			}
		}

		if(!$this->input->is_ajax_request()){
			redirect(base_url().'admin/categorias');
		}
	}

	public function editar()
	{
		$categoria_id	= $this->uri->segment(4);

		$this->data_header['categoria'] = $this->categorias_model->obtener($categoria_id);

		if($this->data_header['categoria'])
		{
			$this->load->view('template/panel_v1/header', $this->data_header);
			$this->load->view('panel/categorias/editar');
			$this->load->view('template/panel_v1/footer');
		}
		else{
			redirect(base_url().'admin/categorias');
		}
	}

	public function activar(){
		$codigo = $this->uri->segment(5);

		$datos_categoria = array(
			'estado' 		=> 1,
			'actualizado' 	=> date('Y-m-d H:i:s')
		);

		if($this->categorias_model->modifica($datos_categoria, $codigo))
		{
			// Alerta de que se realizó con éxito
		}
		else
		{
			// Alerta de que no se pudo realizar
		}

		redirect(base_url().'admin/categorias');
	}

	public function eliminar(){
		$codigo = $this->uri->segment(5);

		$datos_categoria = array(
			'estado' 		=> 2,
			'actualizado' 	=> date('Y-m-d H:i:s')
		);

		if($this->categorias_model->modifica($datos_categoria, $codigo))
		{
			// Alerta de que se realizó con éxito
		}
		else
		{
			// Alerta de que no se pudo realizar
		}

		redirect(base_url().'admin/categorias');
	}

	public function suspender(){
		$codigo = $this->uri->segment(5);

		$datos_categoria = array(
			'estado' 		=> 0,
			'actualizado' 	=> date('Y-m-d H:i:s')
		);

		if($this->categorias_model->modifica($datos_categoria, $codigo))
		{
			// Alerta de que se realizó con éxito
		}
		else
		{
			// Alerta de que no se pudo realizar
		}

		redirect(base_url().'admin/categorias');
	}

	public function lista()
	{
		$this->datatables->add_column('icono', '<i class="fa fa-circle"></i>', 'icono');
		$this->datatables->select('juegosonline_juegos_categorias.id as id,
			juegosonline_juegos_categorias.nombre as nombre,

			juegosonline_juegos_categorias.creado as creado,
			DATE_FORMAT(juegosonline_juegos_categorias.creado, "%d/%m/%Y") as creado_formateado,
			juegosonline_juegos_categorias.estado as estado');
		$this->datatables->from('juegosonline_juegos_categorias');
		$this->datatables->where('juegosonline_juegos_categorias.estado !=', 2);

  		echo $this->datatables->generate();
	}
}
