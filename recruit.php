<?php include_once './connectionDb.php'; ?>
<?php
$class_foreach = $db->query("SELECT id, name, color "
        . "FROM classes ");

$class_foreach->setFetchMode(PDO::FETCH_OBJ);
define("MAX_LENGHT_CLASS_NAME", 10);
?> 
<table class="table">
    <thead>
        <tr>
            <th style="color:#93C54B;">Classe</th>
            <th style="color:#93C54B;">Spécialité</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while ($class = $class_foreach->fetch()) {

            if (strlen($class->name) > MAX_LENGHT_CLASS_NAME) {
                $nameClass = substr($class->name, 0, MAX_LENGHT_CLASS_NAME) . "...";
            } else {
                $nameClass = $class->name;
            }
            ?>

            <tr>
                <td class="col-md-6" style="color:<?php echo $class->color; ?>"><?php echo $nameClass; ?></td>
                <td class="col-md-6"><?php
                    try {
                        $spe_foreach = $db->query("SELECT name, logo, isRecruitable, fk_class "
                                . "FROM specialisations ");

                        $spe_foreach->setFetchMode(PDO::FETCH_OBJ);
                        while ($spe = $spe_foreach->fetch()) {
                            if ($spe->fk_class == $class->id) {
                                ?>
                                <img class="recruitImg <?php if ($spe->isRecruitable == 0) echo "desactivatedRecruit"; ?>" title="<?php echo $spe->name; ?>" src="<?php echo $spe->logo; ?>"/>

                            <?php } ?>
                        <?php } ?>
                    <?php } catch (PDOException $e) { ?>
                        <p>Recrutement Off</p>
                    <?php } ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>