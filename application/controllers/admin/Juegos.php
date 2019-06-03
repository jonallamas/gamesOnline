<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Juegos extends CI_Controller {

	public function __construct(){
		parent::__construct();

		//Carga de los modelos
		$this->load->model('juegos_model');

		//Configurando el data_header
		$this->data_header['titulo'] = 'Administración de juegos';
		$this->data_header['titulo_edicion'] = 'Modificación del juego';
		$this->data_header['seccion_menu'] = 'seccion_juegos';

		if(!$this->session->userdata('conectado') || $this->session->userdata('usuario_tipo') != 1){
			// redirect(base_url());
		}
	}

	public function index()
	{
		$this->load->model('categorias_model');
		$this->data_header['categorias'] = $this->categorias_model->obtener_todos();

		$this->load->view('template/panel_v1/header', $this->data_header);
		$this->load->view('panel/juegos/juegos');
		$this->load->view('template/panel_v1/footer');
	}

	public function guardar()
	{
		if(!$this->input->post()){
			redirect(base_url().'admin/juegos');
			exit();
		}

		$juego_id = $this->input->post('f_juego_id');
		
		if($juego_id)
		{
			$nombre_completo = $this->input->post('f_juego_nombre');
			$slug = $this->create_slug($nombre_completo);

			$datos_juego = array(
				'tipo_id'			=> $this->input->post('f_juego_tipo'),
				'categoria_id'		=> $this->input->post('f_juego_categoria'),

				'nombre'			=> $this->input->post('f_juego_nombre'),
				'slug'				=> $slug,
				'descripcion'		=> $this->input->post('f_juego_descripcion'),

				'url_juego'			=> $this->input->post('f_juego_iframe'),
				'img_secundaria'	=> NULL,

				'destacado'			=> $this->input->post('f_juego_destacado'),
				
				'estado' 		=> 1,
				'actualizado' 	=> date('Y-m-d H:i:s')
			);

			if($this->juegos_model->modifica($datos_juego, $juego_id))
			{
				// Alerta de que se realizó con éxito

				$juego = $this->juegos_model->obtener($juego_id);

				$config['file_name'] = 'juego_'.$juego->codigo.'.jpg';	
				$config['upload_path'] = './cloud/juegos/';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['overwrite'] = TRUE;

				$this->load->library('upload', $config);
				if($this->upload->do_upload('f_imagen')){

					$configResize['image_library'] = 'gd2';
					$configResize['source_image']	= './cloud/juegos/'.$config['file_name'];			
					$configResize['maintain_ratio'] = TRUE;
					$configResize['width']	= 300;
					$configResize['quality'] = '50%';
					$this->load->library('image_lib', $configResize);
					$this->image_lib->resize();

					$dataResponse = $this->upload->data();
					$dataImagen = array(
						"img_principal" => $dataResponse['file_name']
					);
					$this->juegos_model->modifica($dataImagen, $juego_id);
				}
			}
			else
			{
				// Alerta de que no se pudo realizar
			}
		}else{
			$nombre_completo = $this->input->post('f_juego_nombre');
			$slug = $this->create_slug($nombre_completo);

			$datos_juego = array(
				'tipo_id'			=> $this->input->post('f_juego_tipo'),
				'categoria_id'		=> $this->input->post('f_juego_categoria'),

				'nombre'			=> $this->input->post('f_juego_nombre'),
				'slug'				=> $slug,
				'descripcion'		=> $this->input->post('f_juego_descripcion'),

				'url_juego'			=> $this->input->post('f_juego_iframe'),
				'img_secundaria'	=> NULL,

				'destacado'			=> $this->input->post('f_juego_destacado'),

				'estado' 			=> 1,
				'creado'			=> date('Y-m-d H:i:s'),
				'actualizado' 		=> date('Y-m-d H:i:s')
			);

			if($this->juegos_model->alta($datos_juego))
			{
				// Alerta de que se realizó con éxito

				$juego_id = $this->db->insert_id();

				$codigo = $this->generateRandomString(16, $juego_id).$juego_id;
				$datos_codigo = array(
					'codigo' 	=> $codigo
				);

				$this->juegos_model->modifica($datos_codigo, $juego_id);

				$config['file_name'] = 'juego_'.$codigo.'.jpg';		
				$config['upload_path'] = './cloud/juegos/';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['overwrite'] = TRUE;

				$this->load->library('upload', $config);
				if($this->upload->do_upload('f_imagen')){

					$configResize['image_library'] = 'gd2';
					$configResize['source_image']	= './cloud/juegos/'.$config['file_name'];			
					$configResize['maintain_ratio'] = TRUE;
					$configResize['width']	= 300;
					$configResize['quality'] = '50%';
					$this->load->library('image_lib', $configResize);
					$this->image_lib->resize();

					$dataResponse = $this->upload->data();
					$dataImagen = array(
						"img_principal" => $dataResponse['file_name']
					);
					$this->juegos_model->modifica($dataImagen, $juego_id);
				}
			}
			else
			{
				// Alerta de que no se pudo realizar
			}
		}

		if(!$this->input->is_ajax_request()){
			redirect(base_url().'admin/juegos');
		}
	}

	public function create_slug($string)
	{
		$string = $this->sanear_string($string);
	    $slug = trim($string);
	    $slug = strtolower($slug);
	    $slug = str_replace(' ', '-', $slug);

	    return $slug;
	}

	public function sanear_string($string)
	{
	 
	    $string = trim($string);
	 
	    $strig = str_replace(
	        array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
	        array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
	        $string
	    );
	 
	    $string = str_replace(
	        array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
	        array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
	        $string
	    );
	 
	    $string = str_replace(
	        array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
	        array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
	        $string
	    );
	 
	    $string = str_replace(
	        array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
	        array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
	        $string
	    );
	 
	    $string = str_replace(
	        array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
	        array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
	        $string
	    );
	 
	    $string = str_replace(
	        array('ñ', 'Ñ', 'ç', 'Ç'),
	        array('n', 'N', 'c', 'C',),
	        $string
	    );	 
	 
	    return $string;
	}

	public function generateRandomString($length, $id)
	{
		$id = strlen($id);
	    $characters = '1A2B3C4D5E6F7G8H9I0J1K2L3M4N5O6P7Q8R9S0T1U2V3W4X5Y6Z7';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < ($length - $id); $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}

	public function editar()
	{
		$juego_id	= $this->uri->segment(4);

		$this->data_header['juego'] = $this->juegos_model->obtener($juego_id);

		$this->load->model('categorias_model');
		$this->data_header['categorias'] = $this->categorias_model->obtener_todos();

		if($this->data_header['juego'])
		{
			// $this->data_header['js_juegos'] = $this->load->view('juegos/js_juegos', $this->data_header, true);

			$this->load->view('template/panel_v1/header', $this->data_header);
			$this->load->view('panel/juegos/editar');
			$this->load->view('template/panel_v1/footer');
		}
		else{
			redirect(base_url().'admin/juegos');
		}
	}

	public function activar(){
		$codigo = $this->uri->segment(5);

		$datos_juego = array(
			'estado' 		=> 1,
			'actualizado' 	=> date('Y-m-d H:i:s')
		);

		if($this->juegos_model->modifica($datos_juego, $codigo))
		{
			// Alerta de que se realizó con éxito
		}
		else
		{
			// Alerta de que no se pudo realizar
		}

		redirect(base_url().'admin/juegos');
	}

	public function eliminar(){
		$codigo = $this->uri->segment(5);

		$datos_juego = array(
			'estado' 		=> 2,
			'actualizado' 	=> date('Y-m-d H:i:s')
		);

		if($this->juegos_model->modifica($datos_juego, $codigo))
		{
			// Alerta de que se realizó con éxito
		}
		else
		{
			// Alerta de que no se pudo realizar
		}

		redirect(base_url().'admin/juegos');
	}

	public function suspender(){
		$codigo = $this->uri->segment(5);

		$datos_juego = array(
			'estado' 		=> 0,
			'actualizado' 	=> date('Y-m-d H:i:s')
		);

		if($this->juegos_model->modifica($datos_juego, $codigo))
		{
			// Alerta de que se realizó con éxito
		}
		else
		{
			// Alerta de que no se pudo realizar
		}

		redirect(base_url().'admin/juegos');
	}

	public function lista()
	{
		$this->datatables->add_column('icono', '<i class="fa fa-circle"></i>', 'icono');
		$this->datatables->select('juegosonline_juegos.id as id,
			juegosonline_juegos.nombre as nombre,
			juegosonline_juegos.tipo_id as tipo_id,
			juegosonline_juegos.destacado as destacado,

			juegosonline_juegos_categorias.nombre as categoria_nombre,

			juegosonline_juegos.creado as creado,
			DATE_FORMAT(juegosonline_juegos.creado, "%d/%m/%Y") as creado_formateado,
			juegosonline_juegos.estado as estado');
		$this->datatables->from('juegosonline_juegos');
		$this->datatables->join('juegosonline_juegos_categorias', 'juegosonline_juegos_categorias.id = juegosonline_juegos.categoria_id');
		$this->datatables->where('juegosonline_juegos.estado !=', 2);

  		echo $this->datatables->generate();
	}
}
