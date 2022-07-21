<?php

//timezone

date_default_timezone_set('America/Sao_Paulo');


require 'environment.php';

global $config;
$config = array();
if(ENVIRONMENT == 'development') {
	define('BD_SERVIDOR','localhost');
	define('BD_USUARIO','root');
	define('BD_SENHA','root');
	define('BD_BANCO','inmes_bd2020dist');
} else {
	define('BD_SERVIDOR','localhost');
	define('BD_USUARIO','inmes_bd2020dist');
	define('BD_SENHA','%&)ckJDYyVxI');
	define('BD_BANCO','inmes_bd2020dist');
}
?>

