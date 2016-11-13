<?php

include_once 'db.php';
$db = new PDO(DB_INFO, DB_USER, DB_PASS);

$idOld = $_POST['idOld'];
$id = $_POST['id'];
$name = $_POST['name'];
$year = $_POST['year'];
$error = check($id, $name, $year);
if (!$error) {
    $sql = "UPDATE cars SET id = :id, name = :name, year = :year WHERE id = :idOld";
    $stmt = $db->prepare($sql);

    $stmt->bindParam(':idOld', $idOld, PDO::PARAM_INT);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':year', $year, PDO::PARAM_STR);

    $stmt->execute();
}

function check($id, $name, $year) {
    $error = false;
    if (empty($id)) {
        $error = true;
    } else if (is_int($id)) {
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
