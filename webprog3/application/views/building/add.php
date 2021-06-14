<a href="<?=base_url('welcome')?>">Home</a>
<br><br>

<?php echo form_open(); ?>

<?php echo form_error('kod'); ?>
<?php echo form_input(
    ['type' => 'text', 'name' => 'kod'],
    set_value('kod', ''),
    ['placeholder' => 'epuletkod']); ?>
<br>

<?php echo form_error('nev'); ?>
<?php echo form_input(
    ['type' => 'text', 'name' => 'nev'],
    set_value('kod', ''),
    ['placeholder' => 'epulet neve']); ?>
<br>

<?php echo form_error('leiras'); ?>
<?php echo form_textarea(
    ['name' => 'leiras'],
    set_value('leiras', ''),
    ['placeholder' => 'epulet leirasa', 'cols' => 10, 'rows' => 5]); ?>
<br>

<?php echo form_error('active'); ?>
<?php echo form_dropdown(
    ['name' => 'active'],
    $statuses); ?>
<br>

<?php echo form_error('campus_id'); ?>
<?php echo form_dropdown(
    ['name' => 'campus_id'],
    $campuses); ?>
<br>

<?php echo form_button(['type' => 'submit', 'name' => 'mentes'], 'Mentes'); ?>

<?php echo form_close(); ?>