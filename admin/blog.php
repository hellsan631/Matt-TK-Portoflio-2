<?php

include_once "./header.php";

global $core;

if(isset($_GET['p'])){

	$page_id = intval($_GET['p']);

}else{
	
	header('Location: blog-host.php');
	
}

$post = $core->getBlog($page_id);

$post['date'] = date("D M jS, Y", strtotime($post['date']));

$category = $core->getCategory($post['cat_id']);

//$post['content'] = addslashes($post['content']);

if(strlen($post['content']) <= 1){
	$post['content'] = '<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
			<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
			<p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"</p>
			<img src="./images/post-img-me.jpg" alt="relevent" />
			<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
			<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
			<p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>';
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<title>TargetProof</title>
	<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
	<link href="./css/blog.css" rel="stylesheet" type="text/css" />
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
		<h2><?php echo $post['name']; ?></h2>
	</section>
</section>

<section class="page-content">
	<section class="posts-con">

		<div class="table block">
			<table class="tableme">
				<tr>
					<td class="date"><img src="./images/clockico.png" alt="date" /> <?php echo $post['date']; ?></td>
					<td><a href="blog-host.php?&c=<?php echo $category['id']; ?>" style="color:#111"><img src="./images/flagico.png" alt="Catagory" /> <?php echo $category['name']; ?></a></td>
				</tr>
			</table>
		</div>

		<div class="post">

			<?php echo $post['content']; ?>

		</div>


		<div class="backtotop"><h5>&uarr; Back To Top</h5></div>

	</section>

	<section class="right-nav-con">
		<div id="catagories" class="right-side-block">
			<h3>Categories</h3>
			<hr />

			<?php
			$categories = $core->getCategories();

			foreach($categories as $page):

			?>

				<div class="catagory">
					<a href="blog-host.php?&c=<?php echo $page['id']; ?>">
						<img src="./images/ui/right-arrow.png" alt="arrow" />
						<?php echo $page['name']; ?>
					</a>
				</div>
				<hr />

			<?php endforeach; ?>

			<div class="more"><a href="blog-host.php">more...</a></div>
		</div>

		<div class="right-side-block share-ico">
			<h6>Share</h6>
			<div class="block <?php echo"sc-content-blogshare"; ?>">
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

			$blogs = $core->getMostViewed(4);

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

			<div class="more"><a href="blog-host.php">more...</a></div>
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