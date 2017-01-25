<?php

require 'vendor/autoload.php';

$app = new \Slim\Slim();

/*Lista de empleados*/
$app->get('/', function() use($app) {

   $data =  file_get_contents('employees.json');
   $empleados = json_decode($data, true);

   $app->render('index.php', compact('empleados'));
});

/*Detalle de empleado*/
$app->get('/:id', function($id) use($app) {

    $data =  file_get_contents('employees.json');
    $empleados = json_decode($data, true);

    $app->render('details.php', compact('id', 'empleados'));
});

/*Web service XML*/
$app->get('/ws/', function() use($app) {

	$app->response()->header("Content-Type", "text/xml");

	$data =  file_get_contents('employees.json');
    $empleados = json_decode($data, true);
	
	$xml = new SimpleXMLElement('<root/>');
	array_flip($empleados);
	array_walk_recursive($empleados, array($xml, 'addChild'));
	print $xml->asXML();
	
});

$app->run();