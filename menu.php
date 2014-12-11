<?php
    //Début Traitement du menu

    $menuLeft = array(
        'Accueil' => './index.php',
        'Forum' => './forum/',
        'Roster' => '#',
        'Vidéo' => '#',
    );
?>
<div class="navbar navbar-default" style="margin:0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="./index.php">Raging Ghoul</a>
    </div>
    <div class="navbar-collapse collapse navbar-responsive-collapse">
        <ul class="nav navbar-nav">
            <?php foreach($menuLeft as $elementNameMenu => $elementUrlMenu) { ?>
            <li class="<?php if(str_replace("/", "", $_SERVER['SERVER_NAME']) == $elementUrlMenu) echo "active"; ?>">
                <a href="<?php echo $elementUrlMenu; ?>"><?php echo $elementNameMenu; ?></a>
            </li>
            <?php } ?>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="./postuler.php">Postuler</a></li>
            </li>
        </ul>
    </div>
</div>