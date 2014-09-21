<?php 
$title = "Admin Panel";

$login_required = true;
$admin = true;

include("./includes/_header.php");
include("./includes/project.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="./style.css" rel="stylesheet" type="text/css"/>
<link href="../css/thickbox.css" rel="stylesheet" type="text/css"/> 

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
        
        <div class="cRight" style="width:800px; height:auto; margin-top:25px;"><p>

        	Hello, <?php $cuser = current_user(); echo $cuser['username']; ?>
            <br /><br />
            
            <div class="module"> <!-- only important for styling -->
                <div class="header collapsed"> <!-- must have a class name -->
                    <h1>Existing Projects</h1>
                </div>
                <div class="content"> <!-- the 'content' class is only for styling -->
                	<?php 
                            if(isset($_GET['d'])){
                                $result =  delete_project($_GET['d']);
								if($result){
									echo "<p><b>Deleted ".$_GET['d']." successfully</b></p>";
								}
                            }
                        ?>
                    <p><?php get_projects();?></p>
                </div>
            </div>
            <div class="module"> 
                <div class="header collapsed"> 
                    <h1>Add Project</h1>
                </div>
                <div class="content"> 
                    <p><form action="admin.php" method="post">
						<?php 
                            if(isset($_GET['p'])){
                                if($_GET['p'] == "1"){
                                    echo error_for('name');
									echo error_for('title');
                                    echo error_for('date');
                                    echo error_for('client');
                                    echo error_for('role'); 
                                }
                            }
                        ?><center>
                        <table border=0 cellspacing="4"><tr><td>
                        <label for="name">Name:</label><br />
                        <input name="name" id="name" type="text" value="" /></td>
                        <td>
                        <label for="title">Title:</label><br />
                        <input name="title" id="title" type="text" value="" /></td>
                        <td>
                        <label for="date">Date:</label><br />
                        <input name="date" id="date" type="text" value="" /></td>
                        </tr><tr><td >
                        <label for="client">Client:</label><br />
                        <input name="client" id="client" type="text" value="" /></td>
                        <td>
                        <label for="role">Role:</label><br />
                        <input name="role" id="role" type="text" value="" /></td>
                        <td>
                        <label for="example">Example?:</label><br />
                        <input type="checkbox" name="example" value="Yes" /></td></tr>
  						<tr><td colspan="3">
                        <label for="desc">Description:</label><br />
                        <textarea cols="50" rows="4" name="desc" id="desc"></textarea></td></tr>
                        <tr><td colspan="3">
                        <label for="code">Code:</label><br />
                        <textarea cols="50" rows="4" name="code" id="code"></textarea></td></tr>
                        <tr><td colspan="3">
                        <center><input type="submit" value="Submit" /></center></td></tr></table>
                        </center>
                	</form></p>
                </div>
            </div>
            
            <div class="module"> 
                <div class="header collapsed">
                    <h1>Banner Management</h1>
                </div>
                <div class="content"> 
                    <p><?php //get_banners();?></p>
                </div>
            </div>
            
            <div class="module">
                <div class="header collapsed"> 
                    <h1>Backgrounds</h1>
                </div>
                <div class="content"> 
                    <p><?php //get_banners();?></p>
                </div>
            </div>
            
            <div class="module"> <!-- only important for styling -->
                <div class="header collapsed"> <!-- must have a class name -->
                    <h1>Misc Options</h1>
                </div>
                <div class="content"> <!-- the 'content' class is only for styling -->
                    <p><?php //get_banners();?></p>
                </div>
            </div>
            
            </p>
        </div>
    </div>
</div>

</body>
<script type='text/javascript' src="./js/jquery-1.4.2.min.js"></script>
<script type='text/javascript' src="./js/jquery.cookie.js"></script>
<script type='text/javascript' src="./js/jquery.collapsible.js"></script>
<script type="text/javascript" src="./js/thickbox.js"></script>

<script type='text/javascript'>
	$(document).ready(function() {
		$.collapsible(".module .header");
	});
</script>

<script type="text/javascript">
    function changeClass()
    {

		document.getElementById("5p").className += "active";

    }
</script>
</html>