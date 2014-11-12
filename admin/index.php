<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Raging Ghoul</title>
        <link rel="stylesheet" href="http://bootswatch.com/darkly/bootstrap.min.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="../css/main.css" type="text/css" />
    </head>
    <body>
        <div class="navbar navbar-default" style="margin:0">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Raging Ghoul - BO</a>
                </div>
            </div>
        </div>
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