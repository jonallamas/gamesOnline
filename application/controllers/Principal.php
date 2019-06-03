<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller {

	private $request;
	public function __construct(){
		parent::__construct();

		$this->load->helper('url_helper');

		$this->load->model('principal_model');
		$this->load->model('juegos_model');
	}

	public function index()
	{
		$this->data_header['juegos_destacados'] = $this->juegos_model->obtener_todos_destacados();
		$this->data_header['juegos_recientes'] = $this->juegos_model->obtener_todos_recientes();
		
		$this->load->view('template/header', $this->data_header);
		$this->load->view('template/mobile');
		$this->load->view('template/footer');
	}

	public function descripcion($slug = NULL)
	{
		$slug = $this->uri->segment(2);
		$juego = $this->principal_model->obtener_juego($slug);
		if (empty($juego))
		{
		    show_404();
		}
		$this->data_header['juego'] = $juego;
		$this->data_header['titulo_web'] = $juego->nombre;

		$this->load->view('template/header', $this->data_header);
		$this->load->view('template/movil_v1/descripcion_juego');
		$this->load->view('template/footer');
	}

	public function juego($slug = NULL)
	{
		$codigo = $this->uri->segment(2);
		$juego = $this->principal_model->obtener_juego_codigo($codigo);

		if (empty($juego))
		{
		    show_404();
		}
		$this->data_header['juego'] = $juego;

		$this->load->view('template/movil_v1/juego', $this->data_header);
	}
}
