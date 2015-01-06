<?php
//Début Traitement du menu

$menuLeft = array(
    'Accueil' => './index.php',
    'Forum' => './forum/',
    'Roster' => './roster.php',
    'Vidéo' => '#',
);

?>
<div id="megaBan">
    <div class="container">
        <h1 style="color:#B54743;">Raging Ghoul</h1>
    </div>
</div>
<div  class="container">
    <div class="navbar navbar-default" style="margin:0;">
        <div class="navbar-collapse collapse navbar-responsive-collapse">
            <ul class="nav navbar-nav">
                <?php foreach ($menuLeft as $elementNameMenu => $elementUrlMenu) { ?>
                    <li class="<?php if (str_replace("/", "", $_SERVER['PHP_SELF']) == str_replace("./", "", $elementUrlMenu)) echo "active"; ?>">
                        <a href="<?php echo $elementUrlMenu; ?>"><?php echo $elementNameMenu; ?></a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>