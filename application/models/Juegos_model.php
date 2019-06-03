<?php
class Juegos_model extends CI_Model {

    private $tabla;

    public function __construct()
    {
        parent::__construct();
    }

    public function alta($data)
    {
        return $this->db->insert('juegosonline_juegos', $data);
    }

    public function modifica($data, $id)
    {
        $this->db->where('juegosonline_juegos.id', $id);

        return $this->db->update('juegosonline_juegos', $data);
    }

    public function obtener($juego_id)
    {
        $this->db->select('juegosonline_juegos.*,
            juegosonline_juegos_categorias.nombre as categoria_nombre');
        $this->db->from('juegosonline_juegos');
        $this->db->join('juegosonline_juegos_categorias', 'juegosonline_juegos.categoria_id = juegosonline_juegos_categorias.id');
        $this->db->where('juegosonline_juegos.id', $juego_id);

        $query = $this->db->get();
        return $query->row();
    }

    public function obtener_todos()
    {
        $this->db->select('juegosonline_juegos.*');
        $this->db->from('juegosonline_juegos');
        $this->db->where('juegosonline_juegos.estado', 1);

        $query = $this->db->get();
        return $query->result();
    }

    public function obtener_todos_destacados()
    {
        $this->db->select('juegosonline_juegos.*');
        $this->db->from('juegosonline_juegos');
        $this->db->where('juegosonline_juegos.estado', 1);
        $this->db->where('juegosonline_juegos.destacado', 1);
        $this->db->limit(4);

        $query = $this->db->get();
        return $query->result();
    }

    public function obtener_todos_recientes()
    {
        $this->db->select('juegosonline_juegos.*');
        $this->db->from('juegosonline_juegos');
        $this->db->where('juegosonline_juegos.estado', 1);
        $this->db->where('juegosonline_juegos.destacado', 0);
        $this->db->order_by('juegosonline_juegos.creado', 'desc');

        $query = $this->db->get();
        return $query->result();
    }
}
