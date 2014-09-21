<div id="footer-hr" class="bg">
	<?php 
		include("scripts.php");
		?>
</div>

<div id="footer" class="bg">
	<div id="content-inner">
		<div id="story" class="cLeft" style="width:310px; margin-top:-25px; z-index:1;">
			<div id="weblinks"><img src="./images/link-head.png" />
				<ul id="bottom-links">
					<li><a href="http://reverbnation.com/tomperlongo">Reverb Nation</a> - main collection of music</li>
           			<li><a href="http://eyerocksradio.com/tom-perlongo.html">Eye Rocks Radio</a> - tom perlongo on the radio</li>
            		<li><a href="http://youtube.com/The2Strats">Youtube</a> - a collection of music videos</li>
            		<li><a href="http://www.facebook.com/pages/Tom-Perlongo-Musicians-Page/365515529904">Facebook</a> - tom's personal facebook</li>
            		<li><a href="http://soundcloud.com/tom-perlongo/">SoundCloud</a> - fireycat studios music</li>
				</ul>
        	</div>
		</div>

		<div id="story" class="cMiddle" style="width:190px; height:250px; margin-top:-25px;"><div id="playerbg"><img style="visibility:hidden;width:0px;height:0px;" border=0 width=0 height=0 src="http://c.gigcount.com/wildfire/IMP/CXNID=2000002.0NXC/bT*xJmx*PTEzMTA3ODA*NzA3MTYmcHQ9MTMxMDc4MDQ3NDE*MSZwPTI3MDgxJmQ9cHJvX3BsYXllcl9maXJzdF9nZW4mZz*xJm89/MGJhZjM2MjljM2NhNGZiMzk3Y2QyMzg1NTg*MGM4M2Mmb2Y9MA==.gif" /><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="190" height="250"><param name="movie" value="http://cache.reverbnation.com/widgets/swf/40/pro_widget.swf?id=artist_699385&posted_by=&skin_id=PWAS1008&font_color=333333&auto_play=false&shuffle=false"></param><param name="allowscriptaccess" value="always"></param><param name="allowNetworking" value="all"></param><param name="allowfullscreen" value="true"></param><param name="wmode" value="transparent"></param><param name="quality" value="best"></param><embed src="http://cache.reverbnation.com/widgets/swf/40/pro_widget.swf?id=artist_699385&posted_by=&skin_id=PWAS1008&font_color=333333&auto_play=false&shuffle=false" type="application/x-shockwave-flash" allowscriptaccess="always" allowNetworking="all" allowfullscreen="true" wmode="transparent" quality="best" width="190" height="250"></embed></object></div></div>

		<div id="story" class="cRight" style="width:450px; margin-top:-25px;">
			<div class="latest-tweets">
    			<a href="http://twitter.com/TomPerlongo/" border="0"><img src="./images/twitter-head.png" border="0"/></a><br /><br /><br />
				<?php 
					function getTweets(){
						$twitter = new Twitter;
						$results = $twitter->get_tweets("TomPerlongo",3,"America/Denver");
		
						echo $results;
					}

					getTweets();
				?>
			</div>

		</div>
		
	</div>
    <div id="story" style="margin-left:-45px; margin-top:235px;">
				<hr width="800"/><center>
				Copyright (c) Tom Perlongo 2011. Designed by <a href="http://MATHEW-KLEPPIN.TK">Mathew Kleppin</a>.
				</center>
    </div>
</div>

</body>

</html>