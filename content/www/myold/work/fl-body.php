    	<div class="cRight" style="width:800px; height:170px; ">
        	<h2><?php echo $result['name']; ?></h2>
            <p class="text"><span class="info-sub">Client: </span><?php echo $result['client']; ?><span class="info-sub2">My Role(s): </span><?php echo $result['role']; ?><span class="info-sub2">Date:</span> <?php echo $result['date']; ?></p>
            
            <p class="text"><?php echo $result['desc']; ?></p>
        </div>
        
        <div class="cRight" style="width:800px; height:auto; margin-top:30px;">
        	<?php echo $result['code']; ?>
            
           