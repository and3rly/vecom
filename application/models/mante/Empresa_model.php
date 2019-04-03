<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empresa_model extends CI_Model {

	public $empresa = NULL;

	public function __construct($id="")
	{
		if (!empty($id)) {
			$this->verEmpresa($id);
		}
	}	

	public function verEmpresa($id)
	{
		$this->empresa = $this->db
							  ->where("empresa", $id)
							  ->get("empresa")
							  ->row();	 
	}

	public function guardarEmpresa($args=[])
	{
		if (elemento($args, 'nombre')) {
			$this->db->set('nombre', $args['nombre']);
		}

		if (elemento($args, 'direccion')){
			$this->db->set('direccion', $args['direccion']);
		}

		if (elemento($args, 'telefono')){
			$this->db->set('telefono', $args['telefono']);
		}
		if (elemento($args, 'representante')){
			$this->db->set('representante', $args['representante']);
		}

		if (elemento($args, 'nit')){
			$this->db->set('nit', $args['nit']);
		}

		if (elemento($args, 'abreviatura')){
			$this->db->set('abreviatura', $args['abreviatura']);
		}


		$this->db->set('iva', elemento($args, 'iva', 0));
		

		
		$this->db->set('logo', $args['logo']);

		
		
		if (elemento($args, 'pais')){
			$this->db->set('pais', $args['pais']);
		}

		if (elemento($args, 'moneda')){
			$this->db->set('moneda', $args['moneda']);
		}

		if (elemento($args, 'anulado')){
			$this->db->set('activo', 0);
		}

		if ($this->usuario === NULL) {
			$this->db->insert('empresa');

			if ($this->db->affected_rows() > 0) {
				$this->verEmpresa($this->db->insert_id());
				return true;
			}

		} else {

			$this->db->where('empresa',$this->empresa->empresa)
					 ->update('empresa');	

			if ($this->db->affected_rows() > 0) {
				$this->verEmpresa($this->empresa->empresa);
				return true;
			}	 
		}

		return false;
	
	}

}

/* End of file Empresa_model.php */
/* Location: ./application/models/mantenimiento/Empresa_model.php */