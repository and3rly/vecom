<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fusuario
{
	protected $ci;
	public $accion;
	public $registro;
	public $empresa;
	public $rol;

	public function __construct()
	{
        $this->ci =& get_instance();
        $this->datos = [];
        $this->label = ['class' => 'col-sm-2 control-label'];
	}

	public function set_registro($valor)
	{
		$this->registro = $valor;
	}
	
	public function set_accion($valor)
	{
		$this->accion = $valor;
	}

	public function set_rol($valor)
	{
		$this->rol = $valor;
	}

	public function set_empresa($valor)
	{
		$this->empresa = $valor;
	}

	private function open_form()
	{
		$this->datos['open_form'] = form_open(
			$this->accion, [
			'id' => 'formGuardar',
			'method' => 'post',
			'class' => 'form-horizontal']);
	}

	private function nombre()
	{
		$id   = 'nombre';
		$name = 'nombre';

		$this->datos['label_nombre'] = form_label(
			'Nombre', 
			$id, 
			$this->label);

		$this->datos['input_nombre'] = form_input([
			'name'  => $name,
			'value' => ($this->registro) ? $this->registro->$name : '',
			'id'    => $id,
			'class' =>'form-control']);
	}

	public function correo()
	{
		$id   = 'correo';
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

	private function alias()
	{
		$id   = 'alias';
		$name = 'alias';

		$this->datos['label_alias'] = form_label(
			'Alias ', 
			$id, 
			$this->label);

		$this->datos['input_alias'] = form_input([
			'name'  => $name,
			'value' => ($this->registro) ? $this->registro->$name : '',
			'id'    => $id,
			'class' => 'form-control']);
	}

	public function password()
	{
		$id   = 'password';
		$name = 'password';

		$this->datos['label_contrasenia'] = form_label(
			'Contraseña ',
			$id,
			$this->label);

		$this->datos['input_contrasenia'] = form_input([
			'name'  => $name,
			'value' => ($this->registro) ? $this->registro->$name : '',
			'id'    => $id,
			'type'  => 'password',
			'class' => 'form-control']);	
	}

	public function identificacion()
	{
		$id   = 'identificacion';
		$name = 'identificacion';

		$this->datos['label_identificacion'] = form_label(
			'Identificación ',
			$id,
			$this->label);

		$this->datos['input_identificacion'] = form_input([
			'name'  => $name,
			'value' => ($this->registro) ? $this->registro->$name : '',
			'id'    => $id,
			'class' => 'form-control']);
	}

	public function telefono()
	{
		$id   = 'telefono';
		$name = 'telefono';

		$this->datos['label_telefono'] = form_label(
			'Teléfono ',
			$id,
			$this->label);

		$this->datos['input_telefono'] = form_input([
			'name'  => $name,
			'value' => ($this->registro) ? $this->registro->$name : '',
			'id'    => $id,
			'class' => 'form-control']);
	}

	public function direccion()
	{
		$id   = 'direccion';
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

	private function rol_lista()
	{
		
		$this->datos['label_rol'] = form_label(
			'Rol ','lista_rol', 
			$this->label);

		$datos = opcionesCombo($this->rol, 'rol', 'nombre');
		$datos[''] = 'Seleccione un rol...';

		$this->datos['select_lista'] = form_dropdown(
			'rol', 
			$datos,
			($this->registro) ? $this->registro->rol : '', 
			['class' => 'form-control']);

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

	public function jefe()
	{
		$id   = 'jefe';
		$name = 'jefe';

		$this->datos['label_jefe'] = form_label(
			'Jefe ',
			$id,
			$this->label);

		$this->datos['input_jefe'] = form_checkbox(
			$name,
			1, 
			($this->registro && $this->registro->$name == 1) ? TRUE : FALSE);
	}

	public function subjefe()
	{
		$id   = 'subjefe';
		$name = 'subjefe';

		$this->datos['label_subjefe'] = form_label(
			'Sub-Jefe ',
			$id,
			$this->label);

		$this->datos['input_subjefe'] = form_checkbox(
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
		$this->correo();
		$this->alias();
		$this->password();
		$this->identificacion();
		$this->telefono();
		$this->direccion();
		$this->rol_lista();
		$this->empresa_lista();
		$this->jefe();
		$this->subjefe();
		$this->boton();
		$this->close_form();


		return $this->datos;
	}
}

/* End of file Fusuario.php */
/* Location: ./application/libraries/forms/Fusuario.php */
