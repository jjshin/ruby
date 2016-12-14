<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ruby's Gifts!</title>

    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('default.css') ?>
    <?= $this->Html->css('fonts.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <script type="text/javascript" src="<?php echo  $this->request->webroot;?>js/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <?= $this->Html->css('custom.css') ?>
    <?= $this->Html->css('dropdown.css') ?>
</head>
<body>
    <div class="container admin-page">
        <div id="logo" class="center-block">
            <a href="<?php echo  $this->request->webroot;?>"><img src="<?php echo  $this->request->webroot;?>img/logo.png"></a>
            <div class="login">
                <?php if (is_null($this->request->session()->read('Auth.User.id'))) { ?>
                    <a class="btn btn-info" href="<?php echo  $this->request->webroot;?>users/login" role="button">Login</a>
                <?php } else { ?>
                    <strong>Admin</strong>
                    <a class="btn btn-info" href="<?php echo  $this->request->webroot;?>users/logout" role="button">Logout</a>
                <?php } ?>
            </div>
        </div>

        <div class="center-block">
          <center>
            <h3>Admin Menu</h3>
            <div class="btn-group admin-menu" role="group">
                <a class="btn <?= strpos($this->request->url, 'users') !== FALSE ? 'btn-success' : 'btn-secondary'; ?>" href="<?php echo  $this->request->webroot;?>users">Accounts</a>
                <a class="btn btn-secondary <?= strpos($this->request->url, 'category') !== FALSE || strpos($this->request->url, 'subcategory') !== FALSE ? 'btn-success' : 'btn-secondary'; ?>" href="<?php echo  $this->request->webroot;?>category">Categories</a>
                <a class="btn btn-secondary <?= strpos($this->request->url, 'products') !== FALSE ? 'btn-success' : 'btn-secondary'; ?>" href="<?php echo  $this->request->webroot;?>products/adminIndex">Products</a>
                <a class="btn btn-secondary <?= strpos($this->request->url, 'orders') !== FALSE ? 'btn-success' : 'btn-secondary'; ?>" href="<?php echo  $this->request->webroot;?>orders/adminIndex">Orders</a>
                <a class="btn btn-secondary <?= strpos($this->request->url, 'brands') !== FALSE ? 'btn-success' : 'btn-secondary'; ?>" href="<?php echo  $this->request->webroot;?>brands">Brands</a>
                <a class="btn btn-secondary <?= strpos($this->request->url, 'suppliers') !== FALSE ? 'btn-success' : 'btn-secondary'; ?>" href="<?php echo  $this->request->webroot;?>suppliers">Suppliers</a>
                <a class="btn btn-secondary <?= strpos($this->request->url, 'enquires') !== FALSE ? 'btn-success' : 'btn-secondary'; ?>" href="<?php echo  $this->request->webroot;?>enquires">Enquires</a>
                <a class="btn btn-secondary <?= strpos($this->request->url, 'sliders') !== FALSE ? 'btn-success' : 'btn-secondary'; ?>" href="<?php echo  $this->request->webroot;?>sliders">Sliders</a>
                <a class="btn btn-secondary <?= strpos($this->request->url, 'bulkload') !== FALSE ? 'btn-success' : 'btn-secondary'; ?>" href="<?php echo  $this->request->webroot;?>bulkload/products_import">Bulk Upload</a>

            </div>
        </div>

        <div class="center-block">
            <?= $this->Flash->render(); ?>
            <?= $this->fetch('content'); ?>
        </div>

        <div id="copyright">
            <p>&copy; Untitled. All rights reserved. | Photos by <a href="http://fotogrph.com/">Fotogrph</a> | Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.</p>
        </div>
    </div>
</body>
</html>
