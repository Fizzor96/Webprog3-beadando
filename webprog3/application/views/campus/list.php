<h1><?=$title?></h1>

<a href="<?=base_url('welcome')?>">Home</a>
<br><br>

<?php if($records == null || empty($records)) : ?>
    <p>Nincs rogzitve egyetlen campus sem</p>
<?php else: ?>
<table>
    <thead>
        <tr>
            <th>Azonosito</th>
            <th>Nev</th>
            <th>Leiras</th>
            <th>Aktiv</th>
            <th>Muveletek</th>
        </tr>
    </thead>
    <tbody>
    <!-- <?php print_r($records); ?> -->
    <?php foreach($records as $record) : ?>
        <tr>
            <td><?=$record->id ?></td>
            <td><?=$record->nev ?></td>
            <td><?=$record->leiras ?></td>
            <td><?=$record->aktiv ?></td>
            <td>
                <?=anchor(base_url('campus/list/'.$record->id), 'Reszletek'); ?>
                <?=anchor(base_url('campus/delete/'.$record->id), 'Torles'); ?>
                <?=anchor(base_url('campus/update/'.$record->id), 'Modositas'); ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<p>Lekerdezett rekordok szama: <?=count($records) ?></p>
<?php endif; ?>