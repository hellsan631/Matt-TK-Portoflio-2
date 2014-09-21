<div class="cRight" style="width:800px; height:170px; ">
        	<div class="cLeft" style="width:370px; height:150px; padding-top:55px;"><p class="text2" style="font-size:12px;">welcome to my personal website and portfolio. here you can get all the latest 
            	updates on any projects i'm working on, as well as any inspirations i may have<br /><br />
                this website was entirely coded by me (minus a couple of javascripts), including the graphical work. everything was written in php and javascript, from the ground up, to be a dynamic and easy to manage framework</p></div> 
            <div class="cRight" style="width:370px; height:150px; padding-top:28px; padding-right:15px;"><a href="http://twitter.com/hellsan631">twitter://hellsan631</a><?php 
					function getTweets(){
						$twitter = new Twitter;
						$results = $twitter->get_tweets("HellsAn631",2,"America/Denver");
		
						echo $results;
					}

					getTweets();
				?></div>
        </div>
        
        <div class="cRight" style="width:800px; height:auto; margin-top:30px;">
        	