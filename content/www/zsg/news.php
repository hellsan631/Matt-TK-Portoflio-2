<?php

	define('PAGE_TITLE', 'zer0sumgames - News');
	define('MAIN_CON', 'con-bearnews');

?>
<?php include './_menu.php'; ?>
</div>

<div id="con-main-newswide">
	<div id="con-main">
		<div id="home">Home // </div><div id="loc" style="float:left"><h1>News Archive</h1></div><br />
			<div id="storymenucon">
				<div class="storymenuitem">Current News</div>
			</div>
			<div id="storycon"></div>
			<button id="loadmore">Load More</button>
		<?php include './_footer.php'; ?>
	</div>
</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js"></script>
<script src="./js/news.js"></script>
<script src="./js/menu.js"></script>
</html>