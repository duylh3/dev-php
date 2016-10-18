<?php
function getAllCars($db) {
    $sql = "SELECT * FROM cars";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $data = NULL;

    while ($row = $stmt->fetch()) {
        $data[] = $row;
    }

    return $data;
}

function getCarById($db, $id) {
    $sql = "SELECT * FROM cars WHERE id = $id";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $data = NULL;
    while ($row = $stmt->fetch()) {
        $data = $row;
    }

    return $data;
}

function check($id, $name, $year) {
    $idErr = $nameErr = $yearErr = "";
    $error = false;
    if (empty($id)) {
        $error = true;
        $idErr = "Id can not be null";
    } else if (is_int($id)) {
        $error = true;
        $idErr = "Id invalid";
    }
    if (empty($name)) {
        $error = true;
        $nameErr = "Name can not be null";
    } else if (strlen($name) < 4 || strlen($name) > 50) {
        $error = true;
        $nameErr = "Name invalid";
    }

    if (empty($year)) {
        $error = true;
        $yearErr = "Year can not be null";
    } else if (is_int($year)) {
        $error = true;
        $yearErr = "Year must be a number";
    } else if ($year < 1990 || $year > 2015) {
        $error = true;
        $yearErr = "Year invalid";
    }

    return [$error, $idErr, $nameErr, $yearErr];
}

function test_input($data) {
    $data = strip_tags($data);
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}
