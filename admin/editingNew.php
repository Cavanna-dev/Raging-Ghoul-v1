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
            <!-- http://bootswatch.com/darkly/bootstrap.min.css -->
            <link rel="stylesheet" href="http://bootswatch.com/darkly/bootstrap.min.css" type="text/css" media="screen" />
            <?php include_once './tinymcejs.php'; ?>
        </head>
        <body>
            <?php include './menu.php'; ?>
            <div id="bodybg">
                <div class="container">
                    <div id="bodycontent" class="jumbotron">
                        <?php
                        include_once '../connectionDb.php';
                        $stmt = $db->prepare("SELECT id, auteur, title, content, img "
                                . "FROM news "
                                . "WHERE id=" . $_GET['id'] . " LIMIT 1");
                        $stmt->execute();
                        $new = $stmt->fetch();
                        ?>
                        <!-- Place this in the body of the page content -->
                        <form method="post" action="editNew.php" class="form-horizontal" enctype="multipart/form-data">
                            <input type="hidden" name="inputId" value="<?php echo $new['id']; ?>" />
                            <fieldset>
                                <legend>Modifer un Article</legend>
                                <div class="form-group">
                                    <label for="inputAuteur" class="col-lg-2 control-label">Auteur</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" name="inputAuteur" id="inputTitle" value="<?php echo $new['auteur']; ?>" placeholder="Auteur">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputTitle" class="col-lg-2 control-label">Titre Article</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" name="inputTitle" id="inputTitle" value="<?php echo $new['title']; ?>" placeholder="Titre">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputContent" class="col-lg-2 control-label">Contenu Article</label>
                                    <div class="col-lg-10">
                                        <textarea name="inputContent" class="form-control"><?php echo $new['content']; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputImg" class="col-lg-2 control-label">Image*</label>
                                    <div class="col-lg-8">
                                        <input type="file" class="form-control" id="inputImg" name="inputImg"/>
                                        <p>*Si vous ne voulez pas changez l'image de l'article, juste faites Enregistrer.</p>
                                    </div>
                                    <input type="hidden" name="inputOldImg" value="../img/article/<?php echo $new['id']; ?>_<?php echo $new['img']; ?>"/>
                                    <img src="../img/article/<?php echo $new['id']; ?>_<?php echo $new['img']; ?>" class="col-lg-2"/>
                                </div>
                                <input type="submit" class="btn btn-success" value="Enregistrer"/>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </body>
    </html>
<?php } ?>