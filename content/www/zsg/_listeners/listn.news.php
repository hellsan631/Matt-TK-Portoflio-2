<?php
require_once './listn.header.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

	$submitType = intval($_POST['submitType']);

	if($submitType == 0){

		$data = array(0,1);

		$offset = intval($_POST['offset']);

		$sql = "SELECT * FROM news ORDER BY `date` DESC LIMIT $offset, 1";

		$result = DB::sql($sql);

		$tempres = DB::sql_fetch($result);
		$data[0] = '<a href="./article.php?i='.$tempres['id'].'">'.$tempres['title'].'</a><span class="date">'.date("M d, Y", strtotime($tempres['date'])).'</span>';
		$data[1] = stripslashes($tempres['content']);

		echo json_encode($data);

	}else if($submitType == 1){
		echo "no";
	}else if($submitType == 2){

		$startdate = $_POST['sdate'];
		$enddate = $_POST['sdate'];

		$sql = "SELECT * FROM news WHERE `date` >= '$startdate' AND `date` <= '$enddate' LIMIT 10";

	}else if($submitType == 3){

		$sql = "SELECT COUNT(*) FROM news";
		$result = DB::sql($sql);

		$fetch = DB::sql_fetch($result);

		echo intval(($fetch['COUNT(*)']));

	}
}else{

}
?>

