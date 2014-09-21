<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(isset($_SESSION['authcode'])){
		unset($_SESSION['authcode']);
		echo 'Success';
		session_unset();
		session_destroy();
	}
}
?>