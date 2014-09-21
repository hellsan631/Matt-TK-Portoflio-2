<?php

require_once "backend.php";

Config::write('db.host', 'localhost');
Config::write('db.base', 'side_ec5f61bd4e');
Config::write('db.user', 'be1c4e2c6b8dc6');
Config::write('db.password', '61c10605');
Config::write('salt', '#6nm2h90Bfp-HAT1kh14Icx8BRQn192W2r1"*8AHj005KZ76AI4Qa163P4Gm4J3D');

global $core;

try {
	$core = Core::getInstance();
}catch(Exception $e){
	print_r("PDO Connection Exception Occurred");
}

?>