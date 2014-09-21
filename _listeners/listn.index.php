<?php

include_once '../includes/defines.php';


if($_SERVER['REQUEST_METHOD'] == 'POST'){

	if(isset($_POST['submitPage'])){
		$submitPage = $_POST['submitPage'];
	}else{
		$submitPage = "portfolio";
	}

	if(isset($_POST['submitDoc']) && $_POST['submitDoc'] != ""){
		$submitDoc = $_POST['submitDoc'];
	}else{
		if(strpos($submitPage, 'portfolio') !== false){
			$submitDoc = "design";
		}else if(strpos($submitPage, 'profile') !== false){
			$submitDoc = "who";
		}else if(strpos($submitPage, 'blog') !== false){
			$submitDoc = "web";
		}else if(strpos($submitPage, 'contact') !== false){
			$submitDoc = "business";
		}else if(strpos($submitPage, 'tour') !== false){
			$submitDoc = "start";
		}else{
			$submitPage = "portfolio";
			$submitDoc = "design";
		}
	}

	if($_POST['submitType'] == 0){

		if(strpos($submitPage, 'admin') !== false){
			include "./admin.php";

			exit;
		}

		if(strpos($submitPage, 'portfolio') !== false){
			if(strpos($submitDoc,'design') !== false){
				tempContentDrop();
			}else if(strpos($submitDoc,'grid') !== false){

				include "./grid.php";

				exit;
			}else if(strpos($submitDoc, 'admin') !== false){
				include "./admin.php";

				exit;
			}
		}else if(strpos($submitPage, 'profile') !== false){
			if(strpos($submitDoc,'who') !== false){

				$echo = '
					<section class="thewho">
						<header>
							<h1>The Who</h1><br />
							<h5>These Are My Influances<br />
							& People Who Inspire Me</h5>
						</header>
						<menu>
							<a href="#" anchor="#joe"><img class="headlink" src="./images/joeface200-1.jpg" alt="Musician" /></a>
							<a href="#" anchor="#pg"><img class="headlink" src="./images/pgface200.jpg" alt="Musician" /></a>
						</menu>
						<article class="background" style="background: url(\'./images/pgbg2.jpg\') no-repeat;">
							<h1><a id="pg">Paul Gilbert</a></h1>
							<img class="personhead" src="./images/pgface200-3.jpg" alt="Paul Gilbert: The Guitar Hero" />
							<p>
								Paul "Brandon" Gilbert is an American musician, best known as the guitarist for Racer X and Mr. Big,<br />
								as well as many solo albums and numerous collaborations and guest appearances with other musicians.
							</p>
						</article>
						<article class="desc">
							Cras mi justo, porttitor eu lobortis aliquet, auctor vel mi. Proin mattis lorem in nisl interdum blandit.
							Curabitur ultricies dui eget nisl iaculis luctus. Etiam id pellentesque sapien. Curabitur iaculis, nisi lobortis sollicitudin
							commodo, nulla quam malesuada justo, nec suscipit mauris orci a ligula. Cras tellus mauris, ultrices sit amet adipiscing id,
							pellentesque nec mi.
						</article>
						<article class="background" style="background: url(\'./images/joebg.jpg\') no-repeat;">
							<h1><a id="joe">Joe Satriani</a></h1>
							<img class="personhead" src="./images/joeface200.jpg" alt="Paul Gilbert: The Guitar Hero" />
							<p>
								Joseph "Joe" Satriani is an American instrumental rock guitarist, multi-instrumentalist <br/>
								and multiple Grammy Award nominee.
							</p>
						</article>
						<article class="desc">
							Cras mi justo, porttitor eu lobortis aliquet, auctor vel mi. Proin mattis lorem in nisl interdum blandit.
							Curabitur ultricies dui eget nisl iaculis luctus. Etiam id pellentesque sapien. Curabitur iaculis, nisi lobortis sollicitudin
							commodo, nulla quam malesuada justo, nec suscipit mauris orci a ligula. Cras tellus mauris, ultrices sit amet adipiscing id,
							pellentesque nec mi.
						</article>
						<article class="background" style="background: url(\'./images/galaxy1.jpg\') no-repeat;">
						</article>
						<article class="desc">
							Cras mi justo, porttitor eu lobortis aliquet, auctor vel mi. Proin mattis lorem in nisl interdum blandit.
							Curabitur ultricies dui eget nisl iaculis luctus. Etiam id pellentesque sapien. Curabitur iaculis, nisi lobortis sollicitudin
							commodo, nulla quam malesuada justo, nec suscipit mauris orci a ligula. Cras tellus mauris, ultrices sit amet adipiscing id,
							pellentesque nec mi.
						</article>
						<article class="background" style="background: url(\'./images/galaxy1.jpg\') no-repeat;">
						</article>
						<article class="desc">
							Cras mi justo, porttitor eu lobortis aliquet, auctor vel mi. Proin mattis lorem in nisl interdum blandit.
							Curabitur ultricies dui eget nisl iaculis luctus. Etiam id pellentesque sapien. Curabitur iaculis, nisi lobortis sollicitudin
							commodo, nulla quam malesuada justo, nec suscipit mauris orci a ligula. Cras tellus mauris, ultrices sit amet adipiscing id,
							pellentesque nec mi.
						</article>
						<article class="background" style="background: url(\'./images/galaxy1.jpg\') no-repeat;">
						</article>
						<article class="desc">
							Cras mi justo, porttitor eu lobortis aliquet, auctor vel mi. Proin mattis lorem in nisl interdum blandit.
							Curabitur ultricies dui eget nisl iaculis luctus. Etiam id pellentesque sapien. Curabitur iaculis, nisi lobortis sollicitudin
							commodo, nulla quam malesuada justo, nec suscipit mauris orci a ligula. Cras tellus mauris, ultrices sit amet adipiscing id,
							pellentesque nec mi.
						</article>
						<article class="background" style="background: url(\'./images/galaxy1.jpg\') no-repeat;">
						</article>
						<article class="desc">
							Cras mi justo, porttitor eu lobortis aliquet, auctor vel mi. Proin mattis lorem in nisl interdum blandit.
							Curabitur ultricies dui eget nisl iaculis luctus. Etiam id pellentesque sapien. Curabitur iaculis, nisi lobortis sollicitudin
							commodo, nulla quam malesuada justo, nec suscipit mauris orci a ligula. Cras tellus mauris, ultrices sit amet adipiscing id,
							pellentesque nec mi.
						</article>
					</section>
				';

				echo $echo;

				exit;
			}else if(strpos($submitDoc,'hobbies') !== false){

				$echo = '
					<section class="thewho">
						<header>
							<h1>My Hobbies</h1><br />
							<h5>These Are My Many Interests<br />
							& The Things That Drive Me</h5>
						</header>
						<menu>
							<a href="#" anchor="#art"><img class="headlink" src="./images/music200.jpg" alt="Creativity" /></a>
							<a href="#" anchor="#tech"><img class="headlink" src="./images/oldpc.jpg" alt="Technology" /></a>
							<a href="#" anchor="#sci"><img class="headlink" src="./images/science.jpg" alt="Science" /></a>
							<a href="#" anchor="#entertain"><img class="headlink" src="./images/movie.jpg" alt="Entertainment" /></a>
						</menu>
						<h3>Methods of Creativity</h3>
						<section class="headimg" id="art">
							<article class="background" style="background: url(\'./images/js1200_400.jpg\') no-repeat;">
								<h1>Rock Guitar</h1>
								<p>
									Back in senior year of high school, I started playing a game called "Guitar Hero". At the time the hardest song out there was,<br />
									Guitar Hero 2\'s "Jordan" by BucketHead. After playing for a while, I began listening to buckethead a lot, and then I picked up my <br />
									first guitar. Over the past 5 years I\'ve gotten good enough to play almost any song, by ear, just listening to it a few times.
								</p>
							</article>
							<article class="background alt" style="background: url(\'./images/js1200_400.jpg\') no-repeat;">
								<h1>Rock Guitar</h1>
								<p>
									Back in senior year of high school, I started playing a game called "Guitar Hero". At the time the hardest song out there was,<br />
									Guitar Hero 2\'s "Jordan" by BucketHead. After playing for a while, I began listening to buckethead a lot, and then I picked up my <br />
									first guitar. Over the past 5 years I\'ve gotten good enough to play almost any song, by ear, just listening to it a few times.
								</p>
							</article>
						</section>
						<h3>Computers and Technology</h3>
						<section class="headimg" id="tech">
							<article class="background" style="background: url(\'./images/js1200_400.jpg\') no-repeat;">
								<h1>Rock Guitar</h1>
								<p>
									Back in senior year of high school, I started playing a game called "Guitar Hero". At the time the hardest song out there was,<br />
									Guitar Hero 2\'s "Jordan" by BucketHead. After playing for a while, I began listening to buckethead a lot, and then I picked up my <br />
									first guitar. Over the past 5 years I\'ve gotten good enough to play almost any song, by ear, just listening to it a few times.
								</p>
							</article>
							<article class="background alt" style="background: url(\'./images/js1200_400.jpg\') no-repeat;">
								<h1>Rock Guitar</h1>
								<p>
									Back in senior year of high school, I started playing a game called "Guitar Hero". At the time the hardest song out there was,<br />
									Guitar Hero 2\'s "Jordan" by BucketHead. After playing for a while, I began listening to buckethead a lot, and then I picked up my <br />
									first guitar. Over the past 5 years I\'ve gotten good enough to play almost any song, by ear, just listening to it a few times.
								</p>
							</article>
						</section>
						<h3>The Sciences</h3>
						<section class="headimg" id="sci">
							<article class="background" style="background: url(\'./images/js1200_400.jpg\') no-repeat;">
								<h1>Rock Guitar</h1>
								<p>
									Back in senior year of high school, I started playing a game called "Guitar Hero". At the time the hardest song out there was,<br />
									Guitar Hero 2\'s "Jordan" by BucketHead. After playing for a while, I began listening to buckethead a lot, and then I picked up my <br />
									first guitar. Over the past 5 years I\'ve gotten good enough to play almost any song, by ear, just listening to it a few times.
								</p>
							</article>
							<article class="background alt" style="background: url(\'./images/js1200_400.jpg\') no-repeat;">
								<h1>Rock Guitar</h1>
								<p>
									Back in senior year of high school, I started playing a game called "Guitar Hero". At the time the hardest song out there was,<br />
									Guitar Hero 2\'s "Jordan" by BucketHead. After playing for a while, I began listening to buckethead a lot, and then I picked up my <br />
									first guitar. Over the past 5 years I\'ve gotten good enough to play almost any song, by ear, just listening to it a few times.
								</p>
							</article>
						</section>
						<h3>Entertainment</h3>
						<section class="headimg" id="entertain">
							<article class="background" style="background: url(\'./images/js1200_400.jpg\') no-repeat;">
								<h1>Rock Guitar</h1>
								<p>
									Back in senior year of high school, I started playing a game called "Guitar Hero". At the time the hardest song out there was,<br />
									Guitar Hero 2\'s "Jordan" by BucketHead. After playing for a while, I began listening to buckethead a lot, and then I picked up my <br />
									first guitar. Over the past 5 years I\'ve gotten good enough to play almost any song, by ear, just listening to it a few times.
								</p>
							</article>
							<article class="background alt" style="background: url(\'./images/js1200_400.jpg\') no-repeat;">
								<h1>Rock Guitar</h1>
								<p>
									Back in senior year of high school, I started playing a game called "Guitar Hero". At the time the hardest song out there was,<br />
									Guitar Hero 2\'s "Jordan" by BucketHead. After playing for a while, I began listening to buckethead a lot, and then I picked up my <br />
									first guitar. Over the past 5 years I\'ve gotten good enough to play almost any song, by ear, just listening to it a few times.
								</p>
							</article>
						</section>
					</section>
				';

				echo $echo;

				exit;
			}else if(strpos($submitDoc,'philosophies') !== false){

				$echo = '
					<section class="thewho">
						<header>
							<h1>My Hobbies</h1><br />
							<h5>These Are My Many Interests<br />
							& The Things That Drive Me</h5>
						</header>
						<menu>
							<a href="#" anchor="#art"><img class="headlink" src="./images/music200.jpg" alt="Creativity" /></a>
							<a href="#" anchor="#tech"><img class="headlink" src="./images/oldpc.jpg" alt="Technology" /></a>
							<a href="#" anchor="#sci"><img class="headlink" src="./images/science.jpg" alt="Science" /></a>
							<a href="#" anchor="#entertain"><img class="headlink" src="./images/movie.jpg" alt="Entertainment" /></a>
						</menu>
						<h3>Methods of Creativity</h3>
						<section class="headimg" id="art">
							<article class="background" style="background: url(\'./images/js1200_400.jpg\') no-repeat;">
								<h1>Rock Guitar</h1>
								<p>
									Back in senior year of high school, I started playing a game called "Guitar Hero". At the time the hardest song out there was,<br />
									Guitar Hero 2\'s "Jordan" by BucketHead. After playing for a while, I began listening to buckethead a lot, and then I picked up my <br />
									first guitar. Over the past 5 years I\'ve gotten good enough to play almost any song, by ear, just listening to it a few times.
								</p>
							</article>
							<article class="background alt" style="background: url(\'./images/js1200_400.jpg\') no-repeat;">
								<h1>Rock Guitar</h1>
								<p>
									Back in senior year of high school, I started playing a game called "Guitar Hero". At the time the hardest song out there was,<br />
									Guitar Hero 2\'s "Jordan" by BucketHead. After playing for a while, I began listening to buckethead a lot, and then I picked up my <br />
									first guitar. Over the past 5 years I\'ve gotten good enough to play almost any song, by ear, just listening to it a few times.
								</p>
							</article>
						</section>
						<h3>Computers and Technology</h3>
						<section class="headimg" id="tech">
							<article class="background" style="background: url(\'./images/js1200_400.jpg\') no-repeat;">
								<h1>Rock Guitar</h1>
								<p>
									Back in senior year of high school, I started playing a game called "Guitar Hero". At the time the hardest song out there was,<br />
									Guitar Hero 2\'s "Jordan" by BucketHead. After playing for a while, I began listening to buckethead a lot, and then I picked up my <br />
									first guitar. Over the past 5 years I\'ve gotten good enough to play almost any song, by ear, just listening to it a few times.
								</p>
							</article>
							<article class="background alt" style="background: url(\'./images/js1200_400.jpg\') no-repeat;">
								<h1>Rock Guitar</h1>
								<p>
									Back in senior year of high school, I started playing a game called "Guitar Hero". At the time the hardest song out there was,<br />
									Guitar Hero 2\'s "Jordan" by BucketHead. After playing for a while, I began listening to buckethead a lot, and then I picked up my <br />
									first guitar. Over the past 5 years I\'ve gotten good enough to play almost any song, by ear, just listening to it a few times.
								</p>
							</article>
						</section>
						<h3>The Sciences</h3>
						<section class="headimg" id="sci">
							<article class="background" style="background: url(\'./images/js1200_400.jpg\') no-repeat;">
								<h1>Rock Guitar</h1>
								<p>
									Back in senior year of high school, I started playing a game called "Guitar Hero". At the time the hardest song out there was,<br />
									Guitar Hero 2\'s "Jordan" by BucketHead. After playing for a while, I began listening to buckethead a lot, and then I picked up my <br />
									first guitar. Over the past 5 years I\'ve gotten good enough to play almost any song, by ear, just listening to it a few times.
								</p>
							</article>
							<article class="background alt" style="background: url(\'./images/js1200_400.jpg\') no-repeat;">
								<h1>Rock Guitar</h1>
								<p>
									Back in senior year of high school, I started playing a game called "Guitar Hero". At the time the hardest song out there was,<br />
									Guitar Hero 2\'s "Jordan" by BucketHead. After playing for a while, I began listening to buckethead a lot, and then I picked up my <br />
									first guitar. Over the past 5 years I\'ve gotten good enough to play almost any song, by ear, just listening to it a few times.
								</p>
							</article>
						</section>
						<h3>Entertainment</h3>
						<section class="headimg" id="entertain">
							<article class="background" style="background: url(\'./images/js1200_400.jpg\') no-repeat;">
								<h1>Rock Guitar</h1>
								<p>
									Back in senior year of high school, I started playing a game called "Guitar Hero". At the time the hardest song out there was,<br />
									Guitar Hero 2\'s "Jordan" by BucketHead. After playing for a while, I began listening to buckethead a lot, and then I picked up my <br />
									first guitar. Over the past 5 years I\'ve gotten good enough to play almost any song, by ear, just listening to it a few times.
								</p>
							</article>
							<article class="background alt" style="background: url(\'./images/js1200_400.jpg\') no-repeat;">
								<h1>Rock Guitar</h1>
								<p>
									Back in senior year of high school, I started playing a game called "Guitar Hero". At the time the hardest song out there was,<br />
									Guitar Hero 2\'s "Jordan" by BucketHead. After playing for a while, I began listening to buckethead a lot, and then I picked up my <br />
									first guitar. Over the past 5 years I\'ve gotten good enough to play almost any song, by ear, just listening to it a few times.
								</p>
							</article>
						</section>
					</section>
				';

				echo $echo;

				exit;
			}
		}else if(strpos($submitPage, 'article') !== false){
			if(strpos($submitDoc,'2') !== false){

				$echo = 	'<article class="article">
								<header class="head" style="background: url(\'./content/screens/article/zsg/zsg_article.jpg\');">
									<h1>Zer0Sum Games</h1>
									<div class="secondary">
										<h4>Client: Daniel DiCicco</h4><h4>Role: Creative Producer</h4><h4 class="right">Date: 09/2012</h4>
										<p class="tags"><a href="'.AJAX_CHAR.'portfolio/design">Design</a>, <a href="'.AJAX_CHAR.'portfolio/develop">Developer</a>, <a href="'.AJAX_CHAR.'portfolio/graphic">Graphic</a>
											<a href="./content/www/zsg/index.php" class="right">View Example</a>
										</p>
									</div>
								</header>
								<section class="text">
									<section class="para">
										<h4>AJAX Dynamic Content</h4><img src="./content/screens/article/zsg/zsg_article_1.jpg" /><br/>
										With this project, I wanted to experiment with the capabilities of AJAX. A lot of time can be spent rendering image heavy content and loading it
										into HTML, so I decided to keep page loading smoother, that most of the context, even text, would be loaded through AJAX. The amount of queries
										is kept low enough so that it doesn\'t affect performance, and the effect it has on page rendering is a great plus.
									</section>
									<section class="para">
										<h4>SCSS Cross-browser Compatibility</h4><img src="./content/screens/article/zsg/zsg_article_2.jpg" /><br/>
										This was my first project using SCSS and Compass, a module used to code cross-browser compatible CSS3. It allowed me to design content and not
										worry about having to reformat the CSS to be displayed on different browsers. It also makes coding it quicker by using functions and variables,
										so changing several elements can be as easy as just editing one line of code.
									</section>
									<section class="para">
										<h4>JQuery Powered</h4><img src="./content/screens/article/zsg/zsg_article_3.jpg" /><br/>
										JQuery, along with JQuery UI, was used for loading and displaying AJAX content. It added another layer of user interaction with transitions and
										 animation of elements, and made managing content on a page easy. Because of this, the project was done ahead of schedule, making the total time
										 frame for this entire project around 10 days.
									</section>
								</section>
								<footer class="pictures">
									<img src="./content/screens/pagefit/zsg/thumbs/zsg_thumb_1.jpg" alt="./content/screens/pagefit/zsg/zsg_pagefit_1.jpg" />
									<img src="./content/screens/pagefit/zsg/thumbs/zsg_thumb_2.jpg" alt="./content/screens/pagefit/zsg/zsg_pagefit_2.jpg" />
									<img src="./content/screens/pagefit/zsg/thumbs/zsg_thumb_3.jpg" alt="./content/screens/pagefit/zsg/zsg_pagefit_3.jpg" />
								</footer>
							</article>';

				echo $echo;

				exit;

			}else if(strpos($submitDoc,'3') !== false){

				$echo = 	'<article class="article">
								<header class="head" style="background: url(\'./content/screens/article/logos/logos_article.jpg\');">
									<h1>Project Logos</h1>
									<div class="secondary">
										<h4>Client: Blake Zwikler</h4><h4>Role: Creative Producer</h4><h4 class="right">Date: 07/2012</h4>
										<p class="tags"><a href="'.AJAX_CHAR.'portfolio/design">Design</a>, <a href="'.AJAX_CHAR.'portfolio/develop">Developer</a>
										</p>
									</div>
								</header>
								<section class="text">
									<section class="para">
										<h4>JQuery + CSS3 Powered</h4><img src="./content/screens/article/logos/logos_article_1.jpg" /><br/>
										JQuery UI was used to animate some elements that couldn\'t be animated through the more performance conservative CSS3. Both types of animations were
										used to great effect, allowing for a smoother, more interactive user interface. Its important to keep in mind though, that when designing a dynamic UI,
										that moves according to user input, that too much movement and movement length become very important for user satisfaction.
									</section>
									<section class="para">
										<h4>AJAX User System</h4><img src="./content/screens/article/logos/logos_article_2.jpg" /><br/>
										The user login and signup system is written with an AJAX front end. This means that what the user sees is one page, but behind the scenes, multiple documents
										process the user data and handle data flow. This allows for a more secure login and signup, and a more fluid and robust front-end.
									</section>
									<section class="para">
										<h4>Clean Design</h4><img src="./content/screens/article/logos/logos_article_3.jpg" /><br/>
										The main goal of the design was to be as clean and neat as possible. Because of the large amount of user generated content, the UI needs to be both robust enough
										to handle dynamic content, and also light-weight enough to keep page size to a minimum, thus maximing performance and useability. However, too light a page would draw
										away from the asthetic of displaying varied image-based content, so this went into consideration as well.
									</section>
								</section>
								<footer class="pictures">
									<img src="./content/screens/pagefit/logos/thumbs/logos_thumb_1.jpg" alt="./content/screens/pagefit/logos/logos_pagefit_1.jpg" />
									<img src="./content/screens/pagefit/logos/thumbs/logos_thumb_2.jpg" alt="./content/screens/pagefit/logos/logos_pagefit_2.jpg" />
								</footer>
							</article>';

				echo $echo;

				exit;
			}else if(strpos($submitDoc,'4') !== false){

				$echo = 	'<article class="article">
								<header class="head" style="background: url(\'./content/screens/article/warframe/warframe_article.jpg\');">
									<h1>Warframe Timeline</h1>
									<div class="secondary">
										<h4>Client: N/A</h4><h4>Role: Design Concept</h4><h4 class="right">Date: 10/2012</h4>
										<p class="tags"><a href="'.AJAX_CHAR.'portfolio/design">Design</a>
										</p>
									</div>
								</header>
								<section class="text">
									<section class="para">
										<h4>Print Layout</h4><img src="./content/screens/article/warframe/warframe_article_1.jpg" /><br/>
										The layout of the web page was designed to tell a story. I took several conventions used in "print design" that helped mold the layout
										to better organize the ideas and concepts I wanted to get across with text. The ideas was to create something that I could organize my thoughts on,
										as well as give interested parties something to read.
									</section>
									<section class="para">
										<h4>Responsive Design</h4><img src="./content/screens/article/warframe/warframe_article_2.jpg" /><br/>
										The design of the page responds well to a changing device type and screen size. It was designed from the ground up to be accessable on multiple different
										devices and screensizes, and everything scales accordingly.
									</section>
								</section>
								<footer class="pictures">
									<img src="./content/screens/pagefit/warframe/thumbs/warframe_thumb_1.jpg" alt="./content/screens/pagefit/warframe/warframe_pagefit_1.jpg" />
									<img src="./content/screens/pagefit/warframe/thumbs/warframe_thumb_2.jpg" alt="./content/screens/pagefit/warframe/warframe_pagefit_2.jpg" />
								</footer>
								<br />
								<small>Contains images that have been modified from their original state. Images Copyright their (credited) respective owners.</small>
							</article>';

				echo $echo;

				exit;
			}else if(strpos($submitDoc,'5') !== false){

				$echo = 	'<article class="article">
								<header class="head" style="background: url(\'./content/screens/article/myold/myold_article.jpg\');">
									<h1>Web Portfolio</h1>
									<div class="secondary">
										<h4>Client: N/A</h4><h4>Role: Creative Production</h4><h4 class="right">Date: 10/2010</h4>
										<p class="tags"><a href="'.AJAX_CHAR.'portfolio/design">Design</a>, <a href="'.AJAX_CHAR.'portfolio/develop">Developer</a>
										</p>
									</div>
								</header>
								<section class="text">
									<section class="para">
										<h4>Print Layout</h4><img src="./content/screens/article/warframe/warframe_article_1.jpg" /><br/>
										The layout of the web page was designed to tell a story. I took several conventions used in "print design" that helped mold the layout
										to better organize the ideas and concepts I wanted to get across with text. The ideas was to create something that I could organize my thoughts on,
										as well as give interested parties something to read.
									</section>
									<section class="para">
										<h4>Responsive Design</h4><img src="./content/screens/article/warframe/warframe_article_2.jpg" /><br/>
										The design of the page responds well to a changing device type and screen size. It was designed from the ground up to be accessable on multiple different
										devices and screensizes, and everything scales accordingly.
									</section>
								</section>
								<footer class="pictures">
									<img src="./content/screens/pagefit/myold/thumbs/myold_thumb_1.jpg" alt="./content/screens/pagefit/myold/myold_pagefit_1.jpg" />
									<img src="./content/screens/pagefit/myold/thumbs/myold_thumb_2.jpg" alt="./content/screens/pagefit/myold/myold_pagefit_2.jpg" />
									<img src="./content/screens/pagefit/myold/thumbs/myold_thumb_3.jpg" alt="./content/screens/pagefit/myold/myold_pagefit_3.jpg" />
								</footer>
								<br />
								<small>Contains images that have been modified from their original state. Images Copyright their (credited) respective owners.</small>
							</article>';

				echo $echo;

				exit;
			}
		}

		tempContentDrop();

		echo $submitPage."/".$submitDoc;
	}
}

