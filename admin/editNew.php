<?php

include_once '../connectionDb.php';

$id = htmlspecialchars($_POST['inputId']);
$auteur = htmlspecialchars($_POST['inputAuteur']);
$title = htmlspecialchars($_POST['inputTitle']);
$content = $_POST['inputContent'];
$img = htmlspecialchars($_FILES['inputImg']['name']);
$oldImg = htmlspecialchars($_POST['inputOldImg']);

if (empty($img)) {
    try {
        $sql = "UPDATE news "
                . "SET auteur = :auteur, "
                . "title = :title, "
                . "content = :content "
                . "WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":auteur", $auteur, PDO::PARAM_STR, 100);
        $stmt->bindParam(":title", $title, PDO::PARAM_STR, 100);
        $stmt->bindParam(":content", $content, PDO::PARAM_STR);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();

        header('Location:news.php');
    } catch (Exception $ex) {
        var_dump($ex);
        die;
    }
} else {
    try {
        unlink($oldImg);

        $sql = "UPDATE news "
                . "SET auteur = :auteur, "
                . "title = :title, "
                . "content = :content, "
                . "img = :img "
                . "WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":auteur", $auteur, PDO::PARAM_STR, 100);
        $stmt->bindParam(":title", $title, PDO::PARAM_STR, 100);
        $stmt->bindParam(":img", $img, PDO::PARAM_STR, 255);
        $stmt->bindParam(":content", $content, PDO::PARAM_STR);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();

        $uploaddir = '../img/article/' . $id . '_';
        $uploadfile = $uploaddir . basename($_FILES['inputImg']['name']);

        move_uploaded_file($_FILES['inputImg']['tmp_name'], $uploadfile);

        header('Location:news.php');
    } catch (Exception $ex) {
        var_dump($ex);
        die;
    }
}
?>