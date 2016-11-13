<?php

include_once 'db.php';

if (isset($_POST['id']) && isset($_POST['id']) != "") {
    $id = $_POST['id'];
    $db = new PDO(DB_INFO, DB_USER, DB_PASS);
    $sql = "SELECT * FROM cars where id = $id";

    $stmt = $db->prepare($sql);
    $response = array();

    if ($stmt->execute()) {
        while ($row = $stmt->fetch()) {
            $response = $row;
        }
    } else {
        $response['status'] = 200;
        $response['message'] = "Data not found!";
    }

    echo json_encode($response);
} else {
    $response['status'] = 200;
    $response['message'] = "Invalid Request!";
}

