<?php

include_once '../connectionDb.php';

$raid = htmlspecialchars($_POST['inputRaid']);
$img = htmlspecialchars($_FILES['inputImg']['name']);
$isHp = htmlspecialchars($_POST['inputIsHp']);

try {
    $sql = "INSERT INTO raid"
         . "(id, name, img, isHome) "
         . "VALUES "
         . "(null,:name,:img,:isHp)";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":name", $raid, PDO::PARAM_STR, 255);
    $stmt->bindParam(":img", $img, PDO::PARAM_STR, 255);
    $stmt->bindParam(":isHp", $isHp, PDO::PARAM_INT, 1);
    $stmt->execute();
    
    $uploaddir = '../img/';
    $uploadfile = $uploaddir . basename($_FILES['inputImg']['name']);
    
    move_uploaded_file($_FILES['inputImg']['tmp_name'], $uploadfile);
    
    header('Location:progress.php');
} catch (Exception $ex) {
    var_dump($ex);die;
}