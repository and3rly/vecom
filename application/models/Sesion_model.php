<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sesion_model extends CI_Model {



	public function verificar_datos($args=[])
	{
		$tmp = $this->db
					->where('alias', $args['usuario'])
					->where('password', $args['password'])
					->get('usuario');

		if ($tmp->num_rows() > 0) {
			return $tmp->row();
		}

		return false;
	}

	

}

/* End of file Usuario_model.php */
/* Location: ./application/models/Usuario_model.php */