<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

	public $usuario = NULL;

	public function __construct($id="")
	{
		if (!empty($id)) {
			$this->verUsuario($id);
		}
	}	

	public function verUsuario($id)
	{
		$this->usuario = $this->db
							  ->where("usuario", $id)
							  ->get("usuario")
							  ->row();	 
	}

	public function guardarUsuario($args=[])
	{
		if (elemento($args, 'nombre')) {
			$this->db->set('nombre', $args['nombre']);
		}

		if (elemento($args, 'correo')){
			$this->db->set('correo', $args['correo']);
		}

		if (elemento($args, 'alias')){
			$this->db->set('alias', $args['alias']);
		}
		if (elemento($args, 'password')){
			$this->db->set('password', $args['password']);
		}

		if (elemento($args, 'identificacion')){
			$this->db->set('identificacion', $args['identificacion']);
		}

		if (elemento($args, 'telefono')){
			$this->db->set('telefono', $args['telefono']);
		}

		if (elemento($args, 'direccion')){
			$this->db->set('direccion', $args['direccion']);
		}

		#if (elemento($args, 'jefe')){
			$this->db->set('jefe', elemento($args, 'jefe', 0));
		#}

		#if (elemento($args, 'subjefe')){
			$this->db->set('subjefe',elemento($args, 'subjefe', 0));
		#}

		if (elemento($args, 'rol')){
			$this->db->set('rol', $args['rol']);
		}

		if (elemento($args, 'empresa')){
			$this->db->set('empresa', $args['empresa']);
		}

		if (elemento($args, 'anulado')){
			$this->db->set('activo', 0);
		}

		if ($this->usuario === NULL) {
			$this->db->insert('usuario');

			if ($this->db->affected_rows() > 0) {
				$this->verUsuario($this->db->insert_id());
				return true;
			}

		} else {

			$this->db->where('usuario',$this->usuario->usuario)
					 ->update('usuario');	

			if ($this->db->affected_rows() > 0) {
				$this->verUsuario($this->usuario->usuario);
				return true;
			}	 
		}

		return false;
	
	}

	public function get_usuarios()
	{
		$tmp = $this->db->select('a.*, b.nombre as nempresa, c.nombre as nrol')
						->from('usuario a')
						->join('empresa b','b.empresa = a.empresa')
						->join('rol c','c.rol = a.rol')
						->where('a.activo', 1)
						->get();

		if ($tmp->num_rows() > 0) {
			return $tmp->result();
		}else{
			return false;
		}
		
	}

}

/* End of file Usuario_mode.php */
/* Location: ./application/models/mantenimiento/Usuario_mode.php */