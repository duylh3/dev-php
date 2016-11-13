<?php
include_once 'db.php';

$db = new PDO(DB_INFO, DB_USER, DB_PASS);
$id = $_POST['id'];
$name = $_POST['name'];
$year = $_POST['year'];
$error = check($id, $name, $year);
//var_dump($error);
if (!$error) {
    $sql = 'INSERT INTO cars (id,name,year) VALUES (?,?,?)';
    $stmt = $db->prepare($sql);
    $stmt->execute(array($id, $name, $year));
}
function check($id, $name, $year) {
    $error = false;
    if (empty($id)) {
        $error = true;
    } 
    if (is_int($id)) {
        $error = true;
    }
    if (empty($name)) {
        $error = true;
    } else if (strlen($name) < 4 || strlen($name) > 50) {
        $error = true;
    }
    if (empty($year)) {
        $error = true;
    } else if (is_int($year)) {
        $error = true;
    } else if ($year < 1990 || $year > 2015) {
        $error = true;
    }
    return $error;
}
