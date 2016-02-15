<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Inicio extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		$this->load->library ( 'render' );
	}
	public function index() {
		$data = array (
				'title' => 'Pagina de Usuario',
				'posts' => array (
						array (
								'nombre' => 'post 1',
								'texto' => 'este es el texto de ejemplo'
						),
						array (
								'nombre' => 'post 2',
								'texto' => 'este es el texto de ejemplo'
						),
						array (
								'nombre' => 'post 3',
								'texto' => 'este es el texto de ejemplo'
						)
				),
				'user' => array (
						'name' => 'Claudio Rojas'
				)
		);

		$this->render->display ( 'index.html.twig', $data );
	}
}
