<?php
session_start();
if ($_SESSION['login'] == 'admin')
    header('location:recruit.php');
else {
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset = "UTF-8">
            <title>Raging Ghoul</title>
            <?php include_once './cssFiles.php';
            ?>
        </head>
        <body>
            <?php include './menu.php'; ?>
            <div id="bodybg">
                <div class="container">
                    <div id="bodycontent" class="jumbotron">
                        <form class="form-horizontal" method="POST" action="login.php">
                            <fieldset>
                                <legend>Connexion BO</legend>
                                <div class="form-group">
                                    <label for="login" class="col-lg-2 control-label">Login</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="inputEmail" name="login" placeholder="Login" required="true">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-lg-2 control-label">Mot de passe</label>
                                    <div class="col-lg-10">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe" required="true">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-10 col-lg-offset-2">
                                        <button type="submit" class="btn btn-primary">Connexion</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </body>
    </html>
<?php } ?>