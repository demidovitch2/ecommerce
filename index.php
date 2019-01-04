<?php 

require_once("vendor/autoload.php");
use \db\Sql;

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = true;


$app = new \Slim\App(['settings' => $config]);


$app->get('/', function() {
    
	$sql = new Sql();

	$results = $sql->select("SELECT * FROM tb_users");

	echo json_encode($results);

});

$app->run();

 ?>