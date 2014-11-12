<?php

$login    = htmlspecialchars($_POST['login']);
$password = htmlspecialchars($_POST['password']);

try {

    include_once '../connectionDb.php';

    $resultats = $db->query("SELECT login, password FROM bo_users");

    $resultats->setFetchMode(PDO::FETCH_OBJ);
    while ($resultat = $resultats->fetch()) { 
        $admin_login    = $resultat->login;
        $admin_password = $resultat->password;
    };
    
    if($admin_login == $login && $admin_password == $password)
    {
        session_start();
        $_SESSION['login'] = $admin_login;
        header('location:candidatures.php');
    }else
        header('location:error.php');

} catch (PDOException $e) {
    echo 'Échec lors de la connexion : ' . $e->getMessage();
}