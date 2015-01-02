<?php

include_once '../connectionDb.php';

$name = htmlspecialchars($_POST['inputName']);
$raid = htmlspecialchars($_POST["raid"]);

try {
    $sql = "INSERT INTO progress"
         . "(id, raid, boss, hm, mc) "
         . "VALUES "
         . "(null, :raid, :name, 0, 0)";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":raid", $raid, PDO::PARAM_INT, 11);
    $stmt->bindParam(":name", $name, PDO::PARAM_STR, 255);
    $stmt->execute();
    
    header('Location:progress.php?tab=' . $raid);
} catch (Exception $ex) {
    var_dump($ex);die;
}