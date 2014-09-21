<?php
session_start();

define('PAGE_TITLE', 'zer0sumgames - Articles');
define('MAIN_CON', 'con-bearnews');

require_once './_objects/class.logos.setup.php';
$page = new logos('./');
require_once ROOT_PATH.CLASS_PATH.'class.database.php';
$db = new DB();
$errors = true;

if(isset($_GET['i']) && intval($_GET['i']) > 0){

	$id = intval($_GET['i']);

	$query = "SELECT * FROM news WHERE `id` = '$id'";

	$result = @DB::sql($query);
	$article = @DB::sql_fetch($result);

	if($article){
		$errors = false;
	}

}else{
	header("Location: ./news.php");
}

?>
<?php include './_menu.php'; ?>
</div>

<div id="con-main-newswide">
	<div id="con-main">
		<div id="home">Home // </div><div id="loc" style="float:left"><h1>News Article - #<?php echo $article['id']; ?></h1></div><br />
			<div id="storycon" class="artpage">
				<?php if(!$errors): ?>
					<div class="art_head"><?php echo $article['title'].'<span class="date">'.date("M d, Y", strtotime($article['date'])).'</span>'; ?></div>
					<div class="art_body"><?php echo $article['content']; ?></div>
				<?php else: ?>
					Could not Retrieve Article, Invalid or Malformed ID String
				<?php endif ?>
			</div>
		<?php include './_footer.php'; ?>
	</div>
</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js"></script>
<script src="./js/menu.js"></script>
</html>