<?php
	/**
	 * @name Logos Main Setup Method
	 * @package Logos Main Package
	 * @version 0.0.1
	 * @copyright (c) 2012 Mathew Kleppin
	 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
	 */

class logos{

	private $data;

	public function __construct($root_path = './'){

		$data = array(
				'logos' => true,
				'root_path' => $root_path,
				'class_path' => '_objects/',
				'function_path' => 'functions/',
				'template_path' => 'functions/templates/',
				'listener_path' => '_listeners/'
		);

		$this->build($data);
	}

	public static function build(array $data){
		define('LOGOS', $data['logos']);
		define('ROOT_PATH',  $data['root_path']);
		define('CLASS_PATH', $data['class_path']);
		define('FUNC_PATH', $data['function_path']);
		define('TEMPL_PATH', $data['template_path']);
		define('LISTN_PATH', $data['listener_path']);
	}

}

?>