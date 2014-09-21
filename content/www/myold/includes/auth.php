<?php
function credentials_valid($username, $password){
  $username = mysql_real_escape_string($username);
  $query = "SELECT `id`, `salt`, `password` 
            FROM `users` 
            WHERE `username` = '$username' ";
            
  $result = mysql_query($query);
  if(mysql_num_rows($result)){
    $user = mysql_fetch_assoc($result);
    $password_requested = md5($user['salt'] . $password);
    if($password_requested === $user['password']){
      return $user['id'];
    }
  }
  return false;
}

// Logs into the user $user
function log_in($user_id){
  $_SESSION['user_id'] = $user_id;
}

// Returns the currently logged in user (if any)
function current_user(){
  static $current_user;
  
  if(!$current_user){
    if(isset($_SESSION['user_id'])){
      $user_id = intval($_SESSION['user_id']);
      $query = "SELECT * 
                FROM `users` 
                WHERE `id` = $user_id";
                
      $result = mysql_query($query);
      if(mysql_num_rows($result)){
        $current_user = mysql_fetch_assoc($result);
        return $current_user;
      }
    }
  }
  return $current_user;
}

// Requires a current user
function require_login(){
  if(!current_user()){
    $_SESSION['redirect_to'] = $_SERVER["REQUEST_URI"];
    header("Location: index.php");
    exit("You must log in.");
  }
}

function require_admin(){
  $cUser = current_user();
  
  if(!$cUser['admin']){
  	header("Location: index.php");
  	exit("Admin Required.");
  }
}
?>