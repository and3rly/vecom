<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fcliente
{
	protected $ci;
	public $cliente_tipo;
	public $registro;
	public $accion;
	public $empresa;

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

	public function set_cliente_tipo($valor)
	{
		$this->cliente_tipo = $valor;
	}

	public function set_empresa($valor)
	{
		$this->empresa = $valor;
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

	private function correo()
	{
		$id = 'correo';
		$name = 'correo';

		$this->datos['label_correo'] = form_label(
			'Correo ',
			$id,
			$this->label);

		$this->datos['input_correo'] = form_input([
			'name'  => $name,
			'value' => ($this->registro) ? $this->registro->$name : '',
			'id'    => $id,
			'class' => 'form-control']);
	}

	private function cliente_tipo_lista()
	{
		
		$this->datos['label_tipo'] = form_label(
			'Tipo cliente ','label_tipo', 
			$this->label);

		$datos = opcionesCombo($this->cliente_tipo, 'cliente_tipo', 'nombre');
		$datos[''] = 'Seleccione un tipo de cliente...';

		$this->datos['select_tipo'] = form_dropdown(
			'cliente_tipo', 
			$datos,
			($this->registro) ? $this->registro->cliente_tipo : '', 
			['class' => $this->clase]);

	}

	private function empresa_lista()
	{
		$this->datos['label_empresa'] = form_label(
			'Empresa',
			'lista_empresa',
			$this->label);

		$datos  = opcionesCombo($this->empresa, 'empresa', 'nombre');
		$datos[''] = 'Seleccione una empresa...';

		$this->datos['select_empresa'] = form_dropdown(
			'empresa',
			$datos, 
			($this->registro) ? $this->registro->empresa:  '',
			['class' => 'form-control']);

	}

	private function aplica_descuento()
	{	
		$id = 'aplica_descuento';
		$name = 'aplica_descuento';

		$this->datos['label_aplica_descuento'] = form_label(
			'Aplica descuento ',
			$id,
			$this->label);

		$this->datos['input_apdesc'] = form_checkbox(
			$name,
			1, 
			($this->registro && $this->registro->$name == 1) ? TRUE : FALSE);
	}

	private function monto_descuento()
	{
		$id = 'monto_descuento';
		$name = 'monto_descuento';

		$this->datos['label_monto_descuento'] = form_label(
			'Monto descuento ',
			$id,
			$this->label);

		$this->datos['input_monto_descuento'] = form_input([
			'name'  => $name,
			'value' => ($this->registro) ? $this->registro->$name : '',
			'id'    => $id,
			'class' => 'form-control']);
	}

	private function aplica_iva()
	{	
		$id = 'aplica_iva';
		$name = 'aplica_iva';

		$this->datos['label_iva'] = form_label(
			'Aplica Iva ',
			$id,
			$this->label);

		$this->datos['input_iva'] = form_checkbox(
			$name,
			1, 
			($this->registro && $this->registro->$name == 1) ? TRUE : FALSE);
	}

	private function activo()
	{	
		$id = 'activo';
		$name = 'activo';

		$this->datos['label_activo'] = form_label(
			'Activo ',
			$id,
			$this->label);

		$this->datos['input_activo'] = form_checkbox(
			$name,
			1, 
			($this->registro && $this->registro->$name == 1) ? TRUE : FALSE);
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
		$this->correo();
		$this->nit();
		$this->aplica_descuento();
		$this->aplica_iva();
		$this->monto_descuento();
		$this->cliente_tipo_lista();
		$this->empresa_lista();
		$this->activo();
		$this->boton();
		$this->close_form();

		return $this->datos;
	}

	

}

/* End of file Fempresa.php */
/* Location: ./application/libraries/forms/Fempresa.php */
