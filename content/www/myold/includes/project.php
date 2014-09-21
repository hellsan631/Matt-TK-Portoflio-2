<?php

$errors = array();

// If request is a form submission
if($_SERVER['REQUEST_METHOD'] == 'POST'){

  	// Check anything is non-blank
  	if(0 === preg_match("/\S+/", $_POST['name'])){
    	$errors['name'] = "Please enter a name.";
  	}
  	if(0 === preg_match("/\S+/", $_POST['date'])){
    	$errors['date'] = "Please enter a date.";
  	}
  	if(0 === preg_match("/\S+/", $_POST['client'])){
    	$errors['client'] = "Please enter a client.";
  	}
  	if(0 === preg_match("/\S+/", $_POST['role'])){
    	$errors['role'] = "Please enter a role.";
  	}
  
  	// If no validation errors
  	if(0 === count($errors)){
    
		// Sanitize inputs
		$name = $_POST['name'];
		$date = $_POST['date'];
		$desc = $_POST['desc'];
		$client = $_POST['client'];
		$role = $_POST['role'];
		$code = $_POST['code'];
		$title = $_POST['title'];
		if(isset($_POST['example'])){
			$example = 1;
			}
		else{
			$example = 0;
			}
			
		$query = 0;
		$result = 0;
		
		if(isset($_POST['id'])){			
			$id = (int)$_POST['id'];
			// updates the db with the submited values if the id is set (which should be auto-generated)
			$query = "UPDATE `projects` SET `name` = '$name', `date` = '$date', `desc` = '$desc', `client` = '$client', `role` = '$role', `code` = '$code', `title` = '$title', `example` = '$example' WHERE `id` = '$id' ";	
					
		}else{
			// Insert user into the database
			$query = "INSERT INTO `projects` 
				 ( `name`,  `date`,  `desc`,  `client`,  `role`,  `code`,  `title`,  `example`)
				 VALUES
				 ('$name', '$date', '$desc', '$client', '$role', '$code', '$title', '$example')";
		}
		
		$result = mysql_query($query);
		if (!$result) {
    		die('Invalid query: ' . mysql_error());
		}
		
		// if successfully updated.
		if($result){
			
			if(isset($_POST['id'])){
				echo "Updated Record - ".$name;
			}else{
				echo "Added Record - ".$name;
			}
			
		}else{
			echo "ERROR";
		}
			
		if(mysql_errno() === 0){
		  echo "Registration successful";
		} elseif (preg_match("/^Duplicate.*email.*/i", mysql_error())){
		  $errors['nane'] = "name has already been used.";
		}  
  	}else{
	  header("Location: ./admin.php?p=1");
	}
}

// Helpers
function error_for($class){
  	global $errors;
  	if(0 === count($errors)){
	}else{
		if($errors[$class]){
			return "<div class='form_error'>" . $errors[$class] . "</div>";
		}
	}
}

function h($string){
  return htmlspecialchars($string);
}

function get_projects(){
	$query = "SELECT *
            FROM `projects` ";
			
	$result = mysql_query($query) or die(mysql_error());

	echo "<table class=\"data_table\" border=0 width=\"780\">";
	echo "<tr style=\"font-weight: bold; font-size:13px;\"><td>ID</td><td>TITLE</td><td>NAME</td><td>DATE</td><td>CLIENT</td><td>ROLE</td><td>ACTION</td></tr>";
	while($row = mysql_fetch_array($result)){
		echo "<tr><td>".$row['id']."</td><td>".$row['title']."</td><td>".$row['name']."</td><td>".$row['date']."</td><td>".$row['client']."</td><td>".$row['role']."</td>
		<td><a href=\"./edit.php?e=".$row['id']."&keepThis=true&TB_iframe=true&height=360&width=500\" title=\" Editing the '".$row['name']."' Record\" class=\"thickbox\">edit</a> - <a href=\"./admin.php?d=".$row['id']."\" onclick=\"return confirm('Really Delete ".$row['name']."?');\">del</a></td></tr>";

	}
	echo "</table>";
}

function display_menu(){
	$query = "SELECT *
            FROM `projects` ORDER BY `id` DESC";
            
	$result = mysql_query($query) or die(mysql_error());

	while($row = mysql_fetch_array($result)){
		echo "<li class=\"s\"><a id=\"".$row['id']."s\" href=\"./index.php?p=".$row['id']."\">".$row['name']."</a></li>";
	}
}

function delete_project($id){
	mysql_query("DELETE FROM `projects` WHERE `id` = '$id'") or die(mysql_error()); 
	
	return true;
}

?>
