<a href="<?=base_url('welcome')?>">Home</a>
<br>
<br>


<?php echo form_open(); ?>

<?php echo form_error('campus_nev'); ?>
<?php echo form_input(
    ['type' => 'text', 'name' => 'campus_nev'],
    set_value('campus_nev', $record->nev),
    ['placeholder' => 'campus neve']); ?>
<br>

<?php echo form_error('campus_leiras'); ?>
<?php echo form_textarea(
    ['name' => 'campus_leiras'],
    set_value('campus_leiras', $record->leiras),
    ['placeholder' => 'campus leirasa']); ?>
<br>

<?php echo form_error('campus_aktiv'); ?>
<?php echo form_dropdown(
    ['name' => 'campus_aktiv'],
    $statuszok,
    [$record->aktiv]
); ?>
<br>

<?php echo form_button(['type' => 'submit', 'name' => 'mentes'], 'Modositas'); ?>

<?php echo form_close(); ?>