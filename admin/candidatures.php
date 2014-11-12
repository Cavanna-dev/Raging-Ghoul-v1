<!DOCTYPE html>
<?php
session_start();
if ($_SESSION['login'] != 'admin')
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
                        <table class="table table-striped table-hover ">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Classe</th>
                                    <th>Nom - Prenom : Pseudo</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include_once '../connectionDb.php';
                                
                                $resultats = $db->query("SELECT cand.*, class.color, class.logo "
                                        . "FROM candidature cand "
                                        . "LEFT JOIN classes class ON cand.classe = class.id ");
                                $resultats->setFetchMode(PDO::FETCH_OBJ);
                                $nbCandidats = 1;
                                while ($resultat = $resultats->fetch()) {
                                    echo '<tr style="color:' . $resultat->color . '">';
                                    echo '<td>' . $nbCandidats . '</td>';
                                    echo '<td><img style="width:20px;height:20px;" src="../img/classes/' . $resultat->logo . '"/></td>';
                                    echo '<td><a href="' . $resultat->armurerie . '" target="_blank" style="color:' . $resultat->color . '">' . $resultat->nom . ' ' . $resultat->prenom . ' : ' . $resultat->pseudo . '</a></td>';
                                    echo '<td><a href="./function_delete.php?id='.$resultat->id.'" onclick="return confirm("Sur?")"><img style="width:20px;height:20px;" src="../img/rmv.png"/></a></td>';
                                    echo '</tr>';
                                    $nbCandidats++;
                                }
                                $resultats->closeCursor();
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="panel-footer">Raging Ghoul Copyright - All Rights Reserved</div>
                </div>
            </div>
        </body>
    </html>
<?php } ?>
