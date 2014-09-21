<?php

/**
 * @name Error Helper Class
 * @package Logos Helper Layer
 * @version 0.0.1
 * @copyright (c) 2012 Mathew Kleppin
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 *
 */

/*
 * Loaded in class.database.php
 */

class e{
	public $message = 'error';
	public $type = 'none';

	/**
	 * Error exits, displaying the error on screen
	 * @access public
	 * @return none
	 */
	public static function error($m = '', $t = null){
		if($t == 'MYSQL'){
			exit($m.' '.mysql_errno().' '.mysql_error());
		}else{
			exit($m);
		}
	}

	/**
	 * Fail echos the error first (might be more AJAX safe), before exiting
	 * @access public
	 * @return none
	 */
	public static function fail($m = '', $t = null){
		if($t == 'MYSQL'){
			echo($m.' '.mysql_errno().' '.mysql_error());
			exit;
		}else{
			echo($m);
			exit;
		}
	}

	/**
	 * Tryquit will just echo the error and continue executing the script
	 * @access public
	 * @return none
	 */
	public static function tryquit($m = '', $t = null){
		if($t == 'MYSQL'){
			echo($m.' '.mysql_errno().' '.mysql_error());
		}else{
			echo($m);
		}
	}
}
?>