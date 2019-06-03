<?php
class Principal_model extends CI_Model {
    
    private $tabla;
    public function __construct()
    {
        parent::__construct();
    }
    
    // public function alta($data)
    // {
    //     return $this->db->insert('', $data);
    // }
    
    // public function modifica($data, $id)
    // {
    //     $this->db->where('.id', $id);
    //     return $this->db->update('', $data);
    // }
    
    public function obtener_juego($slug)
    {
        $this->db->select('juegosonline_juegos.*,
            juegosonline_juegos_categorias.nombre as categoria_nombre');
        $this->db->from('juegosonline_juegos');
        $this->db->join('juegosonline_juegos_categorias', 'juegosonline_juegos.categoria_id = juegosonline_juegos_categorias.id');
        $this->db->where('juegosonline_juegos.slug', $slug);
        $query = $this->db->get();
        return $query->row();
    }

    public function obtener_juego_codigo($codigo)
    {
        $this->db->select('juegosonline_juegos.nombre,
            juegosonline_juegos.url_juego');
        $this->db->from('juegosonline_juegos');
        $this->db->where('juegosonline_juegos.codigo', $codigo);
        $query = $this->db->get();
        return $query->row();
    }
}