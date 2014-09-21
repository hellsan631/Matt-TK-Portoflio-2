<?php

session_start();
require_once './_objects/class.logos.setup.php';
$page = new logos('./');
require_once ROOT_PATH.CLASS_PATH.'class.database.php';
$db = new DB();
$errors = 0;

$query ="CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `last_news_item_id` int(11) NOT NULL,
  `home_page` mediumtext CHARACTER SET latin1 NOT NULL,
  `games_page` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `contact` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `company` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2;";

$result = DB::sql($query);

if(!$result){
	$errors++;
}

$query ="CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text CHARACTER SET latin1 NOT NULL,
  `content` mediumtext CHARACTER SET latin1 NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type` int(11) NOT NULL DEFAULT '0',
  `blurb` text CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8;";

$result = DB::sql($query);

if(!$result){
	$errors++;
}

$query ="CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `salt` varchar(40) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `password` varchar(40) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `avatar` varchar(150) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT './images/default_profile/profile.png',
  `userlevel` int(11) NOT NULL DEFAULT '5',
  `fname` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `lname` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `logins` int(11) NOT NULL DEFAULT '0',
  `lastip` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '0',
  `lastlogindate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `username` (`username`,`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16;";

$result = DB::sql($query);

if(!$result){
	$errors++;
}
$query ="INSERT INTO `admin` (`id`, `last_news_item_id`, `home_page`, `games_page`, `contact`, `company`) VALUES
(1, 7, 'Nullam euismod lacus eget risus consequat feugiat. Maecenas varius \ninterdum urna, sed vehicula massa condimentum vitae. <b>Ut vestibulum \ngravida nunc</b>, sed lobortis arcu aliquam in. Cras consectetur nisi non \nmassa porta vel mollis libero bibendum. <br><br>Vivamus dignissim aliquam \ninterdum. Aliquam odio tortor, imperdiet id pretium sed, facilisis vitae\n ligula. Fusce ullamcorper dictum dictum. Suspendisse ultricies, orci eu\n iaculis iaculis, tortor ipsum sodales nulla, non iaculis elit mi sit \namet erat.<br>\n<br>Pellentesque tristique iaculis leo vel eleifend. Praesent luctus dictum \ncongue. Vestibulum lacinia commodo neque vel tincidunt. <b>Integer ultrices\n sem sed metus consequat ac feugiat lorem ornare. Duis bibendum \nfacilisis nisi at fermentum.</b> Curabitur lorem enim, porta a luctus vel, \nmalesuada at nisl. Aenean bibendum euismod blandit. Quisque id metus \nquis tellus fringilla imperdiet. Suspendisse nec augue est, sed dapibus \nest.<br>', '<div class=\"gameItem\"><h1>StarDrive</h1><br />\n<div style=\"float:left; display:inline-block;\"><img src=\"./images/sdbox_smaller.jpg\" /></div>\n<div class=\"gameInfo\"><ul>\n<li><strong>Release Date:</strong> 2013</li>\n<li><strong>Platforms:</strong> PC</li>\n<li><strong>Genre:</strong> 4x Action Strategy</li>\n<li><strong>Players:</strong> 1 to 8</li>\n<li><strong>Engine:</strong> SunBurn 2.0</li>\n</ul></div>\n<div style=\"float:right; display:inline-block;\"><a href=\"http://www.stardrivegame.com/\"><img src=\"./images/sdlogo.jpg\" /></a></div>\n<br />\n<div class=\"gameDesc\">\nStarDrive is a 4X Action-Strategy game where the goal is to build a space empire.<br />\n<br />\nStarting with a single planet and a small number of space-worthy vessels, you forge out into the galaxy, exploring new worlds, building new colonies, and discovering the StarDrive universe.<br />\n<br />\nThe heart of StarDrive is its ship design and combat engine.<br />\n<br />\nStarDrive takes a module-based approach to ship design, allowing the player to create custom ship designs where the composition and placement of ship modules really matters to the performance of a ship in combat. In combat, if your portside armor is taking a beating, then rotate around and show them the starboard side! Hide behind a friendly capital ship''s shields, warp into and out of the fray, launch fighters, lay mines, and so much more.<br />\n</div>\n</div>', '<h2>Contact Us</h2><br><br>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.<br><br>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.<br>', '<h2>What is Zer0sum Games?</h2><br>\nZer0sum games is a humble independent game studio in Portland, Oregon. And by humble, I mean to say that there is only one person working here (me, Dan).  However, I have a really wonderful artist named Ariel Chai who lives in Australia, and he is a freelance artist who has created all of these beautiful ships and ship modules. <br>');";

$result = DB::sql($query);

if(!$result){
	$errors++;
}

$query ="INSERT INTO `news` (`id`, `title`, `content`, `date`, `type`, `blurb`) VALUES
(1, 'All The Things', '<i>Nunc ligula nisi, tempor sed commodo non, ultricies ut tortor. </i>\nMaecenas ligula sem, molestie in euismod id, tristique sed sapien. Proin\n auctor orci ut eros tempor pellentesque commodo neque varius. Ut \nsagittis tincidunt orci, a condimentum lorem tristique eget. \nPellentesque habitant morbi tristique senectus et netus et malesuada \nfames ac turpis egestas. Morbi eu mattis arcu. Phasellus volutpat est \nvel lectus tincidunt convallis quis ut eros. Nam et luctus mauris. In \ncursus dui in ipsum tempus facilisis. <b>Vestibulum mauris turpis, \ndignissim ac ornare viverra, consectetur eu enim.\n</b>\n<p>\nAenean vitae nunc tortor. Mauris ut massa pulvinar sapien vehicula \nfermentum. Nullam et magna nisi, ut imperdiet velit. Sed ornare, libero \net dictum gravida, nisi purus aliquet dolor, dictum facilisis libero \nmassa ut eros. Vestibulum sagittis dui in felis lacinia in sodales odio \nfacilisis. Vivamus non magna felis, sit amet tempor sapien. Maecenas sed\n erat mi, vel congue elit. Morbi justo massa, iaculis vitae egestas \nscelerisque, convallis eu est. <i>Proin et felis at felis condimentum \nlaoreet.\n</i></p>', '2012-09-07 03:00:19', 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam in urna \nturpis. Sed id turpis et leo convallis porta. <i>Vivamus tempus, quam a \nposuere cursus,</i> sapien lorem imperdiet tellus, sit amet posuere nulla \ndiam id leo.<br><br>'),
(2, 'Ways to Fallout', 'Pellentesque habitant morbi tristique senectus et netus et malesuada \nfames ac turpis egestas. Morbi eu turpis sed arcu consectetur semper \nvitae porttitor risus. Ut adipiscing tellus aliquet eros facilisis \nullamcorper. Phasellus enim lectus, <b>lobortis vitae varius sit amet</b>, \nfacilisis sit amet nunc. Nam gravida ligula urna. Curabitur molestie \ndolor vel orci laoreet egestas. Maecenas ipsum neque, feugiat in \nfaucibus eu, mollis nec elit. Vivamus ac purus quam.\n\n<p>\nCras quis ipsum non ipsum fermentum dignissim eu lacinia dui. \nPellentesque eget blandit urna. Nam sed ipsum egestas libero varius \nsollicitudin. Pellentesque a lorem elit. Cras auctor nibh id erat \nrhoncus vel adipiscing elit convallis. Vestibulum viverra lacinia dolor \neget iaculis. Aenean id massa erat. In in nibh sed velit condimentum \nscelerisque. Phasellus eu felis at tortor laoreet tristique. Donec \nornare, sapien adipiscing pretium pretium, enim dui tristique lorem, in \niaculis sapien magna non magna. Aenean id mattis velit. Sed et leo at \nenim consectetur pellentesque vel vitae lacus. Etiam arcu enim, \nscelerisque id convallis ac, faucibus eget arcu. Donec turpis lorem, \nfeugiat eget rutrum vitae, semper a tortor. Sed tristique, enim quis \nimperdiet adipiscing, metus tortor volutpat mi, non ultrices tellus orci\n et justo.\n</p>', '2012-09-08 02:22:14', 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nunc \nlibero, suscipit et ultrices vestibulum, consectetur ac magna. Sed non \nnulla eros. Donec ultrices fringilla purus.'),
(3, 'All This Swagger', 'Ut sagittis tincidunt orci, a condimentum lorem tristique eget. \nPellentesque habitant morbi tristique senectus et netus et malesuada \nfames ac turpis egestas. Morbi eu mattis arcu. Phasellus volutpat est \nvel lectus tincidunt convallis quis ut eros. Nam et luctus mauris. In \ncursus dui in ipsum tempus facilisis. Vestibulum mauris turpis, \ndignissim ac ornare viverra, consectetur eu enim.\n\n<p>\nAenean vitae nunc tortor. Mauris ut massa pulvinar sapien vehicula \nfermentum. Nullam et magna nisi, ut imperdiet velit. Sed ornare, libero \net dictum gravida, nisi purus aliquet dolor, dictum facilisis libero \nmassa ut eros. Vestibulum sagittis dui in felis lacinia in sodales odio \nfacilisis. Vivamus non magna felis, sit amet tempor sapien. Maecenas sed\n erat mi, vel congue elit. Morbi justo massa, iaculis vitae egestas \nscelerisque, convallis eu est. Proin et felis at felis condimentum \nlaoreet. <br></p>', '2012-09-08 23:57:04', 0, '<img src=\"./images/bear.jpg\" class=\"sideimg\"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam in urna \nturpis. Sed id turpis et leo convallis porta. Vivamus tempus, quam a \nposuere cursus, sapien lorem imperdiet tellus, sit amet posuere nulla \ndiam id leo.'),
(5, 'Down They Came', '<p>\nSuspendisse et libero a nunc suscipit sodales a eget ipsum. Donec \ncursus, erat in vehicula molestie, lorem tortor placerat ipsum, \ntincidunt ultricies ante dolor eget lectus. Donec sapien augue, bibendum\n in ullamcorper vel, dictum quis leo. Praesent quis orci dignissim \nsapien ullamcorper facilisis. Aliquam a accumsan arcu. Fusce luctus \nadipiscing facilisis. In hac habitasse platea dictumst.\n</p>\n<p>\nNullam ultricies, dui eget bibendum porta, arcu massa auctor magna, eu \nsuscipit nisi orci sed nunc. Maecenas at interdum est. Sed id ante quis \nnunc gravida cursus sed non massa. Nullam sit amet nisl mauris. Nulla \ndui augue, auctor sed semper eget, egestas ut risus. Cras non velit eget\n augue porta facilisis. Suspendisse sollicitudin magna ac nulla \npellentesque nec bibendum sem mattis. Nulla sit amet nulla nibh, ut \negestas tellus. Nam vehicula, diam non posuere sollicitudin, eros enim \nornare dolor, sed varius mauris turpis at velit. Suspendisse potenti. \nSuspendisse auctor sapien eu risus rutrum ultricies.\n</p>', '2012-09-09 00:37:07', 0, 'Sed suscipit dictum volutpat. Morbi nunc massa, varius a interdum in, \ntempor et velit. Mauris egestas pharetra lectus. Maecenas id felis id \njusto eleifend iaculis. Praesent diam dolor, ornare vel porta a, \ninterdum nec augue. Etiam ut ligula eros. Etiam volutpat cursus leo a \naliquet. Aliquam vel porta risus. Nam sapien mauris, sollicitudin \nultrices volutpat nec, dignissim ac dolor. Cras eget vestibulum sapien. \nPellentesque a lectus elit. Nulla molestie malesuada tellus, vitae \nluctus nulla accumsan nec.\n'),
(6, 'Testing The Limits', 'Vivamus vulputate, tortor in interdum sollicitudin, ante urna fringilla \nmetus, eu tristique diam tortor eget diam. Vivamus gravida auctor \niaculis. <br><br>Morbi luctus ligula quis augue dignissim fermentum. Ut \nultricies pretium eleifend. Donec eleifend ligula at nibh rhoncus \ncongue. Phasellus quis tincidunt diam. Praesent condimentum est quis \nmassa faucibus iaculis.\n\n<p>\nVivamus interdum sagittis aliquam. Duis elementum rhoncus vulputate. \nSuspendisse molestie, tellus vel congue sodales, orci quam elementum \nurna, nec tristique nunc nisl luctus eros. Mauris fringilla erat ut urna\n auctor nec tristique magna molestie. Praesent pulvinar porttitor \nvenenatis. Aenean neque purus, dictum a fringilla id, ultrices id arcu. \nCras vitae euismod urna.\n</p>\n<p>\nCras ac diam tellus, eu consequat ipsum. Nam tristique lacus ut dui \nvestibulum cursus. Proin dolor quam, ultricies sit amet consequat vel, \nvulputate id lectus. Phasellus sollicitudin orci non dui vehicula \nultrices varius lectus porta. Suspendisse interdum, ligula et rutrum \ntempus, libero felis mollis arcu, at ullamcorper leo diam pharetra \npurus. <br></p><p>Pellentesque felis mauris, elementum eu interdum in, vehicula \neget tortor. Cras luctus tincidunt nunc, ut malesuada risus pretium id. \nDuis purus ipsum, fringilla ut ornare quis, mollis in metus. Cras \nultricies massa eget lectus viverra blandit ut vel augue. Cras auctor \nrisus nisi. Cras ut tincidunt lectus.\n</p>', '2012-09-09 00:49:58', 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut et orci \nnibh. Vestibulum at lorem vel velit tincidunt pellentesque quis at \nlectus. Quisque purus risus, pellentesque ac porta ac, congue vitae \nmauris. Duis non diam odio, ut rutrum nisi. Aliquam nec lectus vitae \nquam euismod interdum.'),
(7, 'Not Again', 'Cras consectetur nisi non massa porta vel mollis libero bibendum. \nVivamus dignissim aliquam interdum. Aliquam odio tortor, imperdiet id \npretium sed, facilisis vitae ligula. Fusce ullamcorper dictum dictum. \nSuspendisse ultricies, orci eu iaculis iaculis, tortor ipsum sodales \nnulla, non iaculis elit mi sit amet erat. <br><br>Etiam accumsan, dui eu iaculis\n ullamcorper, odio sapien ultricies augue, at lobortis augue ipsum nec \nmagna. Class aptent taciti sociosqu ad litora torquent per conubia \nnostra, per inceptos himenaeos. Nunc sed arcu sem, sed elementum nisi. \nQuisque est risus, imperdiet vitae auctor nec, aliquet a tortor. Sed \nvarius nunc in nunc iaculis posuere. Duis egestas aliquet diam. Ut \npulvinar rutrum urna a viverra. Sed ut odio nunc, ut hendrerit leo.\n', '2012-09-09 03:05:40', 0, '<img src=\"./images/bear.jpg\" class=\"sideimg\"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam in urna \nturpis. Sed id turpis et leo convallis porta. Vivamus tempus, quam a \nposuere cursus, sapien lorem imperdiet tellus, sit amet posuere nulla \ndiam id leo.');";

$result = DB::sql($query);

if(!$result){
	$errors++;
}
$query ="INSERT INTO `users` (`id`, `username`, `email`, `salt`, `password`, `avatar`, `userlevel`, `fname`, `lname`, `logins`, `lastip`, `lastlogindate`) VALUES
(15, 'Admin', 'Admin', '4211660f4df9e0678b1db4cc21bb4396', '8c832b0acc555b62a28957a452491984', './images/default_profile/profile.png', 0, '', '', 2, '127.0.0.1', '2012-09-12 08:03:42');";
$result = DB::sql($query);

if(!$result){
	$errors++;
}

if($errors > 0){
	e::fail("Failure", 'mysql');
}else{
	echo "Success!";
}
?>