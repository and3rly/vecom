<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mantenimiento/Cliente_model');
		$this->datos = [];
		$this->datos['scripts'] = array(
			(object) array('ruta' => 'public/js/mante.js', 'imp' => true));
	}

	public function index()
	{
		$this->datos['vista'] = 'mantenimiento/cliente/cuerpo';
		$this->datos['titulo']  = 'Clientes';
		$this->load->view('principal', $this->datos);
	}

	public function form($cliente='')
	{
		$c = new Cliente_model($cliente);
		$this->load->library('forms/Fcliente');

		$form = new Fcliente();
		$form->set_accion(base_url("index.php/mantenimiento/cliente/guardar_form/{$cliente}"));
		$form->set_cliente_tipo($this->Config_model->get_cliente_tipo());
		$form->set_empresa($this->Config_model->get_empresa());

		if ($c->cliente) {
			$form->set_registro($c->cliente);
		}

		$this->load->view('mantenimiento/cliente/form', [
			'form' => (object) $form->formulario()
		]);

	}

	public function guardar_form($cliente='')
	{
		$dato = array(
			'exito' => false, 
			'form'  => 5, 
			'lista' => 6);
	
        if (elemento($_POST, 'nombre') &&
        	elemento($_POST, 'nit') &&  
			elemento($_POST, 'direccion') && 
			elemento($_POST, 'telefono') && 
			elemento($_POST, 'correo') && 
			elemento($_POST, 'cliente_tipo') && 
			elemento($_POST, 'activo') &
			elemento($_POST, 'empresa')) {

			$c = new Cliente_model($cliente);

			if ($c->guardarCliente($_POST)) {
			
 				$dato['mensaje'] = 'El cliente fue ingresado correctamente';
				$dato['exito']   = 1;
				$dato['registro'] = $c->cliente->cliente;
				
			} else {
				$dato['mensaje'] = 'Intente guardar de nuevo el cliente';
			}

		} else {
			$dato['mensaje'] = 'Hacen falta datos para continuar';
 		}

 		enviarJson($dato);

	}

	public function ver_lista_clientes()
	{
		$this->load->view('mantenimiento/cliente/lista', [
			'resultado' => $this->Cliente_model->get_clientes()
		]);
	}

	public function anulacliente()
	{
		$dato = array(
			'exito' => false, 
			'lista' => 6);

		if (elemento($_POST, 'cliente')) {
			$c = new Cliente_model($_POST['cliente']);

			if ($c->guardarCliente(['anulado' => true])) {
				$dato['mensaje'] = 'El cliente fue dado de baja correctamente';
				$dato['exito']   = 1;
			} else {
				$dato['mensaje'] = 'Intente de nuevo anular al usuario';
 			}
		} else {
			$dato['mensaje'] = 'Por favor, seleccione un usuario de la lista';
		}
			
		enviarJson($dato);
		
	}
}

/* End of file Cliente.php */
/* Location: ./application/controllers/mantenimiento/Cliente.php */
