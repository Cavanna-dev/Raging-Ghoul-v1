<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Raging Ghoul</title>
        <!-- http://bootswatch.com/sandstone/ -->
        <?php include_once './cssFiles.php'; ?>
    </head>
    <body>
        <div id="bodybg">
            <?php include 'menu.php'; ?>
            <div class="container">
                <div class="jumbotron charte">
                    <?php include_once './connectionDb.php'; ?>
                    <?php $stmt = $db->prepare("SELECT count(*) countRoster "
                                . "FROM roster");
                        $stmt->execute();
                        $countRoster = $stmt->fetch();
                        ?>
                    <h3>Roster <span style="color:grey;">(<?php echo $countRoster['countRoster']; ?>)</span></h3>
                    <div class="row">
                        <?php
                        for ($i = 1; $i <= 4; $i++):
                            switch ($i):
                                case 1:
                                    $titleVignette = "Tanks";
                                    break;
                                case 2:
                                    $titleVignette = "Healers";
                                    break;
                                case 3:
                                    $titleVignette = "Rangeds";
                                    break;
                                case 4:
                                    $titleVignette = "Melees";
                                    break;
                            endswitch;
                            ?>
                            <div class="col-lg-3">
                                <h3 style="text-align: center"><?php echo $titleVignette; ?></h3>
                                <ul style="list-style-type: none;">
                                    <?php
                                    $rosters = $db->query("SELECT r.pseudo, c.logo, c.color, r.armu "
                                            . "FROM roster r "
                                            . "LEFT JOIN classes c ON r.class = c.id "
                                            . "WHERE r.category = " . $i);
                                    $rosters->setFetchMode(PDO::FETCH_OBJ);
                                    while ($roster = $rosters->fetch()) {
                                        ?>
                                        <li class="homeRosterVignettes">
                                            <a href="<?php echo $roster->armu; ?>"  style="color:<?php echo $roster->color; ?>" style="text-decoration: none;" target="_blank">
                                                <img src="../img/classes/<?php echo $roster->logo; ?>" width="25" height="25"/>
                                                <span class="rosterMember"><?php echo $roster->pseudo; ?></span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>

                            <?php
                        endfor;
                        ?>
                    </div>
                </div>
            </div>
            <?php include_once './footer.php'; ?>
        </div>
    </body>
</html>
