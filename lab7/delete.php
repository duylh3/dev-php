<?php

include_once 'db/db.php';
$db = new PDO(DB_INFO, DB_USER, DB_PASS);
if (isset($_GET['id'])) {
    $sql = "DELETE FROM cars WHERE id =" . $_GET['id'];
    $stmt = $db->prepare($sql);
    $respon = $stmt->execute();

    if ($respon) {
        $stmt->closeCursor();
        header('Location: index.php');
    }
}

