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
	<a href="#"><img src="img/logo.png"></a>
</div>
<div id="header">
	<div id="menu" class="container">
		<ul>
			<li class="current_page_item"><a href="#" accesskey="1" title="">Home</a></li>
			<li><a href="#" accesskey="1" title="">For Her</a></li>
			<li><a href="#" accesskey="2" title="">For Him</a></li>
			<li><a href="#" accesskey="3" title="">Special Occasions</a></li>
			<li><a href="#" accesskey="4" title="">Brands</a></li>
			<li><a href="#" accesskey="5" title="">Sale</a></li>
			<li><a href="#" accesskey="6" title="">Contact Us</a></li>
		</ul>
	</div>
</div>
<?= $this->fetch ('content'); ?>
<div id="footer-wrapper">
	<div id="footer" class="container">
		<div id="fbox1">
			<h2>Maecenas luctus</h2>
			<p>Nullam non wisi a sem semper eleifend. Donec mattis libero eget urna. Duis pretium velit ac mauris. Proin eu wisi suscipit nulla suscipit interdum.</p>
			<a href="#" class="button icon icon-arrow-right">Learn More</a> </div>
		<div id="fbox2">
			<h2>Integer gravida</h2>
			<p>Proin eu wisi suscipit nulla suscipit interdum. Nullam non wisi a sem semper eleifend. Donec mattis libero eget urna. Duis pretium velit ac mauris.</p>
			<a href="#" class="button icon icon-arrow-right">Learn More</a> </div>
		<div id="fbox3">
			<h2>Praesent scelerisque</h2>
			<p>Donec mattis libero eget urna. Duis pretium velit ac mauris. Proin eu wisi suscipit nulla suscipit interdum. Nullam non wisi a sem semper eleifend.</p>
			<a href="#" class="button icon icon-arrow-right">Learn More</a> </div>
		<div id="fbox4">
			<h2>Etiam rhoncus volutpat</h2>
			<p>Donec mattis libero eget urna. Duis pretium velit ac mauris. Proin eu wisi suscipit nulla suscipit interdum. Nullam non wisi a sem semper eleifend.</p>
			<a href="#" class="button icon icon-arrow-right">Learn More</a> </div>
	</div>
</div>

<div id="copyright">
	<p>&copy; Untitled. All rights reserved. | Photos by <a href="http://fotogrph.com/">Fotogrph</a> | Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.</p>
</div>
</body>
</html>
