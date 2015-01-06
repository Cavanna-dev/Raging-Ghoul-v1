<?php include_once './connectionDb.php'; ?>

<?php
try {
    $raid_foreach = $db->query("SELECT id, name, img "
            . "FROM raid "
            . "WHERE isHome = 1 ");
    $raid_foreach->setFetchMode(PDO::FETCH_OBJ);
    while ($raid = $raid_foreach->fetch()) {
        ?>
        <img class="col-md-12" src="img/<?php echo $raid->img; ?>"/>
        <table class="table">
            <thead>
                <tr>
                    <th><?php echo $raid->name; ?> - Boss</th>
                    <th>HM</th>
                    <th>MC</th>
                </tr>
            </thead>
            <tbody>
                <?php
                try {
                    $boss_foreach = $db->query("SELECT raid, boss, hm, mc "
                            . "FROM progress "
                            . "WHERE raid = " . $raid->id);
                    $boss_foreach->setFetchMode(PDO::FETCH_OBJ);
                    while ($boss = $boss_foreach->fetch()) {
                        ?>
                        <tr>
                            <td style="font-weight: bold;"><?php echo $boss->boss; ?></td>
                            <td><?php if($boss->hm == 1) echo '<img src="img/tick.png"/>';else echo '<img src="img/cross.png"/>'?></td>
                            <td><?php if($boss->mc == 1) echo '<img src="img/tick.png"/>';else echo '<img src="img/cross.png"/>'?></td>
                        </tr>
                    <?php } ?>
                <?php } catch (PDOException $e) { ?>
                <p>Aucun progress</p>
            <?php } ?>
        </tbody>
        </table>
    <?php } ?>
<?php } catch (PDOException $e) { ?>
    <p>Aucun progress</p>
<?php } ?>