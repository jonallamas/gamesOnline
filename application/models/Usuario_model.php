<?php

class Usuario_model extends CI_Model {

    // private $tabla;

    public function __construct()
    {
        parent::__construct();
        // $this->tabla  = 'juegosonline_usuarios';
    }

    public function alta($data)
    {
        return $this->db->insert('juegosonline_usuarios', $data);
    }

    public function modifica($data, $codigo)
    {
        $this->db->where('juegosonline_usuarios.id', $id);

        return $this->db->update('juegosonline_usuarios', $data);
    }

    public function obtener($id)
    {
        $this->db->select('juegosonline_usuarios.*');
        $this->db->from('juegosonline_usuarios');
        $this->db->where('juegosonline_usuarios.id', $id);

        $query = $this->db->get();
        return $query->row();
    }

    // public function validar_usuario($usuario)
    // {
    //     $this->db->select($this->tabla.'.*');
    //     $this->db->from($this->tabla);
    //     $this->db->where($this->tabla.'.usuario', $usuario);
    //     $query = $this->db->get();
    //     return $query->row();
    // }

    public function validar_correo($correo)
    {
        $this->db->select('juegosonline_usuarios.*');
        $this->db->from('juegosonline_usuarios');
        $this->db->where('juegosonline_usuarios.correo', $correo);

        $query = $this->db->get();
        return $query->row();

    }

    public function validar_cuenta($keymaster)
    {
        $this->db->select('juegosonline_usuarios.*');
        $this->db->from('juegosonline_usuarios');
        $this->db->where('juegosonline_usuarios.keymaster', $keymaster);

        $query = $this->db->get();
        return $query->row();
    }
    
    public function login($correo, $password)
    {
        $this->db->select('juegosonline_usuarios.*');
        $this->db->from('juegosonline_usuarios');
        $this->db->where('juegosonline_usuarios.log_correo', $correo);
        $this->db->where('juegosonline_usuarios.log_pass', $password);
        $this->db->limit(1);

        $query = $this->db->get();
        return $query->row();
    }

}
