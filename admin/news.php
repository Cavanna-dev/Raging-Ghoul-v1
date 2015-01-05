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
            <?php include_once './cssFiles.php'; ?>
        </head>
        <body>
            <?php include './menu.php'; ?>
            <div id="bodybg">
                <div class="container">
                    <div id="bodycontent" class="jumbotron">
                        <h2>Liste des articles : </h2>
                        <a href="./addingNew.php" class="btn btn-primary">Ajouter un article</a>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Auteur</th>
                                    <th>Titre</th>
                                    <th>Date de parution</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php include '../connectionDb.php'; ?>
                                <?php
                                $news = $db->query("SELECT id, auteur, title, date "
                                        . "FROM news "
                                        . "ORDER BY date DESC");
                                $news->setFetchMode(PDO::FETCH_OBJ);
                                while ($new = $news->fetch()) {
                                    ?>
                                    <tr>
                                        <td><?php echo $new->auteur; ?></td>
                                        <td><a href="./editingNew.php?id=<?php echo $new->id; ?>"><?php echo $new->title; ?></a></td>
                                        <td><?php echo $new->date; ?></td>
                                        <td><a href='./delNew.php?salop=<?php echo $new->id; ?>' onclick="return confirm('Supprimer l\'article : <?php echo $new->title; ?> ?')"><img src="../img/rmv.png" width="20" height="20"/></a></td>
                                    </tr>
                                    <?php
                                }
                                $news->closeCursor();
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </body>
    </html>
<?php } ?>



