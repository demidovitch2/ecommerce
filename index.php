<?php 

require_once("vendor/autoload.php");

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = true;


$app = new \Slim\App(['settings' => $config]);


$app->get('/', function() {
    
	echo "OK";

});

$app->run();

 ?>