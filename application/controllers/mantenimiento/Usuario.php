<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mantenimiento/Usuario_model');
		$this->datos = [];
		$this->datos['scripts'] = array(
			(object) array('ruta' => 'public/js/mante.js', 'imp' => true));
	}

	public function index()
	{
		$this->datos['vista'] = 'usuario/cuerpo';
		$this->datos['titulo']  = 'Usuarios';
		$this->load->view('principal', $this->datos);
		
	}

	public function form($usuario="")
	{
		$u = new Usuario_model($usuario);

		$this->load->library('forms/Fusuario');

		$form = new Fusuario();
		$form->set_accion(base_url("index.php/mantenimiento/usuario/guardar_form/{$usuario}"));
		$form->set_rol($this->Config_model->get_rol());
		$form->set_empresa($this->Config_model->get_empresa());

		if ($u->usuario) {
			$form->set_registro($u->usuario);
		}
		
		$this->load->view('usuario/form', [
			'form' => (object) $form->formulario()
		]);
	}

	public function guardar_form($usuario="")
	{

		$dato = array(
			'exito' => false, 
			'form'  => 1, 
			'lista' => 2);

		if (elemento($_POST, 'nombre') && 
			elemento($_POST, 'correo') && 
			elemento($_POST, 'alias') && 
			elemento($_POST, 'password') && 
			elemento($_POST, 'identificacion') && 
			elemento($_POST, 'telefono') && 
			elemento($_POST, 'direccion') && 
			elemento($_POST, 'rol') && 
			elemento($_POST, 'empresa')) {

			$u = new Usuario_model($usuario);

			if ($u->guardarUsuario($_POST)) {
				$dato['mensaje'] = 'El usuario fue ingresado correctamente';
				$dato['exito']   = 1;
				$dato['registro'] = $u->usuario->usuario;

			} else {
				$dato['mensaje'] = 'Intente guardar de nuevo el usuario';
			}

		} else {
			$dato['mensaje'] = 'Hacen falta datos para continuar';
 		}

 		enviarJson($dato);
	}

	public function ver_lista()
	{
		$this->load->view('usuario/lista', [
			'resultado' => $this->Usuario_model->get_usuarios()
		]);
	}

	public function anularusuario()
	{
		$dato = array(
			'exito' => false, 
			'lista' => 2);

		if (elemento($_POST, 'usuario')) {
			$u = new Usuario_model($_POST['usuario']);

			if ($u->guardarUsuario(['anulado' => true])) {
				$dato['mensaje'] = 'El usuario fue dado de baja correctamente';
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

/* End of file Usuario.php */
/* Location: ./application/controllers/Usuario.php */