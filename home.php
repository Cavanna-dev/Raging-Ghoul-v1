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
                    <div id="news" class="col-md-9 charte">
                        <blockquote>
                            <h2>Nouveau Site !</h2>
                            <img src="img/cognefort.jpg" width="100%"/>
                            <p>C'est avec plaisir que je vous annonce que le site de la guilde Raging Ghoul est à présent terminé !</p>
                            <small>Par <span style="color:#93C54B;">@Swoka</span> publié le <cite title="Source Title">30/12/2014</cite></small>
                        </blockquote>
                        <blockquote class="pull-right">
                            <h2>Recrutement Ouvert !</h2>
                            <img src="img/recrutement.jpg" width="100%"/>
                            <p>Le recrutement est Ouvert ! Referez vous au bloc de gauche pour savoir de quelle classe nous avons besoin.
                            Chaque candidature sera étudiée.</p>
                            <small class="text-right">Par <span style="color:#93C54B;">@Néryl</span> publié le <cite title="Source Title">01/12/2014</cite></small>
                        </blockquote>
                    </div>
                </div>
            </div>
            <?php include_once './footer.php'; ?>
        </div>
    </body>
</html>
