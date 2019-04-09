<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empresa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mante/Empresa_model');
		$this->datos = [];
		$this->datos['scripts'] = array(
			(object) array('ruta' => 'public/js/mante.js', 'imp' => true));
	}

	public function index()
	{
		$this->datos['vista'] = 'mante/empresa/cuerpo';
		$this->datos['titulo']  = 'Empresas';
		$this->load->view('principal', $this->datos);
		
	}

	public function form($empresa='')
	{
		$e = new Empresa_model();
		$this->load->library('forms/Fempresa');

		$form = new Fempresa();
		$form->set_accion(base_url("index.php/mante/empresa/guardar_form/{$empresa}"));
		$form->set_pais($this->Config_model->get_pais());
		$form->set_moneda($this->Config_model->get_moneda());

		if ($e->empresa) {
			$form->set_registro($e->empresa);
		}

		$this->load->view('mante/empresa/form', [
			'form' => (object) $form->formulario()
		]);

	}

	public function guardar_form($empresa='')
	{
		$dato = array(
			'exito' => false, 
			'form'  => 3, 
			'lista' => 2);

		$config['upload_path'] = './uploads/img/';
        $config['allowed_types'] = 'gif|jpg|png';

        $this->load->library('upload',$config);

        if($this->upload->do_upload('logo')){
        	$dato["upload_data"] = $this->upload->data();        	
        }else{
        	$dato['error'] = $this->upload->display_errors();
        }

        if (elemento($_POST, 'nombre') && 
			elemento($_POST, 'direccion') && 
			elemento($_POST, 'telefono') && 
			elemento($_POST, 'representante') && 
			elemento($_POST, 'nit') && 
			elemento($_POST, 'abreviatura') && 
			elemento($_POST, 'iva') && 
			elemento($_POST, 'moneda') &
			elemento($_POST, 'empresa')) {

			$e = new Empresa_model($empresa);

			if ($e->guardarEmpresa($_POST)) {
			
 				$dato['mensaje'] = 'El usuario fue ingresado correctamente';
				$dato['exito']   = 1;
				$dato['registro'] = $e->empresa->empresa;
				
			} else {
				$dato['mensaje'] = 'Intente guardar de nuevo el usuario';
			}

		} else {
			$dato['mensaje'] = 'Hacen falta datos para continuar';
 		}

 		enviarJson($dato);


		
	}

	

}

/* End of file Empresa.php */
/* Location: ./application/controllers/mantenimiento/Empresa.php */