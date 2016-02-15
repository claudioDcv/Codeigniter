<?php
if (! defined ( 'BASEPATH' )) {
	exit ( 'No direct script access allowed' );
}
class Render {
	private $twig;
// 	private $h;
// 	private $context;
	public function __construct() {
		$loader = new Twig_Loader_String ();
		$loader = new Twig_Loader_Filesystem ( '../application/templates' );
		$this->twig = new Twig_Environment ( $loader, array (
				// 'cache' => '../application/cache/twig',
				// 'debug' => true
				'cache' => false,
				'debug' => true
		) );
		$this->twig->addExtension(new Twig_Extension_Debug());

		self::newFilterFunctionTwig ();
		// Fin Filtros
	}
	/**
	 *
	 * @author Claudio Rojas<claudio.dcv@gmail.com>
	 * @tutorial Metodo donde extendemos Twig
	 * @access private
	 * @param
	 *        	void
	 * @return boolean
	 *
	 */
	private function newFilterFunctionTwig() {
		// Nuevos filtro para Twig
		function twig_base_url($uri = '', $protocol = NULL) {
			return base_url ( $uri, $protocol );
		}
		$this->twig->addFunction ( 'base_url', new Twig_Function_Function ( 'twig_base_url' ) );
		//
		function twig_assets($uri = '', $protocol = NULL) {
			return base_url ( 'assets/' . $uri, $protocol );
		}
		$this->twig->addFunction ( 'assets', new Twig_Function_Function ( 'twig_assets' ) );
		//
		function twig_path_css($uri = '', $protocol = NULL) {
			return base_url ( 'assets/css/' . $uri, $protocol );
		}
		$this->twig->addFunction ( 'path_css', new Twig_Function_Function ( 'twig_path_css' ) );
		//
		function twig_path_js($uri = '', $protocol = NULL) {
			return base_url ( 'assets/js/' . $uri, $protocol );
		}
		$this->twig->addFunction ( 'path_js', new Twig_Function_Function ( 'twig_path_js' ) );
		// Si llega aqui es por que cargo todo
		return true;

	/**
	 * ********
	 */
	}
	public function display($name, array $context = array()) {
		$this->twig->display ( $name, $context );
	}
}
