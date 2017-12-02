<?php
require 'db.php';
require 'vendor/autoload.php';
function validate($id, $age, $sex, $married, $housing, $roof) {
	$error = [ ];
	if (! is_numeric ( $age ) || $age === "") {
		$error ['age'] = '年齢が数値ではありません';
	}
	if (! is_numeric ( $sex ) || $sex === "") {
		$error ['sex'] = '性別が正しく送信できていません';
	}
	if (! is_numeric ( $married ) || $married === "") {
		$error ['married'] = '既婚者どうかが送信できていません';
	}
	if (! is_numeric ( $housing ) || $housing === "") {
		$error ['housing'] = 'housingが送信できていません';
	}
	if (! is_numeric ( $roof ) || $roof === "") {
		$error ['roof'] = 'roofが正しく送信できていません';
	}
	return $error;
}

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
	session_start ();
	$age = $_SESSION ['age'];
	$sex = $_SESSION ['sex'];
	$married = $_SESSION ['married'];
	$housing = $_SESSION ['housing'];
	$roof = $_SESSION ['roof'];
	return $this->view->render ( $response, 'form.html', [ 
			'age' => $age,
			'sex' => $sex,
			'married' => $married,
			'housing' => $housing,
			'roof' => $roof 
	] );
} );

$app->post ( '/', function ($request, $response, $args) {
	session_start ();
	$age = $_POST ['age'];
	$sex = $_POST ['sex'];
	$married = $_POST ['married'];
	$housing = $_POST ['housing'];
	$roof = $_POST ['roof'];
	$error = validate ( $id, $age, $sex, $married, $housing, $roof );
	if (count ( $error ) !== 0) {
		echo "ダメです。\n";
		echo $roof + "\n";
		foreach ( $error as $key => $value ) {
			echo $value . "\n";
		}
		return;
	}
	$_SESSION ['age'] = $age;
	$_SESSION ['sex'] = $sex;
	$_SESSION ['married'] = $married;
	$_SESSION ['housing'] = $housing;
	$_SESSION ['roof'] = $roof;
	
	try {
		$db = getDB ();
		insert_Data($db, 2, $age, $sex, $married, $housing, $roof);
	} catch ( PDOException $e ) {
		echo $e->getMessage () . "\n";
	}
} );

$app->run ();
?>
