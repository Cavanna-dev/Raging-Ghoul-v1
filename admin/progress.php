<?php
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
                        <h2>Liste des Raids : </h2>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addRaid">
                            Ajouter nouveau raid
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="addRaid" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <form class="form-horizontal" action="addRaid.php" method="POST" enctype="multipart/form-data">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Ajout Raid</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="inputRaid" class="col-lg-2 control-label">Raid</label>
                                                <div class="col-lg-10">
                                                    <input type="text" class="form-control" name="inputRaid" id="inputRaid" placeholder="Nom Raid">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputImg" class="col-lg-2 control-label">Image</label>
                                                <div class="col-lg-10">
                                                    <input type="file" class="form-control" id="inputImg" name="inputImg">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputIsHp" class="col-lg-2 control-label">Page d'Accueil</label>
                                                <div class="col-lg-10">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input name="inputIsHp" type="checkbox" value="1">
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Enregistrer nouveau raid</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <ul class="nav nav-tabs" style="margin-top: 15px;">
                            <?php include '../connectionDb.php'; ?>
                            <?php
                            $raids = $db->query("SELECT id, name, isHome "
                                    . "FROM raid ");
                            $raids->setFetchMode(PDO::FETCH_OBJ);
                            while ($raid = $raids->fetch()) {
                                ?>
                                <li <?php
                                if ($_GET["tab"] == $raid->id)
                                    echo 'class="active"';
                                elseif ($_GET["tab"] == "" && $raid->id == 1)
                                    echo 'class="active"';
                                ?>>
                                    <a href="#raid<?php echo $raid->id; ?>" 
                                       data-toggle="tab" <?php if ($raid->id == 1) echo 'aria-expanded="true"'; ?>>
                                           <?php echo $raid->name; ?>
                                    </a>
                                </li>

                                <?php
                            }
                            $raids->closeCursor();
                            ?>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                            <?php
                            $raids = $db->query("SELECT id, name "
                                    . "FROM raid ");
                            $raids->setFetchMode(PDO::FETCH_OBJ);
                            while ($raid = $raids->fetch()) {
                                ?>
                                <div class="tab-pane fade 
                                <?php
                                if ($_GET["tab"] == $raid->id) {
                                    echo "active in";
                                } elseif ($_GET["tab"] == "" && $raid->id == 1) {
                                    echo "active in";
                                }
                                ?>" id="raid<?php echo $raid->id; ?>">
                                    <h3><?php echo $raid->name; ?> - Boss</h3>
                                    <?php
                                    $bosses = $db->query("SELECT id, boss, hm, mc "
                                            . "FROM progress "
                                            . "WHERE raid = '" . $raid->id . "'");
                                    $bosses->setFetchMode(PDO::FETCH_OBJ);
                                    ?>
                                    <table class="table table-striped table-hover ">
                                        <thead>
                                            <tr>
                                                <th>Nom</th>
                                                <th>HM</th>
                                                <th>MC</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($boss = $bosses->fetch()) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $boss->boss; ?></td>
                                                    <td>
                                                        <?php
                                                        if ($boss->hm == 1)
                                                            echo '<a href="./updateProgress.php?id=' . $boss->id . '&mode=hm&down=0&tab=' . $raid->id . '"><img src="../img/tick.png"/></a>';
                                                        else
                                                            echo '<a href="./updateProgress.php?id=' . $boss->id . '&mode=hm&down=1&tab=' . $raid->id . '"><img src="../img/cross.png"/></a>';
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if ($boss->mc == 1)
                                                            echo '<a href="./updateProgress.php?id=' . $boss->id . '&mode=mc&down=0&tab=' . $raid->id . '"><img src="../img/tick.png"/></a>';
                                                        else
                                                            echo '<a href="./updateProgress.php?id=' . $boss->id . '&mode=mc&down=1&tab=' . $raid->id . '"><img src="../img/cross.png"/></a>';
                                                        ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table> 
                                    
                                    
                                    
                                    <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addBoss<?php echo $raid->id; ?>">
                                    Ajouter nouveau boss
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="addBoss<?php echo $raid->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form class="form-horizontal" action="addBoss.php" method="POST" enctype="multipart/form-data">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Ajout Boss</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" name="raid" value="<?php echo $raid->id;?>"/>
                                                    <div class="form-group">
                                                        <label for="inputName" class="col-lg-2 control-label">Nom</label>
                                                        <div class="col-lg-10">
                                                            <input type="text" class="form-control" name="inputName" id="inputName" placeholder="Nom Raid">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Enregistrer nouveau boss</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                    
                                    
                                    
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php include './bootstrapJs.php'; ?>
        </body>
    </html>
<?php } ?>