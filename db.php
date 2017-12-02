<?php
function getDB() {
	try {
		$pdo = new PDO ( 'sqlite:MyDatatest.csdb' );
		$pdo->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		$pdo->setAttribute ( PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC );
		return $pdo;
	} catch ( Exception $e ) {
		echo $e->getMessage () . PHP_EOL;
	}
}
function getMAX($db, $table_name, $column) {
	$sql = "select max(".$column. ") from " . $table_name;
	try {
		$stmt = $db->prepare ( $sql );
		$stmt->execute ();
		$row = $stmt->fetch ();
		$max_value = - 1;
		
		$max_value = $row ["max(".$column .")"];
		
		return $max_value;
	} catch ( PDOException $e ) {
		echo $e->getMessage () . "\n";
	}
}
function insert_Data($db, $myid, $age, $sex, $married, $housing, $roof) {
	$id = _create_key ();
	$insert_myid = sprintf ( "%4d", 100 );
	$insert_age = sprintf ( "%2d", $age );
	$insert_sex = $sex;
	$insert_married = $married;
	$insert_housing = $housing;
	$insert_roof = $roof;
	$questionnaire = "1" . $insert_myid . $insert_age . $insert_sex . $insert_married . "\n" . "2" . $insert_myid . $insert_housing . $insert_roof;
	
	insert_filerevisions ( $db );
	$last_modified = getMAX ( $db, "file_revisions", "id" );
	$file_order = doubleval(getMAX ( $db, "cases", "file_order" )) + 1.0;
	
	$sql = "insert into cases (id, key, questionnaire, last_modified_revision, file_order, id_MYENTRY_ID) VALUES(?,?,?,?,?,?)";
	try {
		$stmt = $db->prepare ( $sql );
		$stmt->execute ( [ 
				$id,
				$insert_myid,
				$questionnaire,
				$last_modified,
				$file_order,
				"100"
		] );
	} catch ( PDOException $e ) {
		echo $e->getMessage () . "\n";
	}
}
function _create_key() {
	$key = makeRandStr ( 8 ) . "-" . mt_rand ( 1000, 9999 ) . "-" . makeRandStr ( 4 ) . "-" . makeRandStr ( 4 ) . "-" . makeRandStr ( 12 );
	return $key;
}
function makeRandStr($length) {
	$str = array_merge ( range ( 'a', 'z' ), range ( '0', '9' ), range ( 'A', 'Z' ) );
	$r_str = null;
	for($i = 0; $i < $length; $i ++) {
		$r_str .= $str [rand ( 0, count ( $str ) - 1 )];
	}
	return $r_str;
}
function insert_filerevisions($db) {
	"insert into file_revisions(device_id) VALUES('".makeRandStr(12)."')";
	try {
		$stmt = $db->prepare ( $sql );
		$stmt->execute ();
	} catch ( PDOException $e ) {
		echo $e->getMessage () . "\n";
	}
}

