<?php

/**
 * Contacto class.
 * Contacto is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class Contacto extends CFormModel
{
	public $nombre;
	public $telefono;
	public $email;
	public $mensaje;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			array('nombre, email, mensaje', 'required'),
			array('telefono', 'length', 'allowEmpty'=>true),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'nombre' => 'Nombre',
			'telefono' => 'Teléfono',
			'email' => 'E-mail',
			'mensaje' => 'Mensaje',
		);
	}
}
