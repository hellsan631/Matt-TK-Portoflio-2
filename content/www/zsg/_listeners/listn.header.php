<?php
	session_start();
	require_once '../_objects/class.logos.setup.php';
	$page = new logos('../');
	require_once ROOT_PATH.CLASS_PATH.'class.database.php';
	$db = new DB();
?>