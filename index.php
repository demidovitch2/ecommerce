<?php 

require_once("vendor/autoload.php");
use \util\Page;

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = true;


$app = new \Slim\App(['settings' => $config]);


$app->get('/', function() {
    
	$page = new Page();

	$page->setTpl("index");

});

$app->run();

 ?>