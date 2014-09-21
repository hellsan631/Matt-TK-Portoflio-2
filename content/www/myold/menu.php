			<ul id="menu">
            	<li class="p"><a id="1p" href="./index.php" >portfolio</a></li>
                <li class="p"><a id="2p" href="about.php" >about</a></li>
                <li class="p"><a id="3p" href="http://www.youtube.com/hellsan631" >random</a></li>
                <li class="p"><a id="4p" href="contact.php" >contact</a></li>
                <?php $cuser = current_user(); 
						if(!isset($cuser)){echo "<li class=\"p\"><a id=\"5p\" href=\"./login.php\" >login</a></li>";}
						else{echo "<li class=\"p\"><a id=\"5p\" href=\"./admin.php\" >admin</a></li>";
							 echo "<li class=\"p\"><a id=\"6p\" href=\"./logout.php\" >logout</a></li>";}?>
            </ul>
            
            <ul id="menu2">
            	<?php display_menu(); ?>
            </ul>