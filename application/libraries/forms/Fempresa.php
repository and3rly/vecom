<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fempresa
{
	protected $ci;
	public $pais;
	public $registro;
	public $accion;
	public $moneda;

	public function __construct()
	{
        $this->ci =& get_instance();
        $this->datos = [];      
        $this->label = ['class' => 'col-sm-2 control-label'];
        $this->clase = 'form-control';
	}

	public function set_registro($valor)
	{
		$this->registro = $valor;
	}

	public function set_accion($valor)
	{
		$this->accion = $valor;
	}

	public function set_pais($valor)
	{
		$this->pais = $valor;
	}

	public function set_moneda($valor)
	{
		$this->moneda = $valor;
	}

	private function open_form()
	{
		$this->datos['open_form'] = form_open(
			$this->accion,[
			'id'     => 'formGuardar',
			'method' => 'post',
			'class'  => 'form-horizontal']);
	}

	private function nombre()
	{
		$id   = 'nombre';
		$name = 'nombre';

		$this->datos['label_nombre'] = form_label(
			'Nombre ',
			$id, 
			$this->label);

		$this->datos['input_nombre'] = form_input([
			'name'  => $name,
			'value' => ($this->registro) ? $this->registro->$name : '',
			'id'    => $id,
			'class' => 'form-control']);
	}

	private function direccion()
	{
		$id = 'direccion';
		$name = 'direccion';

		$this->datos['label_direccion'] = form_label(
			'Dirección ',
			$id,
			$this->label);

		$this->datos['input_direccion'] = form_input([
			'name'  => $name,
			'value' => ($this->registro) ? $this->registro->$name : '',
			'id'    => $id,
			'class' => 'form-control']);	

	}

	private function telefono()
	{
		$id = 'telefono';
		$name = 'telefono';

		$this->datos['label_telefono'] = form_label(
			'Teléfono ',
			$id,
			$this->label);

		$this->datos['input_telefono'] = form_input([
			'name' => $name,
			'value' => ($this->registro) ? $this->registro->$name : '',
			'id' => $id,
			'class' => 'form-control']);
	}

	private function representante()
	{
		$id = 'representante';
		$name = 'representante';

		$this->datos['label_representante'] = form_label(
			'Representante ',
			$id,
			$this->label);

		$this->datos['input_representante'] = form_input([
			'name'  => $name,
			'value' => ($this->registro) ? $this->registro->$name : '',
			'id'    => $id,
			'class' => 'form-control']);
	}

	private function nit()
	{
		$id = 'nit';
		$name = 'nit';

		$this->datos['label_nit'] = form_label(
			'Nit ', 
			$id,
			$this->label);

		$this->datos['input_nit'] = form_input([
			'name' => $name,
			'value' => ($this->registro) ? $this->registro->$name : '',
			'id' => $id,
			'class' => $this->clase]);
	}

	private function abreviatura()
	{
		$id = 'abreviatura';
		$name = 'abreviatura';

		$this->datos['label_abreviatura'] = form_label(
			'Abreviatura ',
			$id,
			$this->label);

		$this->datos['input_abreviatura'] = form_input([
			'name' => $name,
			'value' => ($this->registro) ? $this->registro->$name : '',
			'id' => $id,
			'class' => $this->clase]);
	}

	private function iva()
	{	
		$id = 'iva';
		$name = 'iva';

		$this->datos['label_iva'] = form_label(
			'Aplica Iva ',
			$id,
			$this->label);

		$this->datos['input_iva'] = form_checkbox(
			$name,
			1, 
			($this->registro && $this->registro->$name == 1) ? TRUE : FALSE);
	}

	private function logo()
	{
		$id = 'logo';
		$name = 'logo';

		$this->datos['label_logo'] = form_label(
			'Logo ',
			$id,
			$this->label);

		$this->datos['input_logo'] = form_input([
			'name' => $name,
			'value' => ($this->registro) ? $this->registro->$name : '', 
			'id' => $id,
			'type' =>'file',
			$this->clase]);
	}

	private function pais_lista()
	{
		
		$this->datos['label_pais'] = form_label(
			'País ','lista_pais', 
			$this->label);

		$datos = opcionesCombo($this->pais, 'pais_empresa', 'nombre');
		$datos[''] = 'Seleccione un país...';

		$this->datos['select_pais'] = form_dropdown(
			'pais', 
			$datos,
			($this->registro) ? $this->registro->pais : '', 
			['class' => $this->clase]);

	}

	private function moneda_lista()
	{
		
		$this->datos['label_moneda'] = form_label(
			'Moneda ','lista_moneda', 
			$this->label);

		$datos = opcionesCombo($this->moneda, 'moneda', 'nombre');
		$datos[''] = 'Seleccione una moneda';

		$this->datos['select_moneda'] = form_dropdown(
			'moneda', 
			$datos,
			($this->registro) ? $this->registro->pais : '', 
			['class' => $this->clase]);

	}

	private function boton()
	{

		$this->datos['boton_submit'] = form_button(
			array(
				"id"      => "btnGuardar",
				"type"    => "submit",
				"class"   => "btn btn-sm btn-primary btn-block"),
				"<i class ='glyphicon glyphicon-floppy-disk'></i> Guardar");
	}

	private function close_form()
	{
		$this->datos['close_form'] = form_close();
	}


	public function formulario()
	{
		$this->open_form();
		$this->nombre();
		$this->direccion();
		$this->telefono();
		$this->representante();
		$this->nit();
		$this->abreviatura();
		$this->iva();
		$this->logo();
		$this->pais_lista();
		$this->moneda_lista();
		$this->boton();
		$this->close_form();
		


		return $this->datos;
	}

	

}

/* End of file Fempresa.php */
/* Location: ./application/libraries/forms/Fempresa.php */
