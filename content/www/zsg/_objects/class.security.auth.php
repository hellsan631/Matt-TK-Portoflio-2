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

require_once ROOT_PATH.CLASS_PATH.'class.user.php';

class auth{

	public static function credentials_valid($email, $password){

		$email = h::clean($email);
		$password = h::shine($password);

		$query = "SELECT `id`, `salt`, `password`
		FROM `users`
		WHERE `email` = '$email' ";

		$result = DB::sql($query, DB_LINK);

		if(DB::sql_row_count($result)){

			$user = DB::sql_fetch($result);

			if(s::compare_salt($password, $user['salt'], $user['password'])){
				return $user['id'];
			}

		}

		return false;

	}

	public static function randPassword($salt) {
		$i = 0;
		$pass = "";
		while ($i <= 7) {
			$num = rand() % 33;
			$tmp = substr($salt, $num, 1);
			$pass = $pass . $tmp;
			$i++;
		}

		return $pass;
	}

}
?>