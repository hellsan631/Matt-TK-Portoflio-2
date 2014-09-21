<?php
require_once './listn.header.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

	$submitType = intval($_POST['submitType']);

	if($submitType == 0){

		if(!isset($_POST['title']) || $_POST['title'] == "Title"){
			e::fail('Please enter a title');
		}
		if(!isset($_POST['blurb']) || strlen($_POST['blurb']) < 5){
			e::fail('Please enter a blurb');
		}
		if(!isset($_POST['input']) || strlen($_POST['input']) < 10){
			e::fail('Article text does not qualify');
		}

		$title = h::clean($_POST['title']);
		$blurb = h::clean($_POST['blurb']);
		$article = h::clean($_POST['input']);

		$check = saveNews($title, $blurb, $article);

		if($check){
			e::fail('Successfully Added Item!'); //successfully added news item
		}else{
			e::fail('Error Adding News Item');
		}

	}else if($submitType == 1){

		e::fail(getLastArticleID());

	}else if($submitType == 2){

		if(!isset($_POST['article_id'])){
			e::fail('Article ID was not set');
		}

		$article = getArticleById($_POST['article_id']);

		$date = date("M d, Y", strtotime($article['date']));
		$id = $article['id'];
		$title = $article['title'];
		$blurb = stripslashes($article['blurb']);
		$content = stripslashes($article['content']);

		$result = "ID: $id<br /><br /><div class=\"titlebar\"><span style=\"float:left\" >Title: $title</span><span class=\"date\" >Date: $date</span></div><div class=\"article\"><div class=\"blurb\">$blurb</div>$content</div>";

		echo $result;

	}else if($submitType == 3){

		$id = $_POST['article_id'];
		$sql = "DELETE FROM news WHERE `id` ='$id'";

		DB::sql($sql);

		e::fail("Successfully Deleted");

	}else if($submitType == 4){

		$id = $_POST['article_id'];

		$article = getArticleById($_POST['article_id']);

		$title = $article['title'];
		$blurb = stripslashes($article['blurb']);
		$content = stripslashes($article['content']);

		echo json_encode(array($title, $blurb, $content));

	}else if($submitType == 6){

		$article = getPrevArticleById($_POST['article_id']);

		$title = $article['title'];
		$blurb = stripslashes($article['blurb']);
		$content = stripslashes($article['content']);
		$id = $article['id'];
		$date = date("M d, Y", strtotime($article['date']));

		$result = "$id    <br /><br /><div class=\"titlebar\"><span style=\"float:left\" >Title: $title</span><span class=\"date\" >Date: $date</span></div><div class=\"article\"><div class=\"blurb\">$blurb</div>$content</div>";

		echo $result;


	}else if($submitType == 7){

		$article = getNextArticleById($_POST['article_id']);

		$title = $article['title'];
		$blurb = stripslashes($article['blurb']);
		$content = stripslashes($article['content']);
		$id = $article['id'];
		$date = date("M d, Y", strtotime($article['date']));

		$result = "$id    <br /><br /><div class=\"titlebar\"><span style=\"float:left\" >Title: $title</span><span class=\"date\" >Date: $date</span></div><div class=\"article\"><div class=\"blurb\">$blurb</div>$content</div>";

		echo $result;

	}else if($submitType == 5){

		if(!isset($_POST['title']) || $_POST['title'] == "Title"){
			e::fail('Please enter a title');
		}
		if(!isset($_POST['blurb']) || strlen($_POST['blurb']) < 5){
			e::fail('Please enter a blurb');
		}
		if(!isset($_POST['input']) || strlen($_POST['input']) < 10){
			e::fail('Article text does not qualify');
		}

		$title = h::clean($_POST['title']);
		$blurb = h::clean($_POST['blurb']);
		$article = h::clean($_POST['input']);
		$article_id = intval($_POST['article_id']);

		$sql = "UPDATE news SET `title` = '$title', `blurb` = '$blurb', `content` = '$article' WHERE `id` ='$article_id'";

		DB::sql($sql);

		e::fail("Successfully Updated");

	}else if($submitType == 8){
		if(!isset($_POST['value'])){e::fail('Please enter something (even a page break)');}

		$home = h::clean($_POST['value']);

		$sql = "UPDATE admin SET `home_page` = '$home' WHERE `id` ='1'";

		DB::sql($sql);

		e::fail("Successfully Updated");
	}else if($submitType == 9){
		if(!isset($_POST['value'])){
			e::fail('Please enter something (even a page break)');
		}

		$home = h::clean($_POST['value']);

		$sql = "UPDATE admin SET `games_page` = '$home' WHERE `id` ='1'";

		DB::sql($sql);

		e::fail("Successfully Updated");
	}else if($submitType == 10){
		if(!isset($_POST['contact'])){
			e::fail('Please enter something');
		}
		if(!isset($_POST['company'])){
			e::fail('Please enter something');
		}


		$contact = h::clean($_POST['contact']);
		$company = h::clean($_POST['company']);

		$sql = "UPDATE admin SET `contact` = '$contact', `company` = '$company'  WHERE `id` ='1'";

		DB::sql($sql);

		e::fail("Successfully Updated");
	}

}

function getArticleById($id){
	$sql = "SELECT * FROM news WHERE `id` = '$id'";
	$result = @DB::sql($sql);
	return @DB::sql_fetch($result);
}

function getNextArticleById($id){
	$sql = "SELECT * FROM news WHERE `id` >= '$id' ORDER BY `id` ASC LIMIT 1";
	$result = @DB::sql($sql);
	return @DB::sql_fetch($result);
}

function getPrevArticleById($id){
	$sql = "SELECT * FROM news WHERE `id` <= '$id' ORDER BY `id` DESC LIMIT 1";
	$result = @DB::sql($sql);
	return @DB::sql_fetch($result);
}

function getLastArticleID(){
	$sql = "SELECT `last_news_item_id` FROM admin WHERE `id` = '1'";
	$result = DB::sql($sql);
	$final = DB::sql_fetch($result);
	return $final['last_news_item_id'];
}

function saveNews($title, $blurb, $article){

	$sql = "INSERT INTO news ( title , content , blurb ) VALUES ('$title', '$article', '$blurb')";

	if(DB::sql($sql)){

		$id = DB::last_id();
		$sql = "UPDATE admin SET `last_news_item_id` = '$id' WHERE `id` ='1'";

		if(DB::sql($sql)){
			return true;
		}
	}

	return false;

}
?>