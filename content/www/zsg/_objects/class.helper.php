<?php

/**
 * @name Helper Class
 * @package Logos Helper Layer
 * @version 0.0.1
 * @copyright (c) 2012 Mathew Kleppin
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 */

/*
 * Contains any methods used throughout multiple different pages that are globally defined
 * Loaded in class.database.php
 */


class h{

	public $vars = '';
	public $state = false;

	/**
	 * Returns the mysql_real_escape_string version of the input string
	 * @access public
	 * @return string
	 */
	public static function clean($var = self::vars){
		try{
			return mysql_real_escape_string($var);
		}catch(Exception $e){
			e::error($e->getMessage());
		}
	}

	/**
	 * Returns the htmlspecialcharacters version of the input string
	 * @access public
	 * @return string
	 */
	public static function scrub($var = self::vars){
		try{
			return mysql_real_escape_string($var);
		}catch(Exception $e){
			e::error($e->getMessage());
		}
	}

	/**
	 * Trys to clean and scrub a var, and returns it afterwards
	 * @access public
	 * @return string
	 */
	public static function shine($var = self::vars){
		try{
			return self::scrub(self::clean($var));
		}catch(Exception $e){
			e::error($e->getMessage());
		}
	}

}

?>