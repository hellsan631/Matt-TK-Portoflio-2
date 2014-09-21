<?php include("./includes/_header.php"); include("./includes/project.php"); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="./style.css" rel="stylesheet" type="text/css"/>

<title>Mathew Kleppin's Website</title>

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
        
        <div class="cRight" style="width:800px; height:auto; margin-top:100px; margin">

                        <h3>Login</h3>   
                        <?php if(isset($_GET['error'])): ?>
                          <h2>Username and/or Password are incorrect</h2>
                        <?php endif ?>
                        <?php if(isset($_GET['login_required'])): ?>
                          <h2>You must log in to view this page.</h2>
                        <?php endif ?>
                        
                        <form action="authenticate.php" method="POST">
                          <label for="username">Username:</label>
                          <input type="text" name="username" id="username"><br /><br />
                          <label for="password">Password:</label>
                          <input type="password" name="password" id="password" ><br /><br />
                          <input type="submit" value="Log In" >
                        </form>
 
         	
        </div>
    </div>
</div>

</body>
<script type="text/javascript">
    function changeClass()
    {

		document.getElementById("5p").className += "active";

    }
</script>
</html>