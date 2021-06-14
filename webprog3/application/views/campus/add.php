
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Sztim</title>
</head>
<body>
    <!-- <?php echo validation_errors(); ?> -->

<a href="<?=base_url('welcome')?>">Home</a>
<br><br>
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

<?php echo form_button(['type' => 'submit', 'name' => 'mentes'], 'Mentes', ['class' => 'btn btn-primary']); ?>

<?php echo form_close(); ?>
</body>
</html>