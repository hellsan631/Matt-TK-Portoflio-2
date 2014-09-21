<?php
session_start();

if(isset($_SESSION['views'])){
	$_SESSION['views'] = $_SESSION['views'] + 1;
}else{
	$_SESSION['views'] = 1;
}

require_once "./includes/database.php";
db_connect();
require_once "./includes/auth.php";
$current_user = current_user();

// Call require_login() if needed
// This must be done before any output is sent
// because a header() based redirect is used

if(isset($login_required)){
  require_login();
}

if(isset($admin)){
  require_admin();
}
?>
