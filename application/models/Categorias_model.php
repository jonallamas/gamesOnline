<?php
class Categorias_model extends CI_Model {

    private $tabla;

    public function __construct()
    {
        parent::__construct();
    }

    public function alta($data)
    {
        return $this->db->insert('juegosonline_juegos_categorias', $data);
    }

    public function modifica($data, $id)
    {
        $this->db->where('juegosonline_juegos_categorias.id', $id);

        return $this->db->update('juegosonline_juegos_categorias', $data);
    }

    public function obtener($categoria_id)
    {
        $this->db->select('juegosonline_juegos_categorias.*');
        $this->db->from('juegosonline_juegos_categorias');
        $this->db->where('juegosonline_juegos_categorias.id', $categoria_id);

        $query = $this->db->get();
        return $query->row();
    }

    public function obtener_todos()
    {
        $this->db->select('juegosonline_juegos_categorias.*');
        $this->db->from('juegosonline_juegos_categorias');
        $this->db->where('juegosonline_juegos_categorias.estado', 1);

        $query = $this->db->get();
        return $query->result();
    }
}
