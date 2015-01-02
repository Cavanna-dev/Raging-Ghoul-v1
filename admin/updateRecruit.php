<?php

include_once '../connectionDb.php';

$id = htmlspecialchars($_GET["id"]);
$recruit = htmlspecialchars($_GET["recruit"]);
$tab = htmlspecialchars($_GET["tab"]);

try {
    $db->exec("UPDATE specialisations SET isRecruitable = '" . $recruit . "' WHERE id = '".$id."' ");
    header('location:classes.php?tab='.$tab);
} catch (PDOException $e) {
    header('location:error.php');
}
?>
