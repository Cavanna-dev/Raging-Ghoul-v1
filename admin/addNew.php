<?php

include_once '../connectionDb.php';

$auteur = htmlspecialchars($_POST['inputAuteur']);
$title = htmlspecialchars($_POST['inputTitle']);
$content = $_POST['inputContent'];
$img = htmlspecialchars($_FILES['inputImg']['name']);

try {
    $sql = "INSERT INTO news"
            . "(id, auteur, title, img, content, date) "
            . "VALUES "
            . "(null, :auteur, :title, :img, :content, NOW())";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":auteur", $auteur, PDO::PARAM_STR, 100);
    $stmt->bindParam(":title", $title, PDO::PARAM_STR, 100);
    $stmt->bindParam(":img", $img, PDO::PARAM_STR, 255);
    $stmt->bindParam(":content", $content, PDO::PARAM_STR, 500);
    $stmt->execute();
    $LID = $db->lastInsertId();
    
    $uploaddir = '../img/article/'.$LID.'_';
    $uploadfile = $uploaddir . basename($_FILES['inputImg']['name']);

    move_uploaded_file($_FILES['inputImg']['tmp_name'], $uploadfile);

    header('Location:news.php');
} catch (Exception $ex) {
    var_dump($ex);
    die;
}
?>