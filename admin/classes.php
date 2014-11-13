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
                        <a class="navbar-brand" href="./candidatures.php">Raging Ghoul - BO</a>
                    </div>
                    <div class="navbar-collapse collapse navbar-responsive-collapse">
                        <ul class="nav navbar-nav">
                            <li><a href="./candidatures.php">Les Candidatures</a></li>
                        </ul>
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="./classes.php">Gérer les classes</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div id="bodybg">
                <div class="container">
                    <div id="bodycontent" class="jumbotron">
                        <h1>Liste des Classes : </h1>
                        <form action="" method="POST">
                            <table class="table table-striped table-hover ">
                                <thead>
                                    <tr>
                                        <th>Classe</th>
                                        <th>Logo</th>
                                        <th>Couleur</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include_once '../connectionDb.php';

                                    $resultats = $db->query("SELECT * "
                                            . "FROM classes ");
                                    $resultats->setFetchMode(PDO::FETCH_OBJ);
                                    while ($resultat = $resultats->fetch()) {
                                        echo '<tr style="color:' . $resultat->color . '">';
                                        echo '<td>' . utf8_encode($resultat->name) . '</td>';
                                        echo '<td><img style="width:20px;height:20px;" src="../img/classes/' . $resultat->logo . '"/></td>';
                                        echo '<td><span class="color" style="display:;">' . $resultat->color . '</span><input class="editColor" type="text" style="display:none;" /></td>';
                                        echo '<td><a class="update" href="#" style="display:;">Modifier</a><a class="save" href="#" style="display:none;">Enregistrer</a></td>';
                                        echo '<tr>';
                                    }
                                    $resultats->closeCursor();
                                    ?>
                                <div id="colorSelector"><div style="background-color: rgb(92, 92, 168);"></div></div>
                                </tbody>
                            </table>
                        </form>
                    </div>
                    <div class="panel-footer">Raging Ghoul Copyright - All Rights Reserved</div>
                </div>
            </div>
            <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
            <script>
                $('.update').click(function () {
                    var line = $(this).parent('td');
                    line.find('.update').css("display", "none");
                    line.find('.save').css("display", "");
                    line.parent('tr').find('.color').css("display", "none");
                    line.parent('tr').find('.editColor').css("display", "");
                });
                $('.save').click(function () {
                    var line = $(this).parent('td');
                    line.find('.update').css("display", "");
                    line.find('.save').css("display", "none");
                    line.parent('tr').find('.color').css("display", "");
                    line.parent('tr').find('.editColor').css("display", "none");
                });
            </script>
        </body>
    </html>
<?php } ?>
