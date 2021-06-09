<!-- <?php echo validation_errors(); ?> -->

<a href="<?=base_url('welcome')?>">Home</a>
<?php echo form_open(); ?>

<?php echo form_error('campus_nev'); ?>
<?php echo form_input(
    ['type' => 'text', 'name' => 'campus_nev'],
    set_value('campus_nev', ''),
    ['placeholder' => 'campus neve']); ?>
<br>

<?php echo form_error('campus_leiras'); ?>
<?php echo form_textarea(
    ['name' => 'campus_leiras'],
    set_value('campus_leiras', ''),
    ['placeholder' => 'campus leirasa']); ?>
<br>

<?php echo form_button(['type' => 'submit', 'name' => 'mentes'], 'Mentes'); ?>

<?php echo form_close(); ?>