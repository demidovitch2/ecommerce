<?php 

require_once("vendor/autoload.php");
use \util\Page;
use \util\PageAdmin;

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = true;


$app = new \Slim\App(['settings' => $config]);


$app->get('/', function() {
    
	$page = new Page();

	$page->setTpl("index");

});

$app->get('/admin', function() {
    
	$page = new PageAdmin();

	$page->setTpl("index");

});

$app->run();

 ?>