<?php

include_once "./header.php";

global $core;

if(isset($_GET['p'])){

	$page_id = intval($_GET['p']);

}else{
	$page_id = 1;
}

if(isset($_GET['c'])){

	$cat_id = intval($_GET['c']);

}else{

	$cat_id = 0;

}

$blogCount = $core->getBlogCount($cat_id);

$blogs = $core->getBlogHost($page_id, $cat_id);

foreach($blogs as $key => $value){
	$blogs[$key]['content'] = (strlen($value['content']) > 415) ? substr($value['content'], 0, 415) . '...</b></i></p>' : $value['content'];
	$blogs[$key]['date'] = date("M jS, Y", strtotime($value['date']));
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<title>TargetProof</title>
	<link href="./css/host.css" rel="stylesheet" type="text/css" />

<link rel="icon" 
      type="image/ico" 
      href="http://targetproof.net/images/favicon.ico">

</head>
<body>

<header id="top-menu-con">
	<div id="top-menu-holder">
		<nav id="top-menu">
			<a href="index.php"><img src="./images/logo-dark.png" class="logo" alt="TargetProof" /></a>
			<ul class="right">
				<li><a href="index.php#aboutus">About</a></li>
				<li><a href="./blog.php">Blog</a></li>
				<li><a href="index.php#pricing">Pricing</a></li>
				<li><a href="index.php#contact">Contact</a></li>
				<li class="button"><a href="index.php">Signup</a></li>
				<li class="button"><a href="index.php">Login</a></li>
			</ul>
		</nav>
	</div>
</header>

<section class="page-title-con">
	<section class="page-title-header">
		<a href="blog-host.php">
			<h2>Blog</h2>
			<hr/>
			<h5>The TargetProof blog is here to help you with all things security on the net.</h5>
		</a>
	</section>
</section>

<section class="page-content">
	<section class="posts-con">

		<?php

			foreach($blogs as $post):

		?>

		<div class="post">
			<a href="blog.php?p=<?php echo $post['id'] ?>"><img src="<?php echo $post['image'] ?>" alt="Post Image" /></a>
			<div class="content">
				<h6 class="time"><?php echo $post['date'] ?></h6>
				<a href="blog.php?p=<?php echo $post['id'] ?>"><h4><?php echo $post['name'] ?></h4></a>
				<?php echo $post['content'] ?>
				<div class="readmore"><a href="blog.php?p=<?php echo $post['id'] ?>">Read More...</a></div>
			</div>
			<div class="bottom-arrow"></div>
		</div>

		<hr />

		<?php
			endforeach;
		?>

		<div class="page-count">
			<?php
				$pageCount = ceil(($blogCount/5));

				if($pageCount < 1){
					$pageCount = 1;
				}

				for($i = 1; $i <= $pageCount; $i++){

					if($i == $page_id){
						echo "<a href=\"blog-host.php?p={$i}&c={$cat_id}\" class=\"selected\">$i</a>";
					}else{
						echo "<a href=\"blog-host.php?p={$i}&c={$cat_id}\">$i</a>";
					}

				}
			?>
		</div>

	</section>
	<section class="right-nav-con">

		<div id="catagories" class="right-side-block">
			<h3>Categories</h3>
			<hr />
			<?php
			$categories = $core->getCategories();

			foreach($categories as $page):

				?>

				<div class="catagory" style="text-align: left;">
					<a href="blog-host.php?&c=<?php echo $page['id']; ?>">
						<img src="./images/ui/right-arrow.png" alt="arrow" />
						<?php echo $page['name']; ?>
					</a>
				</div>
				<hr />

			<?php endforeach; ?>
		</div>

		<div class="right-side-block share-ico">
			<h6>Share</h6>
			<div class="block">
				<a href="#"><img src="./images/fbshare.png" alt="Facebook" /></a>
				<a href="#"><img src="./images/twshare.png" alt="Twitter" /></a>
				<a href="#"><img src="./images/blshare.png" alt="Blogger" /></a>
				<a href="#"><img src="./images/gpshare.png" alt="Google Plus" /></a>
				<a href="#"><img src="./images/wpshare.png" alt="Wordpress" /></a>
			</div>
		</div>

		<div id="most-viewed" class="right-side-block">
			<h3>Most Viewed</h3>
			<hr />
			<?php

			$blogs = $core->getMostViewed(5);

			foreach($blogs as $page):

				$page['date'] = date("M jS Y", strtotime($page['date']));

				?>

				<div class="catagory">
					<a href="blog.php?p=<?php echo $page['id'] ?>">
						<img src="<?php echo $page['image']; ?>" alt="MostViewedImg" />
					<span class="text">
						<h6><?php echo $page['name']; ?></h6>
						<p><?php echo $page['date']; ?></p>
					</span>
					</a>
				</div>
				<hr />

			<?php endforeach; ?>
		</div>
	</section>
</section>

<footer id="footer-con">
	<div class="footer">
		<div class="block">
			<div class="sc-content-sociallinks">
				<a href="#"><img src="./images/fbico.jpg" alt="Facebook" /></a>
				<a href="#"><img src="./images/twico.jpg" alt="Twitter" /></a>
				<a href="#"><img src="./images/gico.jpg" alt="Google" /></a>
				<a href="#"><img src="./images/gpico.jpg" alt="Google PLus" /></a>
				<a href="#"><img src="./images/liico.jpg" alt="LinkedIn" /></a>
			</div>
		</div>

		<div class="block linklist sc-content-linklistss">
			<p>
				<a href="index.php#slider">Home</a> | <a href="index.php#aboutus">About</a> | <a href="./blog.php">Blog</a> | <a href="index.php#contact">Contact</a> | <a href="index.php#pricing">Pricing</a>
			</p>
		</div>
		<div class="sc-content-tplogobottom">
			<a href="index.php#slider" ><img src="./images/logo-small.png" alt="Target Proof"/></a>
		</div>
		<div class="block sc-content-copyrights1">
			<p>(c) TargetProof 2013 | Born in the USA</p>
		</div>
	</div>
</footer>

</body>
</html>