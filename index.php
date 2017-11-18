<?php
require 'vendor/autoload.php';

$app = new Slim\App ();

$container = $app->getContainer ();

$container ['view'] = function ($c) {
	$view = new \Slim\Views\Twig ( 'templates', [ 
			'cache' => 'cache' 
	] );
	
	// Instantiate and add Slim specific extension
	$basePath = rtrim ( str_ireplace ( 'index.php', '', $c ['request']->getUri ()->getBasePath () ), '/' );
	$view->addExtension ( new \Slim\Views\TwigExtension ( $c ['router'], $basePath ) );
	
	return $view;
};

$app->get ( '/', function ($request, $response, $args) {
	return $this->view->render ( $response, 'form.html', [ ] );
} );

$app->post ( '/', function ($request, $response, $args) {
	session_start();
	$id = $_POST['id'];
	$age = $_POST['age'];
	$sex = $_POST['sex'];
	$married = $_POST['married'];
	$housing = $_POST['housing'];
	$roof = $_POST['roof'];
	$_SESSION['id'] = $id;
	$_SESSION['age'] = $age;
	$_SESSION['sex'] = $sex;
	$_SESSION['married'] = $married;
	$_SESSION['housing'] = $housing;
	$_SESSION['roof'] = $roof;
} );

$app->run ();
?>
