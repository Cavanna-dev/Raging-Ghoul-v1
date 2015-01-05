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
                        <!-- Place this in the body of the page content -->
                        <form method="post" action="addNew.php" class="form-horizontal" enctype="multipart/form-data">
                            <fieldset>
                                <legend>Ajouter un Article</legend>
                                <div class="form-group">
                                    <label for="inputTitle" class="col-lg-2 control-label">Titre de l'article</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" name="inputTitle" id="inputTitle" placeholder="Titre">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputImg" class="col-lg-2 control-label">Image associée</label>
                                    <div class="col-lg-10">
                                        <input type="file" class="form-control" id="inputImg" name="inputImg"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputContent" class="col-lg-2 control-label">Contenu de l'article</label>
                                    <div class="col-lg-10">
                                        <textarea name="inputContent" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputAuteur" class="col-lg-2 control-label">Auteur de l'article</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" name="inputAuteur" id="inputTitle" placeholder="Auteur">
                                    </div>
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