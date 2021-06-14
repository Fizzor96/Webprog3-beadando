<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title><?=$title?></title>
</head>
<body>

    <nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
        <a class="navbar-brand" href="<?=base_url('welcome')?>">Sztim</a>
        </div>
        <ul class="nav navbar-nav">
        <li><a href="<?=base_url('welcome')?>">Home</a></li>
        <?php if($this->ion_auth->logged_in()): ?>
            <li><a href="<?=base_url('shop/list')?>">Shop</a></li>
        <li><a href="<?=base_url('welcome')?>">Wishlist</a></li>
        <li><a href="<?=base_url('welcome')?>">Library</a></li>
        <li><a href="<?=base_url('welcome')?>">Users</a></li>
        <?php endif; ?>
        
        </ul>
        <ul class="nav navbar-nav navbar-right">
        <?php if(!$this->ion_auth->logged_in()): ?>
        <li><a href="<?=base_url('auth/register')?>"><span class="glyphicon glyphicon-user"></span> Register</a></li>
        <li><a href="<?=base_url('auth/login')?>"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        <?php else: ?>
            <li><a href="<?=base_url('auth/logout')?>"><span class="glyphicon glyphicon-user"></span> Logout</a></li>
        <?php endif; ?>
        </ul>
    </div>
    </nav>

<div class="container">
    <?php if(!empty($errors)) :  ?>
        <?php foreach($errors as &$error) : ?>
            <p><?=$error?></p>
        <?php endforeach; ?>
    <?php endif; ?>
    <a href="<?=base_url('shop/list')?>"><button class='btn btn-primary'>Back</button></a>
    <br><br>
    <h2><?=$title?></h2>
    <?php echo form_open('', 'class="form-horizontal"'); ?>
    
    <!-- TITLE -->
    <div class="form-group">
    <label class="control-label col-sm-2" for="title">Title:</label>
    <div class="col-sm-10">
        <?php echo form_error('title'); ?>
        <?php echo form_input(
            ['type' => 'text', 'name' => 'title', 'id' => 'title'],
            '',
            ['placeholder' => 'Enter title', 'class' => 'form-control']); ?>
    </div>
    </div>

    <!-- PUBLISHER -->
    <div class="form-group">
    <label class="control-label col-sm-2" for="publisher">Publiher:</label>
    <div class="col-sm-10">
        <?php echo form_error('publisher'); ?>
        <?php echo form_input(
            ['type' => 'text', 'name' => 'publisher', 'id' => 'publisher'],
            '',
            ['placeholder' => 'Enter publisher', 'class' => 'form-control']); ?>
    </div>
    </div>

    <!-- DESCRIPTION -->
    <div class="form-group">
    <label class="control-label col-sm-2" for="title">Description:</label>
    <div class="col-sm-10">
        <?php echo form_input(
            ['type' => 'text', 'name' => 'description', 'id' => 'description'],
            '',
            ['placeholder' => 'Enter description', 'class' => 'form-control']); ?>
    </div>
    </div>

    <!-- COST -->
    <div class="form-group">
    <label class="control-label col-sm-2" for="cost">Cost:</label>
    <div class="col-sm-10">
        <?php echo form_input(
            ['type' => 'number', 'name' => 'cost', 'id' => 'cost'],
            '',
            ['placeholder' => 'Enter cost', 'class' => 'form-control']); ?>
    </div>
    </div>

    <?php echo form_button(['type' => 'submit', 'name' => 'save'], 'Save', ['class' => 'btn btn-danger']); ?>

    <?php echo form_close(); ?>
</div>

</body>
</html>