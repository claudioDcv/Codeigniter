<?php
class MY_Email extends CI_Controller {
	public function __construct() {
		parent::__construct ();
	}

	// SUBIR CURRICULUM
	protected function enviar($email, $msg) {
		// cargamos la libreria email de ci
		$this->load->library ( "email" );



		$configGmail = array (
				'protocol' => 'smtp',
				'smtp_host' => '*',
				'smtp_port' => 25,
				'smtp_user' => '*',
				'smtp_pass' => '*',
				'mailtype' => 'html',
				'charset' => 'utf-8',
				'newline' => "\r\n"
		);

		// cargamos la configuración para enviar con gmail
		$this->email->initialize ( $configGmail );

		$this->email->from ( '*' );
		$this->email->to ( $email );
		$this->email->subject ( 'Verificación de Cuenta' );
		$this->email->message ( $msg );
		$this->email->send ();
		// con esto podemos ver el resultado
		//var_dump ( $this->email->print_debugger () );
	}
}
