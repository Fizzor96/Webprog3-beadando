<h1><?=$title?></h1>

<?php if($records == null || empty($records)) : ?>
    <p>Nincs rogzitve egyetlen campus sem</p>
<?php else: ?>
    <?php print_r($records); ?>
    <br>
    <?php echo anchor(base_url('campus/list'), 'Vissza!') ?>
<?php endif; ?>