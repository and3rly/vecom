<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sesion extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Sesion_model');
		$this->datos = array();
		$this->datos['scripts'] = array(
			(object) array('ruta' => 'public/js/sesion.js', 'imp' => true));
	}

	public function index()
	{
		if(login()){
			redirect('principal');
			
		}else{
			$this->datos['accion'] = base_url('index.php/sesion/verificar_sesion');
			$this->datos['vista']  = 'sesion/cuerpo';

			$this->load->view('sesion/cuerpo',$this->datos);
		}
		
	}

	public function verificar_sesion()
	{
		$dato = ['exito' => false];

		if (elemento($_POST, 'usuario') && elemento($_POST, 'password')) {

			$us = new Sesion_model();
			$registro = $us->verificar_datos($_POST);
			
			

			if ($registro) {
				$_SESSION['UserID'] = $registro->usuario;
				$_SESSION['UserName'] = $registro->nombre;
				
				$dato['exito'] = true;
				$dato['url']   = base_url('index.php/principal/');

			} else {
				$dato['mensaje'] = 'Usuario o contraseña incorrectos';
			}

		} else {
			$dato['mensaje'] = 'Es necesario ingresar el usuario y contraseña';
		}

		enviarJson($dato);
		
	}

	public function cerrar_sesion()
	{
		session_destroy();
		redirect(base_url());	
	}

}

/* End of file Sesion.php */
/* Location: ./application/controllers/Sesion.php */