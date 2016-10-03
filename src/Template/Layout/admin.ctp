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
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <?= $this->Html->css('custom.css') ?>
</head>
<body>
	<div id="logo" class="container">
        <a href="<?php echo  $this->request->webroot;?>"><img src="<?php echo  $this->request->webroot;?>img/logo.png"></a>
        <div class="login">
            <?php if (is_null($this->request->session()->read('Auth.User.username'))) { ?>
				<a class="btn btn-info" href="<?php echo  $this->request->webroot;?>users/login" role="button">Login</a>
			<?php } else { ?>
				<strong><?php echo $this->request->session()->read('Auth.User.username');?></strong> 
				<a class="btn btn-info" href="<?php echo  $this->request->webroot;?>users/logout" role="button">Logout</a>
			<?php } ?>
        </div>
    </div>

<div>
	<?php if (is_null($this->request->session()->read('Auth.User.username'))) { ?>
		<a href="<?php echo  $this->request->webroot;?>users/login">Login</a>
	<?php } else { ?>
		<strong><?php echo $this->request->session()->read('Auth.User.username');?></strong> 
		<a href="<?php echo  $this->request->webroot;?>users/logout">Logout</a>
	<?php } ?>
</div>

<div>
	<h3>Admin Menu</h3>
	<ul>
		<li><a href="<?php echo  $this->request->webroot;?>users">User</a></li>
		<li><a href="<?php echo  $this->request->webroot;?>category">Category</a></li>
		<li><a href="<?php echo  $this->request->webroot;?>products/adminIndex">Product</a></li>
	</ul>
</div>

<div>
	<?= $this->Flash->render(); ?>
	<?= $this->fetch('content'); ?>
</div>
<div id="copyright">
	<p>&copy; Untitled. All rights reserved. | Photos by <a href="http://fotogrph.com/">Fotogrph</a> | Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.</p>
</div>
</body>
</html>
