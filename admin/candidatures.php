<!DOCTYPE html>
<?php session_start();
if($_SESSION['login'] != 'admin')
    header('location:error.php');
else {
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Raging Ghoul</title>
        <link rel="stylesheet" href="http://bootswatch.com/darkly/bootstrap.min.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="../css/main.css" type="text/css" />
    </head>
    <body>
        <div class="navbar navbar-default" style="margin:0">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Raging Ghoul - BO</a>
                </div>
            </div>
        </div>
        <div id="bodybg">
            <div class="container">
                <div id="bodycontent" class="jumbotron">
                    <h1>Liste des Noobs : </h1>
                    <?php
                    
                    include_once '../connectionDb.php';

                    $resultats = $db->query("SELECT cand.*, class.color, class.logo "
                                          . "FROM candidature cand "
                                          . "LEFT JOIN classes class ON cand.classe = class.id ");
                    $resultats->setFetchMode(PDO::FETCH_OBJ);
                    while ($resultat = $resultats->fetch()) {
                        echo '<div style="padding:2px 5px;"><img style="width:20px;height:20px;" src="../img/classes/' . $resultat->logo . '"/>'
                                . '<a href="' . $resultat->armurerie . '" target="_blank" style="margin-left:5px;color:' . $resultat->color . ';">';
                        echo $resultat->nom . ' ' . $resultat->prenom . ' : ' . $resultat->pseudo;
                        echo '</a></div><br>';
                    }
                    $resultats->closeCursor();
                    ?>
                </div>
                <div class="panel-footer">Panel footer</div>
            </div>
        </div>
    </body>
</html>
<?php } ?>
