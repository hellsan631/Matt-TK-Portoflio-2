<?php  include("./includes/_header.php"); include("./includes/project.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="./style.css" rel="stylesheet" type="text/css"/>

<title>Mathew Kleppin's Website</title>

<?php 
		include("scripts.php");
		?>
        
        <style type="text/css">
			img{
				border:none;
				-webkit-box-shadow: none;
				-moz-box-shadow: none;
		
				-webkit-border-radius: none;
				-moz-border-radius: none;
				border-radius: none;
			}
        </style>
        
</head>

<body onload="changeClass()">
<div class="bg">
	<div id="content-inner">
    	<div id="story" class="cRight" style="width:100px; height:790px; position:fixed;">
        	<p style="text-align:center"><img src="./images/logo.png"  alt="" /></p><br /><br /><br />
            <?php 
				include("menu.php");
			?>
        </div>
        
    	<div class="cRight" style="width:800px; height:250px; ">
        	<h2>Hello, I am Mathew Kleppin</h2>
            <p class="text">And this is my website.</p>
            <p class="text2">I am a professional. I've picked up so many things as hobbies <br/>
			and have gotten extreamly good at them.<br/>
            <br />
			<b>I know how to code in:</b><br/>
			Java, C, PHP, JavaScript & JQuery, AJAX, SCSS (Similar to CSS3)<br/>
			<br/>
			<b>I am an expert at:</b><br/>
			Web Design, Movies, UI Design, Guitar, Game Design, Video Games<br/>
			<br/>
			<b>Games I am/have competed in:</b><br/>
			StarCraft 2, League of Legends, Battlefield 3, Supreme Commander, Diablo 3<br/>
			<br/>
			I can learn to code in any language, at a high level, within 1 week.<br/>
			<br/>
            At an early age, i took an interest at everything related to computers, <br />
            and have developed these hobbies of mine.<br  />
            <br />
            I intend that this website be a showcast of my work, hobbies, and little side projects. <br />
            <br />
            More projects to come soon. Contact me at matkle414(at)gmail.com</p>
            <a href="https://docs.google.com/open?id=0B7aMB0PUdYLOYzU4MjExYzAtYzkwOS00YWZlLThkZjYtMzM1Yjk2YzZkYzI5">My Resume</a><br />
        </div>
        
        <div class="cRight" style="width:800px; height:auto; margin-top:240px;">
        	<p style="padding-left:20px;">
            <a href="http://www.facebook.com/hellsan631"><img src="./content/ico_fb.png" alt=""/></a>
            <a href="http://www.youtube.com/hellsan631"><img src="./content/ico_yt.png" alt=""/></a>
            <a href="http://twitter.com/hellsan631"><img src="./content/ico_tw.png" alt=""/></a>
            <a href="http://hellsan631.deviantart.com/"><img src="./content/ico_da.png" alt=""/></a>
            </p><br /><br /><br  />
        </div>
    </div>
</div>

</body>
<script type="text/javascript">
    function changeClass()
    {

		document.getElementById("2p").className += "active";

    }
</script>
</html>