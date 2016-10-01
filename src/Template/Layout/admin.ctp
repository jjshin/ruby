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
</head>
<body>
<div id="logo" class="container">
	<h1><a href="#" class="icon icon-spinner"><span>SquareAway</span></a></h1>
</div>

<div>
	<?php if (is_null($this->request->session()->read('Auth.User.username'))) { ?>
		<a href="/users/login">Login</a>
	<?php } else { ?>
		<strong><?php echo $this->request->session()->read('Auth.User.username');?></strong> 
		<a href="/users/logout">Logout</a>
	<?php } ?>
</div>

<div>
	<ul>
		<li><a href="/users">User</a></li>
		<li><a href="/category">Category</a></li>
		<?php /*<li><a href="/products/adminIndex">Product</a></li>*/ ?>
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
