<?php
include_once 'db/dbconfig.php';
// $db = new PDO ( DB_INFO, DB_USER, DB_PASS );

// function insert($fullname, $email, $password, $phone, $address, $gender, $hobby) {
// 	$sql = 'INSERT INTO register (fullname, email, password, phone, address, gender, hobby) VALUES (?,?,?,?,?,?,?)';
	
// 	$stml = $db->prepare($sql);

// 	$res = $stml->execute ( array (
// 			$fullname,
// 			$email,
// 			$password,
// 			$phone,
// 			$address,
// 			$gender,
// 			$hobby 
// 	) );
// 	if ($res) {
// 		$errTyp = "success";
// 		$errMSG = "Successfully registered, you may login now";
// 	} else {
// 		$errTyp = "false";
// 		$errMSG = "Something went wrong, try again later...";
// 	}
// }
function testInput($data) {
	$data = strip_tags ( $data );
	$data = trim ( $data );
	$data = stripslashes ( $data );
	$data = htmlspecialchars ( $data );
	
	return $data;
}