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
                        <h2>Le roster : </h2>
                        <form class="form-horizontal" action="addRoster.php" method="POST">
                            <fieldset>
                                <div class="form-group">
                                    <div class="col-lg-2">
                                        <input type="text" class="form-control" name="inputPseudo" placeholder="Pseudo"/>
                                    </div>
                                    <div class="col-lg-2">
                                        <select name="inputClass" class="form-control" id="select">
                                            <?php include_once '../connectionDb.php'; ?>
                                            <?php
                                            $classes = $db->query("SELECT id, name, color "
                                                    . "FROM classes ");
                                            $classes->setFetchMode(PDO::FETCH_OBJ);
                                            while ($class = $classes->fetch()) {
                                                ?>
                                                <option value="<?php echo $class->id; ?>"><?php echo $class->name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-2">
                                        <select class="form-control" name="inputCat" id="select">
                                            <option value="1">Tank</option>
                                            <option value="2">Healer</option>
                                            <option value="3">Ranged</option>
                                            <option value="4">Melee</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <input type="text" class="form-control" name="inputArmu" placeholder="Lien Armurerie"/>
                                    </div>
                                    <input type="submit" class="btn btn-primary"/>
                                </div>
                            </fieldset>
                        </form>

                        <div class="row">
                            <div class="col-lg-3">
                                <h3 style="text-align: center">Tanks</h3>
                                <ul style="list-style-type: none;">
                                    <?php
                                    $tanks = $db->query("SELECT r.pseudo, c.logo, c.color, r.armu "
                                            . "FROM roster r "
                                            . "LEFT JOIN classes c ON r.class = c.id "
                                            . "WHERE r.category = 1");
                                    $tanks->setFetchMode(PDO::FETCH_OBJ);
                                    while ($tank = $tanks->fetch()) {
                                        ?>
                                        <li class="rosterVignettes">
                                            <a href="<?php echo $tank->armu; ?>"  style="color:<?php echo $tank->color; ?>" style="text-decoration: none;" target="_blank">
                                                <img src="../img/classes/<?php echo $tank->logo; ?>" width="25" height="25"/>
                                                <?php echo $tank->pseudo; ?>
                                            </a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <div class="col-lg-3">
                                <h3 style="text-align: center">Healers</h3>
                                <ul style="list-style-type: none;">
                                    <?php
                                    $tanks = $db->query("SELECT r.pseudo, c.logo, c.color, r.armu "
                                            . "FROM roster r "
                                            . "LEFT JOIN classes c ON r.class = c.id "
                                            . "WHERE r.category = 2");
                                    $tanks->setFetchMode(PDO::FETCH_OBJ);
                                    while ($tank = $tanks->fetch()) {
                                        ?>
                                        <li class="rosterVignettes">
                                            <a href="<?php echo $tank->armu; ?>"  style="color:<?php echo $tank->color; ?>" style="text-decoration: none;" target="_blank">
                                                <img src=../img/classes/<?php echo $tank->logo; ?> width="25" height="25"/>
                                                <?php echo $tank->pseudo; ?>
                                            </a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <div class="col-lg-3">
                                <h3 style="text-align: center">Ranged</h3>
                                <ul style="list-style-type: none;">
                                    <?php
                                    $tanks = $db->query("SELECT r.pseudo, c.logo, c.color, r.armu "
                                            . "FROM roster r "
                                            . "LEFT JOIN classes c ON r.class = c.id "
                                            . "WHERE r.category = 3");
                                    $tanks->setFetchMode(PDO::FETCH_OBJ);
                                    while ($tank = $tanks->fetch()) {
                                        ?>
                                        <li class="rosterVignettes">
                                            <a href="<?php echo $tank->armu; ?>"  style="color:<?php echo $tank->color; ?>" style="text-decoration: none;" target="_blank">
                                                <img src=../img/classes/<?php echo $tank->logo; ?> width="25" height="25"/>
                                                <?php echo $tank->pseudo; ?>
                                            </a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <div class="col-lg-3">
                                <h3 style="text-align: center">Melee</h3>
                                <ul style="list-style-type: none;">
                                    <?php
                                    try {
                                        $tanks = $db->query("SELECT r.pseudo, c.logo, c.color, r.armu "
                                                . "FROM roster r "
                                                . "LEFT JOIN classes c ON r.class = c.id "
                                                . "WHERE r.category = 4");
                                        $tanks->setFetchMode(PDO::FETCH_OBJ);
                                        while ($tank = $tanks->fetch()) {
                                            ?>
                                            <li class="rosterVignettes">
                                                <a href="<?php echo $tank->armu; ?>"  style="color:<?php echo $tank->color; ?>" style="text-decoration: none;" target="_blank">
                                                    <img src=../img/classes/<?php echo $tank->logo; ?> width="25" height="25"/>
                                                    <?php echo $tank->pseudo; ?>
                                                </a>
                                            </li>
                                            <?php
                                        }
                                    } catch (Exception $e) {
                                        var_dump($e);
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>

                        <h2>Supprimer un membre* : </h2>
                        <select style="color:black;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option>Choississez</option>
                            <?php
                            $membres = $db->query("SELECT id, pseudo "
                                    . "FROM roster "
                                    . "ORDER BY pseudo");
                            $membres->setFetchMode(PDO::FETCH_OBJ);
                            while ($membre = $membres->fetch()) {
                                ?>
                                <option value="./delRoster.php?salop=<?php echo $membre->id; ?>" ><?php echo $membre->pseudo; ?></option>
                            <?php } ?>
                        </select>
                        <p><small>*Au changement de la case, le joueur sera supprimé du roster.</small></p>
                    </div>
                </div>
            </div>
        </body>
    </html>
<?php } ?>