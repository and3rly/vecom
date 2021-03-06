<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Config_model extends CI_Model 
{

	public function get_rol($args=[])
	{
		if (isset($args['rol'])) {
			$this->db->where('rol', $args['rol']);
		}

		$tmp = $this->db
					->get('rol');

		if (isset($args['uno'])) {
			return $tmp->row();
		} else {
			return $tmp->result();
		}

		return false;
	}

	public function get_empresa($args=[])
	{
		if(isset($args['empresa'])){
			$this->db->where('empresa',$args['empresa']);
		}

		$tmp = $this->db
					->get('empresa');

		if (isset($args['uno'])) {
			return $tmp->row();
		}else{
			return $tmp->result();
		}

		return false;
	}

	public function get_moneda($args=[])
	{
		if(isset($args['moneda'])){
			$this->db->where('moneda',$args['moneda']);
		}

		$tmp = $this->db
					->get('moneda');

		if (isset($args['uno'])) {
			return $tmp->row();
		}else{
			return $tmp->result();
		}

		return false;
	}

	public function get_pais($args=[])
	{
		if (isset($args['pais'])) {
			$this->db->where('pais', $args['pais']);
		}

		$tmp = $this->db
					->get('pais_empresa');

		if (isset($args['uno'])) {
			return $tmp->row();
		}else{
			return $tmp->result();
		}

		return false;
	}
	
	public function get_cliente_tipo($args=[])
	{
		if (isset($args['cliente_tipo'])) {
			$this->db->where('cliente_tipo', $args['cliente_tipo']);
		}

		$tmp = $this->db
					->get('cliente_tipo');

		if (isset($args['uno'])) {
			return $tmp->row();
		}else{
			return $tmp->result();
		}

		return false;
	}

}

/* End of file Config_model.php */
/* Location: ./application/models/Config_model.php */