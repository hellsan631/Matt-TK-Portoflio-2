<?php

/**
 * @ignore
 */
if (!defined('LOGOS'))
{
	exit;
}

/**
 * @ignore
 */
if (!defined('DB_LINK'))
{
	exit;
}

require_once ROOT_PATH.CLASS_PATH.'class.security.helper.php';

/**
 * @name Main User Class
 * @package Logos User Layer
 * @version 0.0.1
 * @copyright (c) 2012 Mathew Kleppin
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 * @TODO comment dis code yo
 */

class user{

	//user variables
	public $id;
	public $username;
	public $email;
	//password and salt should only be delt with inside of the user class
	private $salt;
	private $password;
	//avatar in url form
	public $avatar;
	//the user level
	public $userlevel;
	//first and last name
	public $firstname;
	public $lastname;
	//other login information
	public $logins;
	private $lastip;
	private $lastlogindate;
	//can add things like a list of ip's

	public static $login = false;

	public function __construct(){

		$this->id 				= null;
		$this->username 		= null;
		$this->email 			= null;
		$this->salt 			= null;
		$this->password 		= null;
		$this->avatar			= null;
		$this->userlevel 		= null;
		$this->firstname		= null;
		$this->lastname 		= null;
		$this->logins			= null;
		$this->lastip 			= null;
		$this->lastlogindate 	= null;

	}

	public function write_new_user(array $userdata){

		$this->username 		= $userdata['username'];
		$this->email 			= $userdata['email'];
		$this->salt 			= $userdata['salt'];
		$this->password 		= $userdata['password'];
		$this->userlevel 		= $userdata['userlevel'];

		$query = "INSERT INTO `users` ( `username`, `email`,  `salt`,  `password`, `userlevel`)
		VALUES ('$this->username', '$this->email', '$this->salt', '$this->password', '$this->userlevel')";

		DB::sql($query, DB_LINK);

	}

	public static function load_id($user_id){

		$instance = new self();
		$instance->id = intval($user_id);
		$instance->user_load();

		return $instance;
	}

	public static function load_current(){
		$instance = new self();
		$instance->current_user();

		return $instance;
	}

	/**
	 * what happens when the object gets saved in serialize.
	 * @access public
	 */
	public function __sleep(){
		return array(
				'id' => $this->id,
				'username' => $this->username,
				'email' => $this->email,
				'userlevel' =>$this->userlevel,
				'avatar' => $this->avatar,
				'fname' => $this->firstname,
				'lname' => $this->lastname,
				'login' => $this->login
				);
	}

	/**
	 * What needs to happen to rebuild the object.
	 * @access public
	 */
	public function __wakeup(array $user){

		$this->id 				= $user['id'];
		$this->username 		= $user['username'];
		$this->email 			= $user['email'];
		$this->userlevel 		= $user['userlevel'];
		$this->avatar			= $user['avatar'];
		$this->firstname		= $user['fname'];
		$this->lastname 		= $user['lname'];
		$this->login			= $user['login'];

	}

	/**
	 * Database link should not be cast to a string
	 * @access public
	 */
	public function __toString(){
		return "".var_dump($this);
	}

	/**
	 * Destroys the object in a way that saves memory.
	 * @access public
	 */
	function __destruct() {
		foreach ($this as $index => $value) unset($this->$index);
	}

	public function current_user(){

		if(isset($_SESSION['user_id'])){

			$user_id = intval($_SESSION['user_id']);
			$check = $this->user_load($user_id);

			if($check){
				$this->login = true;
			}

			return $check;
		}

		return false;
	}

	public static function log_in($user_id = null){

		if($user_id == null){
			$user_id = $this->id;
		}

		$ip = $_SERVER['REMOTE_ADDR'];

		if(isset(config::$newpass)){

			$sql = "SELECT * FROM users WHERE `id` = '$user_id'";
			$temp = DB::sql($sql);
			$salt = DB::sql_fetch($temp);

			$newpass = s::add_salt(config::$newpass, $salt['salt']);

			$query = "UPDATE `users`
			 SET `logins` = `logins` + 1, `lastip` = '$ip', `lastlogindate` = NOW(), `password` = '$newpass'
			 WHERE `id` = '$user_id'";

		}else{
			$query = "UPDATE `users`
			SET `logins` = `logins` + 1, `lastip` = '$ip', `lastlogindate` = NOW()
			WHERE `id` = '$user_id'";
		}

	  	$result = DB::sql($query);

	  	if($result){
	  		$_SESSION['user_id'] = $user_id;
	  		self::$login = true;
	  	}

	  	return self::$login;
	}

	public function user_load($user_id = null){

		if($user_id == null){$user_id = $this->id;}

		$user_id = intval($user_id);

		$query = "SELECT * FROM `users` WHERE `id` = $user_id";

		$check = $this->setup_user(DB::sql($query, DB_LINK));

		if($check){
			return true;
		}

		return false;

	}

	public static function require_login(user $current = null){

		if($current == null){$current->current_user();}

		if(!$current->login){
			$_SESSION['redirect_to'] = $_SERVER['REQUEST_URI'];
			header("Location: login.php?login_required=1");
			exit("You must log in.");
		}

	}

	public function setup_user($result){

		$user = DB::sql_fetch($result);

		try{

			$this->id 				= $user['id'];
			$this->username 		= $user['username'];
			$this->email 			= $user['email'];
			$this->salt 			= $user['salt'];
			$this->password 		= $user['password'];
			$this->avatar			= $user['avatar'];
			$this->userlevel 		= $user['userlevel'];
			$this->firstname		= $user['fname'];
			$this->lastname 		= $user['lname'];
			$this->logins			= $user['logins'];
			$this->lastip 			= $user['lastip'];
			$this->lastlogindate 	= $user['lastlogindate'];

			return true;

		}catch(Exception $e){
			e::error($e->getMessage());
		}

		return false;

	}

}