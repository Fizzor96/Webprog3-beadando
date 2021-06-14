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
    <title>Detail</title>
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
    <a href="<?=base_url('shop/list')?>"><button class='btn btn-primary'>Back</button></a>
    <br><br>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Publisher</th>
            <th>Description</th>
            <th>Cost</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><?=$records->id ?></td>
            <td><?=$records->title ?></td>
            <td><?=$records->publisher ?></td>
            <td><?=$records->description ?></td>
            <td><?=$records->cost ?> EUR</td>
        </tr>
        </tbody>
    </table>
    </div>
    

</body>
</html>



<!-- <h1><?=$title?></h1>

<?php if($records == null || empty($records)) : ?>
    <p>Nincs rogzitve egyetlen campus sem</p>
<?php else: ?>
    <?php print_r($records); ?>
    <br>
    <?php echo anchor(base_url('shop/list'), 'Vissza!') ?>
<?php endif; ?> -->