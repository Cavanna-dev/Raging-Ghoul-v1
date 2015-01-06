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
                <div class="row-fluid">
                    <div id="leftBlock" class="col-md-3">
                        <div id="recruitment" class="col-md-12 charte">
                            <h3>Recrutement</h3>
                            <?php include_once './recruit.php'; ?>
                        </div>
                        <div id="progress" class="col-md-12 charte">
                            <h3>Avancée PvE</h3>
                            <?php include_once './progress.php'; ?>
                        </div>
                    </div>
                    <div id="news" class="col-md-9 charte" style="padding-bottom: 50px;">
                        <?php include_once './connectionDb.php'; ?>
                        <?php
                        $news = $db->query("SELECT id, auteur, title, img, content, date "
                                . "FROM news "
                                . "ORDER BY date DESC "
                                . "LIMIT 3 ");
                        $news->setFetchMode(PDO::FETCH_OBJ);
                        $count = 1;
                        while ($new = $news->fetch()) {
                            ?>
                            <blockquote <?php if ($count % 2 == 0) echo 'class="pull-right"'; ?> class="col-md-10" style="margin:0;">
                                <h2><?php echo $new->title; ?></h2>
                                <img src="img/article/<?php echo $new->id; ?>_<?php echo $new->img; ?>" style="max-width: <?php
                                if ($count % 2 == 0)
                                    echo "100%";
                                else
                                    echo "123%";
                                ?>"/>
                                     <?php echo $new->content; ?>
                                <small>Par <span style="color:#93C54B;">@<?php echo $new->auteur; ?></span> publié le <cite title="<?php echo $new->title; ?>"><?php echo $new->date; ?></cite></small>
                            </blockquote>
                            <?php /* <hr style="background-color: black;width:100%;border-bottom: 1px solid;margin-bottom: 0;"> */ ?>
                            <?php
                            $count++;
                        }
                        if ($count == 1) {
                            ?>
                            <p>Aucune News pour le moment.</p>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <?php include_once './footer.php'; ?>
        </div>
    </body>
</html>
