<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Raging Ghoul</title>
        <!-- http://bootswatch.com/darkly/ -->
        <link rel="stylesheet" href="http://bootswatch.com/slate/bootstrap.min.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="./css/main.css" type="text/css" />
    </head>
    <body>
        <div id="megaBan"></div>
        <div id="bodybg">
            <div  class="container">
                <?php include 'menu.php'; ?>
            </div>
            <div class="container">
                <div class="col-md-4">
                    <h3>Recrutement</h3>
                    <?php include_once './connectionDb.php'; ?>
                    <?php
                    $class_foreach = $db->query("SELECT id, name, color "
                            . "FROM classes ");

                    $class_foreach->setFetchMode(PDO::FETCH_OBJ);
                    while ($class = $class_foreach->fetch()) {
                        ?>
                        <div class="col-md-7" style="color:<?php echo $class->color; ?>"><?php echo utf8_encode($class->name); ?></div>
                        <div class = "col-md-5">
                            <?php
                            $spe_foreach = $db->query("SELECT name, logo, isRecruitable, fk_class "
                                    . "FROM specialisations ");

                            $spe_foreach->setFetchMode(PDO::FETCH_OBJ);
                            while ($spe = $spe_foreach->fetch()) {
                                if ($spe->fk_class == $class->id) {
                                    ?>
                                    <img class="recruitImg <?php if ($spe->isRecruitable == 0) echo "desactivatedRecruit"; ?>" title="<?php echo utf8_encode($spe->name); ?>" src="<?php echo $spe->logo; ?>"/>

                                <?php } ?>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-md-8">
                    <h2>Titre Article</h2>
                    <p>
                        Contenu Article
                    </p>
                    <p><a class="btn btn-primary btn-lg" href="./postuler.php">Rejoindre les ghoules enragées !</a></p>
                </div>
            </div>
            <div class="container">
                <div class="panel-footer">Panel footer</div>
            </div>
        </div>
    </body>
</html>
