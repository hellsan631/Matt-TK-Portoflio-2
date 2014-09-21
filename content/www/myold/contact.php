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
        
    	<div class="cRight" style="width:800px; height:170px; margin-top:50px; ">
        	<h2>i am connected</h2>
            <p class="text">Here are a list of thing you can contact me on:</p>
            <p class="text2">
            <b>Busniess Related</b><br />
            <span class="info-sub2">Skype: </span>HellsAn631<br />
            <span class="info-sub2">E-Mail: </span>matkle414 (at) gmail.com<br /><br />
            <b>Personal Contacts</b><br />
            <span class="info-sub2">AIM: </span>MathewKle<br />
            <span class="info-sub2">MSN: </span>matkle414@yahoo.com<br />
            <span class="info-sub2">Yahoo IM: </span>matkle414@yahoo.com<br />
            <span class="info-sub2">Twitter: </span>@HellsAn631<br /><br />
            <b>Gaming Related</b><br />
            <span class="info-sub2">Steam: </span>HellsAn631<br />
            <span class="info-sub2">Origin: </span>HellsAn631<br />
            <span class="info-sub2">Teamliquid.net: </span>HellsAn631<br />
            <span class="info-sub2">LoL: </span>HellsAn631<br />
            <span class="info-sub2">SC2 US: </span>HellsArchyon#924<br />
            </p>
            
        </div>
    </div>
</div>

</body>
<script type="text/javascript">
    function changeClass()
    {
        document.getElementById("4p").className += "active";
    }
</script>
</html>