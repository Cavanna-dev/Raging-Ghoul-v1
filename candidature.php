<?php

$nom         = htmlspecialchars($_POST['nom']);
$prenom      = htmlspecialchars($_POST['prenom']);
$age         = htmlspecialchars($_POST['age']);
$situation   = htmlspecialchars($_POST['situation']);
$pseudo      = htmlspecialchars($_POST['pseudo']);
$armu        = htmlspecialchars($_POST['armu']);
$race        = htmlspecialchars($_POST['race']);
$classe      = htmlspecialchars($_POST['classe']);
$specialisation_p = htmlspecialchars($_POST['specialisation_p']);
$specialisation_s = htmlspecialchars($_POST['specialisation_s']);
$metier1     = htmlspecialchars($_POST['metier1']);
$metier1_niv = htmlspecialchars($_POST['metier1_niv']);
$metier2     = htmlspecialchars($_POST['metier2']);
$metier2_niv = htmlspecialchars($_POST['metier2_niv']);
$histoire    = htmlspecialchars($_POST['histoire']);
$parcours    = htmlspecialchars($_POST['parcours']);
$optimisation = htmlspecialchars($_POST['optimisation']);
$contribution = htmlspecialchars($_POST['contribution']);

try {
    
    include_once './connectionDb.php';
    
    $db->exec("INSERT INTO candidature(id, nom, prenom, age, situation, pseudo, armurerie, "
            . "race, classe, specialisation_p, specialisation_s, metier1, metier1_niv, metier2, metier2_niv, "
            . "histoire, parcours, optimisation, contribution) "
            . "VALUES(null, '$nom', '$prenom', '$age', '$situation', '$pseudo', '$armu', "
            . "'$race', '$classe', '$specialisation_p', '$specialisation_s', '$metier1', '$metier1_niv', '$metier2', '$metier2_niv', "
            . "'$histoire', '$parcours', '$optimisation', '$contribution')");
    
    header('location:success.php');
    
    mail('cavannachristophe@gmail.com', 'test', 'nouvelle candidature');
    
} catch (PDOException $e) {
    echo 'Échec lors de la connexion : ' . $e->getMessage();
}