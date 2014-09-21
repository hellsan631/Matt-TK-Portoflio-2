<?php include("./includes/_header.php"); include("./includes/project.php"); include("scripts.php"); ?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="text/javascript">
var display_ads = false;
</script>

<link href="./style.css" rel="stylesheet" type="text/css"/>

<title>Mathew Kleppin's Website</title>

<?php $pageLink; $mainLink="1p"; $page = array();?>
    
</head>

<body onLoad="javascript:preloader();changeClass(); ">
<div class="bg">
	<div id="content-inner">
    	<div id="story" class="cLeft" style="width:100px; height:790px; position:fixed;">
        	<p style="text-align:center"><img src="./images/logo.png"  alt="" /></p><br /><br /><br />
            <?php 
				include("menu.php");
			?>
        </div>
        
			<?php
                if($_GET){
					$pageLink = $_GET['p']."s";
					$id = $_GET['p'];
					$query = "SELECT * FROM `projects` WHERE `id` = '$id'";
					$result = mysql_query($query) or die(mysql_error());
					$row = mysql_fetch_array($result);
					include("./work/tbody.php");
                }
                else{include("./work/main-body.php");}
            ?>

            <?php 
				include("links.php");
			?>
            
            <div id="login">
        		<center><small>(c) Mathew Kleppin 2012</small></center>
    		</div>
        </div>
    </div>
</div>

</body>
<script type="text/javascript">
    function changeClass()
    {
        <?php if($_GET) if($mainLink != $pagelink) echo "document.getElementById(\"".$pageLink."\").className += \"active\";"; ?>
		<?php echo "document.getElementById(\"".$mainLink."\").className += \"active\";"; ?>
    }
	
	function preloader() 
	{
	
		 // counter
		 var i = 0;
	
		 // create object
		 imageObj = new Image();
	
		 // set image list
		 images = new Array();
		 images[0]="./content2/thumb-tom1-r.jpg"
		 images[1]="./content2/thumb-tom2-r.jpg"
		 images[2]="./content2/thumb-ns1-r.jpg"
		 images[3]="./content2/thumb-ntbl-r.jpg"
		 images[4]="./content2/thumb-mk1-r.jpg"
		 images[5]="./content2/thumb-mk2-r.jpg"
		 images[6]="./content2/thumb-ogam1-r.jpg"
		 images[7]="./content2/thumb-ogam2-r.jpg"
		 images[8]="./content2/thumb-srd1-r.jpg"
		 images[9]="./content2/thumb-sy1-r.jpg"
		 images[10]="./content2/thumb-ns2-r.jpg"
		 images[11]="./content2/thumb-ae1-r.jpg"
		 images[12]="./content2/thumb-gg1-r.jpg"
		 images[13]="./content2/thumb-fl1-r.jpg"
		 
	
		 // start preloading
		 for(i=0; i<=13; i++) 
		 {
			  imageObj.src=images[i];
		 }
	
	} 
	
	function noads(){
		document.getElementById("no_ads").className += "noad";
	}
</script>
</html>