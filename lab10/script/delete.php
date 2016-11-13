<?php

include_once 'db.php';
$db = new PDO(DB_INFO, DB_USER, DB_PASS);

$id = $_POST['id'];
$sql = "DELETE FROM cars WHERE id =" . $id;
$stmt = $db->prepare($sql);
$respon = $stmt->execute();
