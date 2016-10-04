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
	<link rel="stylesheet" type="text/css" href="<?php echo  $this->request->webroot;?>css/slick.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo  $this->request->webroot;?>css/slick-theme.css"/>
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
    <div id="header">
        <div id="menu" class="container">
            <ul class="dropdown">
                <li><a class="direct-link" href="/">Home</a></li>
				<?php foreach($categories as $id=>$cate): ?>
				<li>
                   	<?php if(isset($cate['subcategory'])){?>
						<a type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $cate['name'];?> <span class="caret"></span></a>
						<ul class="dropdown-menu" aria-labelledby="dLabel">
						<?php foreach($cate['subcategory'] as $subcate):?>
							<li><?= $this->Html->link($subcate['name'], ['controller'=>'Products', 'action' => 'index', $id, $subcate['id']]) ?></li>
						<?php endforeach; ?>
						</ul>
					<?php }else{ ?>
						<?= $this->Html->link($cate['name'], ['controller'=>'Products', 'action' => 'index', $id], ['class'=>'direct-link']) ?>
					<?php } ?>
					</li>
				<?php endforeach; ?>
				<li><a class="direct-link" href="#">Sale</a></li>
                <li>
                    <a type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Contact Us <span class="caret"></span></a>
                    <ul class="dropdown-menu" aria-labelledby="dLabel">
                        <li><a href="/aboutus">About Us</a></li>
                        <li><a href="#">Gift Vouchers</a></li>
                        <li><a href="#">FAQ</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>

    <div id="content-body" class="container <?= $this->template ?>">
        <?= $this->fetch ('content'); ?>
    </div>

    <div id="footer-wrapper">
        <div id="footer" class="container">
          <p>Social Media Connections, T&C and Privacy Policy </p>
            <!-- <div id="fbox1">
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
                <a href="#" class="button icon icon-arrow-right">Learn More</a> </div> -->
        </div>
    </div>

    <div id="copyright">
        <p>&copy; Ruby's Gifts. All rights reserved. | Design by Ruby IT Solution.</p>
    </div>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/slick.min.js"></script>
	<script type="text/javascript">
	  $(document).ready(function() {
	      $('.main-slider').slick({
	        dots: true,
			arrows: true,
	        infinite: true,
	        speed: 500,
			autoplay: true,
	        fade: true,
	        cssEase: 'linear'
	      });
	  });
	</script>
</body>
</html>
