<?php 
session_start();
require_once("vendor/autoload.php");
use \util\Page;
use \util\PageAdmin;
use \model\User;
use \model\Category;


$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = true;


$app = new \Slim\App(['settings' => $config]);

require_once("site.php");
require_once("admin.php");
require_once("admin-users.php");
require_once("admin-categories.php");
require_once("admin-products.php");

$app->run();