<?php

include_once '../connectionDb.php';

$pseudo = htmlspecialchars($_POST['inputPseudo']);
$class = htmlspecialchars($_POST['inputClass']);
$cat = htmlspecialchars($_POST['inputCat']);
$armu = htmlspecialchars($_POST['inputArmu']);

try {
    $sql = "INSERT INTO roster"
            . "(id, pseudo, class, category, armu) "
            . "VALUES "
            . "(null,:pseudo,:class,:category, :armu)";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":pseudo", $pseudo, PDO::PARAM_STR, 255);
    $stmt->bindParam(":class", $class, PDO::PARAM_INT, 1);
    $stmt->bindParam(":category", $cat, PDO::PARAM_INT, 1);
    $stmt->bindParam(":armu", $armu, PDO::PARAM_STR, 255);
    $stmt->execute();

    header('Location:roster.php');
} catch (Exception $ex) {
    var_dump($ex);
}