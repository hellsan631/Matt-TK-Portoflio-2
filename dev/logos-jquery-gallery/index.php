<!DOCTYPE html>
<html>
<head>

<title>Gallery</title>

<link href="./css/index.css" rel="stylesheet" type="text/css" />

</head>
<body>

<header id="header">
	<h1>Logos JQuery Gallery</h1>
</header>

<section id="gallery-con">
	<section id="gallery-main">
		<img src="./images/content/001.jpg" />
	</section>
	<section id="gallery-hidden">
		<img src="./images/content/001.jpg" />
		<img src="./images/content/002.jpg" />
		<img src="./images/content/003.jpg" />
		<img src="./images/content/004.jpg" />
		<img src="./images/content/005.jpg" />
		<img src="./images/content/006.jpg" />
		<img src="./images/content/007.jpg" />
	</section>
	<section id="thumbnails">
		<div id="playtoggle" class="ui-button"><div class="icon icon-pause"></div></div>
		<div id="left-arrow" class="ui-button"><div class="icon icon-arrow-left"></div></div>
		<div id="thumbcon">

		</div>
		<div id="right-arrow" class="ui-button"><div class="icon icon-arrow-right"></div></div>
	</section>
	<section id="progressbar">
	</section>
</section>

<script defer src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script defer src="./js/gallery.js" ></script>

</body>
</html>