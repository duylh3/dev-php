<?php
	$idErr = $nameErr = $yearErr = "";
	$id = $name = $year = "";
	include_once 'db.php';
	$db = new PDO(DB_INFO,DB_USER,DB_PASS);
	if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit'] == 'submit'){		
		        
		if(empty($_POST['id'])){
			$idErr = "Id can not be null";

		}else{
			$sql = 'INSERT INTO cars (id, name, year) VALUES (?,?,?)';
        	$stml = $db->prepare($sql);
        	$stml->execute(array($_POST['id'],$_POST['name'],$_POST['year']));
        	$stml->closeCursor();
        	header('Location: ../');
		}

	}else{
		 header('Location: ../');
        exit;
	}
?>