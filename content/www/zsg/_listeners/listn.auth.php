<?php


if($_SERVER['REQUEST_METHOD'] == 'POST'){

	$authcode = '223574a816013a6a5e830aad104397fa068656d6b3d1d7dafc459809452e7cd2';

	$decode = $_POST['authcode'];

	if($decode == $authcode){
		echo "true";
	}else{
		echo "false";
	}
}

?>