<?php

include_once '../connectionDb.php';

$id = htmlspecialchars($_GET['salop']);

try {
    $sql = "DELETE FROM news WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT, 3);
    $stmt->execute();
    
    header('location:news.php');
} catch (Exception $ex) {
    var_dump($ex);
}