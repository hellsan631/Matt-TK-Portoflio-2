<?php

require_once './listn.header.php';
require_once ROOT_PATH.CLASS_PATH.'class.user.php';
require_once ROOT_PATH.CLASS_PATH.'class.security.auth.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

	if(isset($_SESSION['trycount']) && $_SESSION['trycount'] > 6){ //if the trycount of the session is set and exceeds 6
		if(!isset($_SESSION['date'])){ //if the session time (known as date) is not set, begin the count down
			$_SESSION['date'] = time();
			e::error('maximum number of trys exceeded');
		}elseif(getWait($_SESSION['date'], "6") == false){ //if the countdown is reached
			unset($_SESSION['trycount']);
			unset($_SESSION['date']);
		}else{e::error('you must wait '.getWait($_SESSION['date'], "5").' min to try again');
		}
	}

	if(!isset($_POST['aemail']) || $_POST['aemail'] == "Email"){
		e::fail('please enter your email');
	}
	if(!isset($_POST['apass']) || $_POST['apass'] == "Password"){
		e::fail('please enter a password');
	}

	$auth = auth::credentials_valid($_POST['aemail'], $_POST['apass']);

	if($auth){
		if(user::log_in(intval($auth))){
			if(isset($_SESSION['trycount'])){
				unset($_SESSION['trycount']);
			}

			if(isset($_SESSION['date'])){
				unset($_SESSION['date']);
			}

			$_SESSION['authcode'] = "223574a816013a6a5e830aad104397fa068656d6b3d1d7dafc459809452e7cd2";

			$response = "Auth:223574a816013a6a5e830aad104397fa068656d6b3d1d7dafc459809452e7cd2";

			echo $response;

		}else{
			e::error('Login Error');
		}
	}else{

		if(!isset($_SESSION['trycount'])){
			$_SESSION['trycount'] = 0;
		}

		$_SESSION['trycount'] += 1;
		e::error('Invalid Login, '.(6-$_SESSION['trycount']).' tries left');

	}
}

function getWait($date, $minuetsAdded){

	$timeRemaining = strtotime("+".$minuetsAdded." minutes", $date) - time();

	if($timeRemaining < 0){
		return false;
	}else{
		return intval(round($timeRemaining/60));
	}
}
?>