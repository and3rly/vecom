<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente_model extends CI_Model {

	public $cliente = NULL;

	public function __construct($id="")
	{
			if (!empty($id)) {
			$this->verCliente($id);
		}
	}	

	public function verCliente($id)
	{
		$this->cliente = $this->db
							  ->where("cliente", $id)
							  ->get("cliente")
							  ->row();	 
	}

	public function guardarCliente($args=[])
	{
		if (elemento($args, 'nombre')) {
			$this->db->set('nombre', $args['nombre']);
		}

		if (elemento($args, 'nit')){
			$this->db->set('nit', $args['nit']);
		}

		if (elemento($args, 'direccion')){
			$this->db->set('direccion', $args['direccion']);
		}

		if (elemento($args, 'telefono')){
			$this->db->set('telefono', $args['telefono']);
		}
		if (elemento($args, 'correo')){
			$this->db->set('correo', $args['correo']);
		}

		if (elemento($args, 'cliente_tipo')){
			$this->db->set('cliente_tipo', $args['cliente_tipo']);
		}

		$this->db->set('aplica_descuento', elemento($args, 'aplica_descuento', 0));

		if (elemento($args, 'monto_descuento')){
			$this->db->set('monto_descuento', $args['monto_descuento']);
		}			

		$this->db->set('aplica_iva', elemento($args, 'aplica_iva', 0));	
		
		if (elemento($args, 'anulado')){
			$this->db->set('activo', 0);
		}

		if (elemento($args, 'empresa')){
			$this->db->set('empresa', $args['empresa']);
		}	

		$this->db->set('usuario',$_SESSION['UserID']);

		if ($this->cliente === NULL) {
			$this->db->insert('cliente');

			if ($this->db->affected_rows() > 0) {
				$this->verCliente($this->db->insert_id());
				return true;
			}

		} else {

			$this->db->where('cliente',$this->cliente->cliente)
					 ->update('cliente');	

			if ($this->db->affected_rows() > 0) {
				$this->verCliente($this->cliente->cliente);
				return true;
			}	 
		}

		return false;
	
	}

	public function get_clientes()
	{
		$tmp = $this->db->select('a.*, b.nombre as empresa, c.nombre as cliente_tipo')
						->from('cliente a')
						->join('empresa b','b.empresa = a.empresa')
						->join('cliente_tipo c','c.cliente_tipo = a.cliente_tipo')
						->where('a.activo', 1)
						->get();

		if ($tmp->num_rows() > 0) {
			return $tmp->result();
		}else{
			return false;
		}
		
	}

}

/* End of file Cliente_model.php */
/* Location: ./application/models/mantenimiento/Cliente_model.php */ 