function tempContentDrop(){
	$echo = '<article class="long">
				<section class="text">
					<h1>Zer0Sum Games</h1>
					<h3>An Indie Game Developer Studio</h3>
					<p>Empehsis on AJAX and SCSS for dynamic content and compatability,
					This Space-themed news/portfolio website turned into a very solid project.</p>
					<a href="'.AJAX_CHAR.'article/2"><h5>View Project</h5></a>
				</section>
				<section class="img">
					<img class="longhead" src="./content/screens/longhead/zsg_long.jpg" />
				</section>
			</article>';

	echo $echo;

	$echo = '<article class="long alt">
	<section class="text">
	<h1>Logos</h1>
	<h3>A Social Networking Platform for Gamers</h3>
	<p>Starting off as a busniess concept, focus was a clean and simple look,
	using light colors and minimal css3 for browser performance.</p>
	<a href="'.AJAX_CHAR.'article/3"><h5>View Project</h5></a>
	</section>
	<section class="img">
	<img class="longhead" src="./content/screens/longhead/logos_long.jpg" />
	</section>
	</article>';

	echo $echo;

	$echo = '<article class="long alt">
	<section class="text">
	<h1>Story Timeline</h1>
	<h3>Finding The Best Way to Tell a Story</h3>
	<p>While comming up with a backstory to a game for fun, I needed a way
	to display my ideas logcially for mass consumtion. This is what happened.</p>
	<a href="'.AJAX_CHAR.'article/4"><h5>View Project</h5></a>
	</section>
	<section class="img">
	<img class="longhead" src="./content/screens/longhead/warframe_long.jpg" />
	</section>
	</article>';

	echo $echo;

	$echo = '<article class="long">
	<section class="text">
	<h1>Portfolio</h1>
	<h3>Web Designer/Developer Portfolio</h3>
	<p>My old portfolio, designed to be easy to navigate,
	and display my work in an organized way.</p>
	<a href="'.AJAX_CHAR.'article/5"><h5>View Project</h5></a>
	</section>
	<section class="img">
	<img class="longhead" src="./content/screens/longhead/myold_long.jpg" />
	</section>
	</article>';

	echo $echo;

	exit;
}

?>