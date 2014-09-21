<?php

/**
 * Version Changelog
 * 0.0.1 - Initial Version
 * 0.0.2 - 	Added "last_id", Does a MYSQL_INSERT_ID to get the last ID put into the database.
 * 			Changed Behavior of static classes to use DB_LINK if $link_id is null
 *
 * @TODO Errors should be logged in this class via global variable ERROR_REPORTING = 1.
 */

/**
 * @ignore
 */
if (!defined('LOGOS'))
{
	exit;
}

@include_once ROOT_PATH.CLASS_PATH.'class.database.config.php';
@include_once ROOT_PATH.CLASS_PATH.'class.helper.error.php';
@include_once ROOT_PATH.CLASS_PATH.'class.helper.php';

/**
 * @name Main Database Class
 * @package Logos Database Layer
 * @version 0.0.2
 * @copyright (c) 2012 Mathew Kleppin
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 *
 */

class DB extends config{

	//the database connection settings
	private $dbhost = 'localhost';
	private $dbusername = '';
	private $dbpassword = '';
	private $dbname = 'database';
	private $dbtype = 'mysql'; //mysqli should be passable

	//database return settings
	public $link; //the db link
	private $selected; //selected db
	private $secure = FALSE;

	/**
	 * Database Constrution method
	 * @access public
	 */
	public function __construct(){
		if($this->setup()){
			$this->define_ends();
		}
	}

	/**
	 * what happens when the object gets saved in serialize.
	 * @access public
	 */
	public function __sleep(){
		return array($this->link);
	}

	/**
	 * What needs to happen to rebuild the object.
	 * @access public
	 */
	public function __wakeup($link_id){
		$this->link = $link_id;
	}

	/**
	 * Database link should not be cast to a string
	 * @access public
	 */
	public function __toString(){
		return "".var_dump($this->link);
	}

	/**
	 * If the database class is called as a method,
	 * the class (for security reasons) should not do anything.
	 * @access public
	 */
	public function __invoke($x){
		return false;
	}

	/**
	 * var_export() should not do anything to this class
	 * @access public
	 */
	public static function __set_state($x){
		return false;
	}

	/**
	 * Runs the 3 functions needed to start a DB_Link
	 * @access private
	 */
	private function setup(){
		$this->sql_config();

		if($this->sql_connect()){
			if($this->sql_select()){
				return true;
			}
		}

		return false;
	}

	/**
	 * Connects to the DB
	 * @access private
	 */
	private function sql_connect(){

		$this->link = @mysql_connect($this->dbhost, $this->dbusername, $this->dbpassword);

		if(!$this->link){
			$this->_sql_error('Could not connect to database');
		}

		return true;
	}

	/**
	 * Selects the DB
	 * @access protected
	 */
	protected function sql_select(){

		$this->selected = @mysql_select_db($this->dbname);

		if(!$this->selected){
			$this->_sql_error('Could not select database');
		}

		return true;

	}

	/**
	 * Returns the number of rows from a MYSQL result object
	 * @access public
	 * @return FALSE if query failed, count upon success
	 */
	public static function sql_row_count($result){
		try{

			$result = @mysql_num_rows($result);

			if(!$result){
				return false;
			}

			return $result;

		}catch(Exception $e){
			e::error($e->getMessage());
		}
	}

	/**
	 * Returns the row result from a MYSQL Result Object
	 * @access public
	 * @return FALSE if query failed, object upon success
	 */
	public static function sql_fetch_row($result, $rowid){
		try{

			$result = @mysql_result($result, $rowid);

			if(!$result){
				self::_sql_error('DB FETCH ERROR');
			}

			return $result;

		}catch(Exception $e){
			e::error($e->getMessage());
		}
	}

	/**
	 * Returns the fetch assoc from a MYSQL Result Object
	 * @access public
	 * @return FALSE if query failed, object upon success
	 */
	public static function sql_fetch($result){

		try{

			$result = @mysql_fetch_assoc($result);

			if(!$result){
				self::_sql_error('DB FETCH ERROR');
			}

			return $result;

		}catch(Exception $e){
			e::error($e->getMessage());
		}

	}

	public static function last_id($link_id = null){

		if($link_id == null){
			$link_id = DB_LINK;
		}

		try{
			$result = @mysql_insert_id($link_id);

			if(!$result){
				self::_sql_error('DB QUERY ERROR');
			}

			return $result;

		}catch(Exception $e){
			e::error($e->getMessage());
		}

	}

	/**
	 * Shortend version of mysql query done on the database, doesn't need the link.
	 * @access public
	 * @return FALSE if query failed, object upon success
	 */
	public static function sql($query, $link_id = null){

		if($link_id == null){
			$link_id = DB_LINK;
		}

		try{

			$result = @mysql_query($query, $link_id);

			if(!$result){
				self::_sql_error('DB QUERY ERROR');
			}

			return $result;

		}catch(Exception $e){
			e::error($e->getMessage());
		}
	}

	/**
	 * Query's the database
	 * @access public
	 * @return FALSE if query failed, object upon success
	 */
	public function sql_query($query){

		try{

			$result = @mysql_query($query, DB_LINK);

			if(!$result){
				$this->_sql_error('DB QUERY ERROR');
			}

			return $result;

		}catch(Exception $e){
			e::error($e->getMessage());
		}

	}

	/**
	 * Initiate the database object
	 * @access public
	 */
	private static function _sql_close(){

		mysql_close(DB_LINK);

	}

	/**
	 * On an error within the database class, this will close the mysql link.
	 * Errors turned off atm
	 * @access private
	 */
	private static function _sql_error($errorTxt = ''){

		//e::tryquit($errorTxt, 'MYSQL');
		//self::_sql_close();

	}

	/**
	 * Defines the database link with 'DB_LINK'
	 * @access private
	 */
	private function define_ends(){
		define('DB_LINK', $this->link);
		//define('DB', $this);
	}

	/**
	 * Configures the object's variables to connect to a database
	 * @access protected
	 */
	protected function sql_config(){

		$this->dbhost 		= parent::$host;
		$this->dbusername 	= parent::$username;
		$this->dbpassword   = parent::$password;
		$this->dbname 	 	= parent::$database;

	}

}

?>