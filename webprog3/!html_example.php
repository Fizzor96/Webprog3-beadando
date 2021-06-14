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
    <title>Sztim</title>
</head>
<body>

    <nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
        <a class="navbar-brand" href="<?=base_url('welcome')?>">Sztim</a>
        </div>
        <ul class="nav navbar-nav">
        <li><a href="<?=base_url('welcome')?>">Home</a></li>
        <li><a href="<?=base_url('campus/list')?>">Campusok</a></li>
        <li><a href="<?=base_url('building/list')?>">Epuletek</a></li>
        <li><a href="<?=base_url('welcome')?>">Shop</a></li>
        <?php if($this->ion_auth->logged_in()): ?>
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

    <!-- Implementations -->

    

</body>
</html>