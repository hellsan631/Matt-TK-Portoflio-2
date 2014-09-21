    	<div class="cRight" style="width:800px; height:170px; ">
        	<h2><?php echo $row['name']; ?></h2>
            <p class="text"><span class="info-sub">Client: </span><?php echo $row['client']; ?><span class="info-sub2">My Role(s): </span><?php echo $row['role']; ?><span class="info-sub2">Date:</span> <?php echo $row['date']; ?></p>
            <br /><?php if($row['example'] == 1){
					echo "<p class=\"text\"><a href=\"./content2/".$row['title']."/www/index.php\">Example Site</a></p><br />";
					}
				?>
            
            <p class="text"><?php echo $row['desc']; ?></p>
        </div>
        
        <div class="cRight" style="width:800px; height:auto; margin-top:-20px;">
        	<?php echo $row['code']; ?>
            
           