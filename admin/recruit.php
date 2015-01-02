<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
if ($_SESSION['login'] != 'admin')
    header('location:error.php');
else {
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8">
            <title>Raging Ghoul</title>
            <?php include_once './cssFiles.php'; ?>
        </head>
        <body>
            <?php include './menu.php'; ?>
            <div id="bodybg">
                <div class="container">
                    <div id="bodycontent" class="jumbotron">
                        <h2>Liste des Recrutements : </h2>
                        <ul class="nav nav-tabs">
                            <?php include '../connectionDb.php'; ?>
                            <?php
                            $resultats = $db->query("SELECT id, name, color, logo "
                                    . "FROM classes ");
                            $resultats->setFetchMode(PDO::FETCH_OBJ);
                            while ($resultat = $resultats->fetch()) {
                                ?>
                                <li <?php
                                if ($_GET["tab"] == $resultat->id)
                                    echo 'class="active"';
                                elseif ($_GET["tab"] == "" && $resultat->id == 1)
                                    echo 'class="active"';
                                ?>>
                                    <a href="#class<?php echo $resultat->id; ?>" 
                                       data-toggle="tab" <?php if ($resultat->id == 1) echo 'aria-expanded="true"'; ?>>
                                        <img src="../img/classes/<?php echo $resultat->logo; ?>" width="35" height="35"/>
                                    </a>
                                </li>

                                <?php
                            }
                            $resultats->closeCursor();
                            ?>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                            <?php
                            $resultats = $db->query("SELECT id, name, color "
                                    . "FROM classes ");
                            $resultats->setFetchMode(PDO::FETCH_OBJ);
                            while ($resultat = $resultats->fetch()) {
                                ?>
                                <div class="tab-pane fade 
                                <?php
                                if ($_GET["tab"] == $resultat->id) {
                                    echo "active in";
                                } elseif ($_GET["tab"] == "" && $resultat->id == 1) {
                                    echo "pouet active in";
                                }
                                ?>" id="class<?php echo $resultat->id; ?>">
                                    <h3 style="color:<?php echo $resultat->color; ?>"><?php echo $resultat->name; ?></h3>
                                    <?php
                                    $resultats_spe = $db->query("SELECT id, name, logo, isRecruitable, fk_class "
                                            . "FROM specialisations "
                                            . "WHERE fk_class = '" . $resultat->id . "'");
                                    $resultats_spe->setFetchMode(PDO::FETCH_OBJ);
                                    ?>
                                    <table class="table table-striped table-hover ">
                                        <thead>
                                            <tr>
                                                <th>Logo</th>
                                                <th>Spécialisation</th>
                                                <th>Recrutement</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($resultat_spe = $resultats_spe->fetch()) {
                                                ?>
                                                <tr>
                                                    <td><img src="<?php echo $resultat_spe->logo; ?>" width="35" height="35"/></td>
                                                    <td><?php echo $resultat_spe->name; ?></td>
                                                    <td>
                                                        <?php
                                                        if ($resultat_spe->isRecruitable == 1)
                                                            echo '<a href="./updateRecruit.php?id=' . $resultat_spe->id . '&recruit=0&tab=' . $resultat->id . '" onclick="return confirm(\'Etes-vous sur de vouloir fermer le recrutement pour la spécialisation ' . $resultat_spe->name . '?\')"><img src="../img/tick.png"/></a>';
                                                        else
                                                            echo '<a href="./updateRecruit.php?id=' . $resultat_spe->id . '&recruit=1&tab=' . $resultat->id . '" onclick="return confirm(\'Etes-vous sur de vouloir ouvrir le recrutement pour la spécialisation ' . $resultat_spe->name . '?\')"><img src="../img/cross.png"/></a>';
                                                        ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table> 
                                </div>
                            <?php } ?>
                        </div>

                    </div>
                    <div class="panel-footer">Raging Ghoul Copyright - All Rights Reserved</div>
                </div>
            </div>
            <?php include './bootstrapJs.php'; ?>
        </body>
    </html>
<?php } ?>
