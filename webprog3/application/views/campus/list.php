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
    
    <?php if($records == null || empty($records)) : ?>
        <?php if(!empty($errors)) :  ?>
            <?php foreach($errors as &$error) : ?>
                <p><?=$error?></p>
            <?php endforeach; ?>
        <?php endif; ?>
        <?php $this->session->unset_userdata('errors'); ?>
        <p>Nincs rogzitve egyetlen campus sem<br>
        <a href="<?=base_url('campus/insert')?>"><button class='btn btn-primary'>New Record</button></a></p>
    <?php else: ?>
    <div class="container">
        <?php if(!empty($errors)) :  ?>
            <?php foreach($errors as &$error) : ?>
                <p><?=$error?></p>
            <?php endforeach; ?>
        <?php endif; ?>
    <?php $this->session->unset_userdata('errors'); ?>
    <h2><a href="<?=base_url('campus/insert')?>"><button class='btn btn-primary'>New Record</button></a><br><br>
    <?=$title?></h2>
    <table class="table">
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
    </div>
    <?php endif; ?>
    

</body>
</html>