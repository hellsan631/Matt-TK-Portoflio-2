<?php
	if(!isset($_SESSION)){session_start();}
	define('PAGE_TITLE', 'zer0sumgames');

?>

<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title><?php echo PAGE_TITLE; ?> - Admin</title>

<link href="./css/index/popup.css" rel="stylesheet" type="text/css"/>
<link href="./css/index/style.css" rel="stylesheet" type="text/css" />
<link href="./jquery.cleditor.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Ubuntu:400,700' rel='stylesheet' type='text/css' />
</head>

<body>
<div id="bodycon">
<div id="acon-maincon">
<div id="acon-main">
	<div id="acon-menu">
		<div class="title">
   			News Blogger
   		</div>
   		<div id="mi1" class="item-menu selected">
   			Overview
   		</div>
   		<div id="mi2" class="item-menu">
   			Compose
   		</div>
   		<div id="mi3"class="item-menu">
   			Index
   		</div>
   		<div id="mi8"class="item-menu">
   			Search
   		</div>
   		<div class="oops"></div>
   		<div class="title bottom">
   			Website Settings
   		</div>
   		<div id="mi4" class="item-menu">
   			Company Page
   		</div>
   		<div id="mi5" class="item-menu">
   			Games Page
   		</div>
   		<div id="mi6" class="item-menu">
   			Home/Index
   		</div>
   		<div id="mi7" class="item-menu">
   			Logout
   		</div>
	</div>
	<div id="acon-cont">
		<div id="acon-login">
			<h1>login</h1>
			<div id="resultlog" class="error"></div><br />
		    <input id="submitType" name="submitType" type="hidden" value="0" />

            <input type="text" name="email" id="email" value="Email" /><br /><br />
            <input type="text" name="pass" id="pass" value="Password" /><br /><br />

            <button id="submit" class="submit" type="submit">Login</button>
		</div>
		<div id="mi1-c">//overview</div>
		<div id="mi2-c">
			<h1>news blogger - compose</h1>
			<input id="title" name="title" value="title" type="text"/><br />
			<div id="con-blurb">
				<h2>Blurb</h2>
				<textarea id="blurb"></textarea>
			</div>
			<br />
			<div id="con-input">
				<h2>Full Article</h2>
				<textarea id="input"></textarea>
			</div>
			<button id="mi2-b" class="submit" type="submit">Submit</button>
		</div>
		<div id="mi3-c">
			<h1>news blogger - index</h1>
			<div id="mi3-c1">prev</div>
			<div id="mi3-c2">next</div>
			<div id="mi3-r">
			</div>
			<div id="mi3-c4">delete</div>
			<div id="mi3-c3">edit</div>
		</div>
		<div id="mi4-c">
			<div id="mi4-rcon">
				Contains the "Contact" Inner Structure<br /><br />
				<h2>"About Us"</h2>
				<textarea id="mi4-r"></textarea>
				<br />
				<br />
				<h2>"Contact Info"</h2>
				<textarea id="mi4-r2"></textarea>
				<button id="mi4-b" class="submit" type="submit">Change</button>
			</div>
		</div>
		<div id="mi5-c">
			<div id="mi5-rcon">
				Contains the "Games Page" Inner Structure<br />
				Click "Show Source" and edit<br /><br />
				<textarea id="mi5-r"></textarea>
				<button id="mi5-b" class="submit" type="submit">Change</button>
			</div>
		</div>
		<div id="mi6-c">
			<div id="mi6-rcon">
				Set the Landing Page text next to the news container.<br /><br />
				<h2>Full Article</h2>
				<textarea id="mi6-r"></textarea>
				<button id="mi6-b" class="submit" type="submit">Change</button>
			</div>
		</div>
		<div id="mi8-c">//search</div>
	</div>
</div>

<div id="popupAdv" class="popup">
	<a onClick="closePops()" class="popupX">x</a>
	<h1>Edit Article</h1>
	<input id="eid" name="eid" value="" type="hidden" />
	<input id="etitle" name="title" value="title" type="text" /><br />
	<div id="edit-blurb">
		<h2>Blurb</h2>
		<textarea id="eblurb"></textarea>
	</div>
	<br />
	<div id="edit-input">
		<h2>Full Article</h2>
		<textarea id="einput"></textarea>
	</div>
	<button id="mi3-b" class="submit" type="submit">Save</button>
</div>

<div id="backgroundPopup"></div>
</div>
</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js"></script>
<script src="./js/popup.js"></script>
<script src="./jquery.cleditor.min.js"></script>
<script>
<?php
	if(isset($_SESSION['authcode'])){
		echo 'var authme = "'.$_SESSION['authcode'].'";';
	}else{
		echo 'var authme = "false";';
	}

	if(isset($_GET['s'])){
		if($_GET['s'] == 1){echo 'alert("Success!");';}
	}
?>
</script>
<script src="./js/admin.js"></script>
</html>