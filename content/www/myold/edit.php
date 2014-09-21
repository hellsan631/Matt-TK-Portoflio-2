<?php 
	include("./includes/_header.php");
	
	$id=$_GET['e'];

	$query="SELECT * FROM `projects` WHERE id='$id'";
	$result = mysql_query($query) or die(mysql_error());
	$row=mysql_fetch_array($result);
	
 ?>
 	
    <html>
    <head>
    
		<style type="text/css">
        html, body{ color:#b3b2b1; font:12px DINWebRegular, Calibri, Arial, Helvetica, sans-serif; margin: 0; padding 0; width:100%; }
		body{background: #223 fixed; margin: 0 auto;}
		a:link, a:visited, a:hover, a:active {color:#c1b398; border:none; text-decoration:none;}
		img{border:none;}
        </style>
        
    </head>
    <body onunload="self.parent.location=('./admin.php')">
 
	<form action="./admin.php" method="POST">
	<center>
    <table border=0 cellspacing="4"><tr><td>
    <label for="name">Name:</label><br />
    <input name="name" id="name" type="text" value="<?php echo $row['name']; ?>" /></td>
    <td>
    <label for="title">Title:</label><br />
    <input name="title" id="title" type="text" value="<?php echo $row['title']; ?>" /></td>
    <td>
    <label for="date">Date:</label><br />
    <input name="date" id="date" type="text" value="<?php echo $row['date']; ?>" /></td>
    </tr><tr><td >
    <label for="client">Client:</label><br />
    <input name="client" id="client" type="text" value="<?php echo $row['client']; ?>" /></td>
    <td>
    <label for="role">Role:</label><br />
    <input name="role" id="role" type="text" value="<?php echo $row['role']; ?>" /></td>
    <td>
    <label for="example">Example?:</label><input name="example" type="checkbox" value="Yes" <?php if($row['example']){echo "checked";}?> /><br />
    <label for="id">Id:</label><input name="id" type="text" id="id" value="<?php echo $row['id']; ?>" size="4"/></td></tr>
    <tr><td colspan="3">
    <label for="desc">Description:</label><br />
    <textarea cols="50" rows="4" name="desc" id="desc"><?php echo $row['desc']; ?></textarea></td></tr>
    <tr><td colspan="3">
    <label for="code">Code:</label><br />
    <textarea cols="50" rows="4" name="code" id="code"><?php echo $row['code']; ?></textarea></td></tr>
    <tr><td colspan="3">
    <center><input type="submit" value="Submit" onclick="self.parent.tb_remove();"/></center></td></tr></table>
    </center>
	</form>
    </body>
    </html>