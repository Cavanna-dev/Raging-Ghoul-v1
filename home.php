<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Raging Ghoul</title>
        <!-- http://bootswatch.com/slate/ -->
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
                            <img class="col-md-12" src="img/cognefort.jpg"/>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="color:#93C54B;">Cognefort - Boss</th>
                                        <th style="color:#93C54B;">HM</th>
                                        <th style="color:#93C54B;">MC</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Kargath Lamepoing</td>
                                        <td><img src="img/tick.png"/></td>
                                        <td><img src="img/cross.png"/></td>
                                    </tr>
                                </tbody>
                            </table>
                            <img style="margin-top:15px;" class="col-md-12" src="img/fonderie.jpg"/>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="color:#93C54B;">Fonderie - Boss</th>
                                        <th style="color:#93C54B;">HM</th>
                                        <th style="color:#93C54B;">MC</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Gruul</td>
                                        <td><img src="img/cross.png"/></td>
                                        <td><img src="img/cross.png"/></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="news" class="col-md-9 charte">
                        <blockquote>
                            <h2>Nouveau Site !</h2>
                            <img src="img/cognefort.jpg" width="100%"/>
                            <p>C'est avec plaisir que je vous annonce que le site de la guilde Raging Ghoul est à présent terminé !.</p>
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
