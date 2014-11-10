<?php

include './bdd.php';

$_POST[''];

$bdd->exec("INSERT INTO membres(champ_login,champ_mdp) VALUES('login','mot_de_passe')");
