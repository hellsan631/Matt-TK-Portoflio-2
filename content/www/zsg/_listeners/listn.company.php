<?php

require_once './listn.header.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

	$submitType = intval($_POST['submitType']);

	if($submitType == 0){
		$query = "SELECT `company` FROM admin WHERE `id` = '1'";

		$result = @DB::sql($query);
		$temp = @DB::sql_fetch($result);

		echo stripslashes($temp['company']);
	}else if($submitType == 1){
		$query = "SELECT `contact` FROM admin WHERE `id` = '1'";

		$result = @DB::sql($query);
		$temp = @DB::sql_fetch($result);

		echo stripslashes($temp['contact']);
	}

}

?>