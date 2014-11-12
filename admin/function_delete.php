<?php

include_once '../connectionDb.php';

$id = htmlspecialchars($_GET["id"]);

try {
    $db->exec("DELETE FROM candidature WHERE id = '" . $id . "'");
    header('location:candidatures.php');
} catch (PDOException $e) {
    header('location:error.php');
    
}
?>
