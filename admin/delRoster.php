<?php

include_once '../connectionDb.php';

$id = htmlspecialchars($_GET['salop']);

try {
    $sql = "DELETE FROM roster WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT, 3);
    $stmt->execute();
    
    header('location:roster.php');
} catch (Exception $ex) {
    var_dump($ex);
}