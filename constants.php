<?php

$server = $_SERVER['SERVER_NAME'];

if (stristr($server,"localhost")){
	//my local settings:
	define("HOST","localhost");
	define("USERID", "root");
	define("PASSWORD", "root");
	define("DB", "cigars");
}
else{
	//server settings:
	define("HOST","localhost");
	define("USERID", "pspfrf_andrew");
	define("PASSWORD", "cisc158fall2014");
	define("DB", "pspfrf_andrew");
}
?>