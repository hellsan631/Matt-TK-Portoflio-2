<?php
session_start();
require_once "includes/database.php";
db_connect();
require_once "includes/auth.php";

$user_id = credentials_valid($_POST['username'], $_POST['password']);
if($user_id){
  log_in($user_id);
  
  if($_SESSION['redirect_to']){
    header("Location: " . $_SESSION['redirect_to']);
    unset($_SESSION['redirect_to']);

  }else{
    header("Location: admin.php");
  }
}else{
  header("Location: index.php?error=1");
  exit("You are being redirected");
}
?>
