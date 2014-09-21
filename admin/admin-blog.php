<?php
include_once "./header.php";

global $core;

?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>TargetProof Sidekick Admin</title>
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.1/css/font-awesome.css" rel="stylesheet">
	<link href="./css/admin.css" rel="stylesheet" type="text/css" />
	<link href="./css/redactor.css" rel="stylesheet" type="text/css" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="./js/redactor.min.js"></script>
	<script>
		var jq19 = jQuery.noConflict(true);

	</script>
	<script src="./js/admin.js"></script>

	<script src="./js/jquery-1.5.1.min.js"></script>
</head>
<body>

	<?php
		global $si;

		$si = 2;

		include "menu.php";
	?>

	<section id="content">

		<?php if(isset($_SESSION['result'])): ?>

			<div id="results">
				<h3>Result</h3>
				<h6><?php echo $_SESSION['result']; ?></h6>
			</div>

		<?php

			unset($_SESSION['result']);

		endif; ?>

		<div class="clear-fix halfblock row">
			<h2>Category Directory</h2>
			<h6>Create and manage blog categories</h6>

			<br/>

			<ul class="pages-list">
				<?php
					$categories = $core->getCategories();
					foreach($categories as $page){

						$parent =  $core->getCategory($page['parent']);

						if($parent == false){
							$parent = array('name' => '</small>');
							echo "<hr/>";
						}else{
							$parent['name'] .= "</small> <i class=\"fa fa-angle-double-right\"></i> ";
						}

						echo "<li><small>{$parent['name']} {$page['name']}<i cata=\"{$page['id']}\" title=\"Delete\" class=\"fa right fa-times\"></i></li>";

					}
				?>
			</ul>
		</div>

		<div class="clear-fix halfblock row">

			<h4>Add New Category</h4>

			<br/>

			<form action="admin-listener.php" method="post">
				<input type="hidden" name="submitType" value="2" />
				<input type="text" id="categoryTitle" name="categoryTitle" value="Title" /><br/>
				<select id="categoryParent" name="categoryParent">
					<option value="0">Category Parent</option>
					<option value="0">NONE (Root)</option>
					<?php

					foreach($categories as $page){

						echo "<option value=\"{$page['id']}\">{$page['name']}</option>";

					}
					?>
				</select>
				<br/>
				<input class="button" type="submit" value="submit" />
			</form>

		</div>

		<br/>

		<div class="clear-fix halfblock row">
			<h2>Blog Directory</h2>
			<h6>Click on a blog to go to that blogs edit page.</h6>

			<br/>

			<ul class="pages-list">
				<?php
				$blogs = $core->getBlogs();
				foreach($blogs as $page){

					echo "<li image=\"{$page['image']}\" title=\"{$page['name']}\" blog-link=\"{$page['id']}\">{$page['name']}<i del=\"{$page['id']}\" title=\"Delete\" class=\"fa right fa-times\"></i><i id=\"{$page['id']}\" title=\"Link\" class=\"fa right fa-eye\"></i></li>";

				}
				?>
			</ul>
		</div>

		<div class="clear-fix halfblock row">

			<h4>Add New Blog</h4>

			<br/>

			<form action="admin-listener.php" method="post">
				<input type="hidden" name="submitType" value="4" />
				<input type="text" id="blogTitle" name="blogTitle" value="Title" /><br/>
				<input type="text" id="blogImage" name="blogImage" value="Display Image URL" /><br/>
				<select id="category" name="category">
					<option value="-1">Category</option>
					<?php

					foreach($categories as $page){

						echo "<option value=\"{$page['id']}\">{$page['name']}</option>";

					}
					?>
				</select>
				<br/>
				<input class="button" type="submit" value="submit" />
			</form>

		</div>

	</section>

</body>
</html>