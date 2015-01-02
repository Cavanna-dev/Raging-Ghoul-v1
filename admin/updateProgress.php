<?php

include_once '../connectionDb.php';

$id = htmlspecialchars($_GET["id"]);
$mode = htmlspecialchars($_GET["mode"]);
$down = htmlspecialchars($_GET["down"]);
$tab = htmlspecialchars($_GET["tab"]);

try {
    $db->exec("UPDATE progress SET " . $mode . " = '" . $down . "' WHERE id = '" . $id . "' ");
    header('location:progress.php?tab=' . $tab);
} catch (PDOException $e) {
    header('location:error.php');
}
