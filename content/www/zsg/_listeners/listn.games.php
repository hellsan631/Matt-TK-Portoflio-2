<?php
require_once './listn.header.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

	$query = "SELECT `games_page` FROM admin WHERE `id` = '1'";

	$result = DB::sql($query);
	$temp = @DB::sql_fetch($result);

	echo stripslashes($temp['games_page']);

}

?>