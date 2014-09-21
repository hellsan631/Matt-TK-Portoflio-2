<?php
function db_connect(){
  $host     = "127.0.0.1";
  $username = "admin";
  $password = "hellsan631"; // Replace with your password
  $database = "personal";
  
  $link = mysql_connect($host, $username, $password);
  
  if(!$link){
    exit('Could not connect to database: '. mysql_error());
  }
  
  $selected = mysql_select_db($database);
  
  if(!$selected){
    exit("Could not select database '$database'");
  }
}

function db_connect_link(){
  $host     = "127.0.0.1";
  $username = "admin";
  $password = "hellsan631"; // Replace with your password
  $database = "personal";
  
  $link = mysql_connect($host, $username, $password);
  
  if(!$link){
    exit('Could not connect to database: '. mysql_error());
  }
  
  $selected = mysql_select_db($database);
  
  if(!$selected){
    exit("Could not select database '$database'");
  }
  
  return $link;
}

?>