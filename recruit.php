<?php include_once './connectionDb.php'; ?>
<?php
$class_foreach = $db->query("SELECT id, name, color "
        . "FROM classes ");

$class_foreach->setFetchMode(PDO::FETCH_OBJ);
while ($class = $class_foreach->fetch()) {
    ?>
    <div class="col-md-6" style="color:<?php echo $class->color; ?>"><?php echo utf8_encode($class->name); ?></div>
    <div class = "col-md-6">
        <?php
        try {
            $spe_foreach = $db->query("SELECT name, logo, isRecruitable, fk_class "
                    . "FROM specialisations ");

            $spe_foreach->setFetchMode(PDO::FETCH_OBJ);
            while ($spe = $spe_foreach->fetch()) {
                if ($spe->fk_class == $class->id) {
                    ?>
                    <img class="recruitImg <?php if ($spe->isRecruitable == 0) echo "desactivatedRecruit"; ?>" title="<?php echo utf8_encode($spe->name); ?>" src="<?php echo $spe->logo; ?>"/>

                <?php } ?>
            <?php } ?>
        <?php } catch (PDOException $e) { ?>
            <p>Recrutement Off</p>
        <?php } ?>
    </div>
<?php } ?>