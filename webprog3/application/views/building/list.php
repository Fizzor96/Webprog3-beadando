<h1><?=$title?></h1>

<a href="<?=base_url('')?>">Home</a>
<br><br>

<?php echo anchor(base_url('building/insert'), 'Uj rekord hozzaadasa'); ?>
<br><br>

<?php if($records == null || empty($records)) : ?>
    <p>Nincs rogzitve egyetlen epulet sem</p>
<?php else: ?>
<table>
    <thead>
        <tr>
            <th>Azonosito</th>
            <th>Epulet kod</th>
            <th>Epulet nev</th>
            <th>Campus nev</th>
            <th>Leiras</th>
            <th>Muveletek</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($records as $record) : ?>
        <tr>
            <td><?=$record->id ?></td>
            <td><?=$record->kod ?></td>
            <td><?=$record->nev ?></td>
            <td><?=$record->campus_nev ?></td>
            <td><?=$record->leiras ?></td>
            <td>
                <!-- 
                <?=anchor(base_url('campus/list/'.$record->id), 'Reszletek'); ?>
                <?=anchor(base_url('campus/delete/'.$record->id), 'Torles'); ?>
                <?=anchor(base_url('campus/update/'.$record->id), 'Modositas'); ?>
                -->
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<p>Lekerdezett rekordok szama: <?=count($records) ?></p>
<?php endif; ?>