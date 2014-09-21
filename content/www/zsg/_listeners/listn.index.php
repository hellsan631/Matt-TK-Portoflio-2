<?php
require_once './listn.header.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

	$data = array(0,1,2,3,4,5,6,7,8);

	$offset = 0;
	$totalres = 4;
	$type = 0;

	$query = "SELECT * FROM news WHERE `type` = '$type' ORDER BY `date` DESC LIMIT $offset, $totalres";

	$result = DB::sql($query);

	$rows = DB::sql_row_count($result);

	$data[0] = $rows;

	$count = 1;

	$rowcount = 0;

	while($rows > 0){
		$tempres = DB::sql_fetch($result);
		$addedString = '<br /><br /><a href="./article.php?i='.$tempres['id'].'" class="botlink">Read More...</a>';
		$data[$count++] = '<img src="./images/down-arrow.png" />'.$tempres['title'].'<span class="date">'.date("M d, Y", strtotime($tempres['date'])).'</span>';
		$data[$count++] = stripslashes($tempres['blurb']).$addedString;
		$rows--;
		$rowcount++;
	}

	echo json_encode($data);

}


?>