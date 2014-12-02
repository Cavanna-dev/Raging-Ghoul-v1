<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Raging Ghoul</title>
        <!-- http://bootswatch.com/slate/ -->
        <link rel="stylesheet" href="http://bootswatch.com/slate/bootstrap.min.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="./css/main.css" type="text/css" />
    </head>
    <body>
        <div id="bodybg">
            <div  class="container">
                <?php include 'menu.php'; ?>
            <div id="megaBan"></div>
            </div>
            <div class="container">
                <div class="row-fluid">
                    <div class="col-md-4">
                        <h3>Recrutement</h3>
                        <?php include_once './recruit.php'; ?>
                    </div>
                    <div class="col-md-8">
                        <blockquote>
                            <h2>Titre Article 1</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                            <small>Par <span style="color:purple;">@auteur</span> publié le <cite title="Source Title">01/12/2014</cite></small>
                        </blockquote>
                        <blockquote class="pull-right">
                            <h2>Titre Article 2</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                            <small class="text-right">Par <span style="color:purple;">@auteur</span> publié le <cite title="Source Title">01/12/2014</cite></small>
                        </blockquote>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="panel-footer">Panel footer</div>
            </div>
        </div>
    </body>
</html>
