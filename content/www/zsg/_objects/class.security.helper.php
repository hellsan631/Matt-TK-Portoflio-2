<?php

	/**
	 * @name Security Class
	 * @package Logos Security Layer
	 * @version 0.0.1
	 * @copyright (c) 2012 Mathew Kleppin
	 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
	 * @TODO switch over to using bcrypt hashing algorthem
	 */

	/*
	 * Combines all of the methods uses to hash and decrypt data
	 * Loaded in class.user.php
	 */

class s{

	private static $type = 'MD5';
	//MD5, SHA1, SHA256, SHA512

	public static function hash($data){

		return hash(self::$type, $data);

	}

	public static function add_salt($data, $salt){

		return hash(self::$type, $salt.$data);

	}

	public static function compare_salt($data, $salt, $compareTo){

		if(self::add_salt($data, $salt) === $compareTo){
			return true;
		}

		return false;

	}

}
?>