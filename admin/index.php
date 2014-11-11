<!DOCTYPE html>
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
                    $dbname = "raging-ghoul-v1";
                    $user = "root";
                    $pass = "";

                    $db = new PDO('mysql:host=localhost;dbname=' . $dbname, $user, $pass);
                    
                    $resultats = $db->query("SELECT nom, prenom, pseudo, classe, armurerie FROM candidature");
                    $resultats->setFetchMode(PDO::FETCH_OBJ);
                    while ($resultat = $resultats->fetch()) {
                        switch($resultat->classe) {
                            case 'Mage' : 
                                $color = "rgb(0, 233, 255)";
                                $logo  = "mage_logo.png";
                                break;
                            case 'Chevalier de la Mort' : 
                                $color = "rgb(214, 17, 17)";
                                $logo  = "dk_logo.png";
                                break;
                            case 'Guerrier' : 
                                $color = "rgb(186, 118, 67)";
                                $logo  = "war_logo.png";
                                break;
                            case 'Druide' : 
                                $color = "rgb(244, 160, 34)";
                                $logo  = "drood_logo.png";
                                break;
                            case 'Chasseur' : 
                                $color = "rgb(74, 193, 38)";
                                $logo  = "hunt_logo.png";
                                break;
                            case 'Moine' : 
                                $color = "rgb(179, 229, 221)";
                                $logo  = "moine_logo.jpg";
                                break;
                            case 'Paladin' : 
                                $color = "rgb(255, 193, 231)";
                                $logo  = "pal_logo.png";
                                break;
                            case 'Prêtre' : 
                                $color = "rgb(242, 242, 242)";
                                $logo  = "priest_logo.png";
                                break;
                            case 'Voleur' : 
                                $color = "rgb(255, 245, 61)";
                                $logo  = "fufu_logo.png";
                                break;
                            case 'Chaman' : 
                                $color = "rgb(80, 144, 229)";
                                $logo  = "cham_logo.png";
                                break;
                            case 'Démoniste' : 
                                $color = "rgb(247, 86, 239)";
                                $logo  = "warlock_logo.png";
                                break;
                        }
                        
                        echo '<div style="padding:7px 5px;"><img style="width:20px;height:20px;" src="../img/classes/'.$logo.'"/><a href="' . $resultat->armurerie . '" target="_blank" style="margin-left:5px;color:' . $color . ';">';
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
