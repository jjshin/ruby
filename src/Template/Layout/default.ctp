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

$cakeDescription = 'Rubys Gifts';
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

	<script type="text/javascript" src="<?php echo  $this->request->webroot;?>js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo  $this->request->webroot;?>js/slick.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css">
    <!-- Latest compiled and minified CSS -->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="<?php echo  $this->request->webroot;?>css/slick.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo  $this->request->webroot;?>css/slick-theme.css"/>
    <?= $this->Html->css('custom.css') ?>
</head>
<body>

    <div id="logo" class="container" style="padding-top: 0px; padding-bottom: 10px;">
        <div class="col-md-4 col-md-offset-4">
            <a href="<?php echo  $this->request->webroot;?>"><img src="<?php echo  $this->request->webroot;?>img/logo.png" style="max-width:100%;"></a>
        </div>
        <div class="col-md-4 text-right" style="margin-top:20px;">
		<?php if (is_null($this->request->session()->read('Auth.User.id'))) { ?>
            <?= $this->Html->link('My Cart', ['controller'=>'Cart', 'action'=>'index'], ['class'=>'btn btn-success', 'role'=>'button']);?>
            <?= $this->Html->link('Login', ['controller'=>'Users', 'action'=>'login'], ['class'=>'btn btn-info', 'role'=>'button']);?>
        <?php } elseif($this->request->session()->read('Auth.User.role')==1){ //Admin ?>
            <strong><?php echo $this->request->session()->read('Auth.User.firstname').' ,'.$this->request->session()->read('Auth.User.lastname');?></strong>
            <?= $this->Html->link('Admin', ['controller'=>'Users', 'action'=>'index'], ['class'=>'btn btn-success', 'role'=>'button']);?>
            <?= $this->Html->link('Logout', ['controller'=>'Users', 'action'=>'logout'], ['class'=>'btn btn-info', 'role'=>'button']);?>
        <?php } else { //User ?>
            <strong><?php echo $this->request->session()->read('Auth.User.firstname').' ,'.$this->request->session()->read('Auth.User.lastname');?></strong>
            <?= $this->Html->link('My Cart', ['controller'=>'Cart', 'action'=>'index'], ['class'=>'btn btn-success', 'role'=>'button']);?>
            <?= $this->Html->link('My Shopping', ['controller'=>'Myshop', 'action'=>'index'], ['class'=>'btn btn-success', 'role'=>'button']);?>
            <?= $this->Html->link('Logout', ['controller'=>'Users', 'action'=>'logout'], ['class'=>'btn btn-info', 'role'=>'button']);?>
        <?php } ?>

        </div>
    </div>

    <nav class="navbar navbar-inverse">
        <div class="container-fluid nav-top">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a class="direct-link" href="<?php echo  $this->request->webroot;?>">Home</a></li>
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

                    <li>
                        <a type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">BRANDS <span class="caret"></span></a>
                        <ul class="dropdown-menu" aria-labelledby="dLabel">
                            <?php foreach($global_brands as $id=>$brand):?>
                                <li><?= $this->Html->link($brand, ['controller'=>'Products', 'action'=>'brands', $id]);?></li>
                            <?php endforeach; ?>
                        </ul>
                    </li>

                    <li>
                        <a type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Enquires <span class="caret"></span></a>
                        <ul class="dropdown-menu" aria-labelledby="dLabel">
                            <li><?php echo $this->Html->link('Enquires', ['controller'=>'Enquires', 'action'=>'add']);?></li>
                            <li><a href="#">Gift Vouchers</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <?php /*
    <div id="header">
        <div id="menu" class="container">
            <ul class="dropdown">
                <li><a class="direct-link" href="<?php echo  $this->request->webroot;?>">Home</a></li>
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

                <li>
                    <a type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">BRANDS <span class="caret"></span></a>
                    <ul class="dropdown-menu" aria-labelledby="dLabel">
                        <?php foreach($global_brands as $id=>$brand):?>
                            <li><?= $this->Html->link($brand, ['controller'=>'Products', 'action'=>'brands', $id]);?></li>
                        <?php endforeach; ?>
                    </ul>
                </li>

                <li>
                    <a type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Enquires <span class="caret"></span></a>
                    <ul class="dropdown-menu" aria-labelledby="dLabel">
                        <li><?php echo $this->Html->link('Enquires', ['controller'=>'Enquires', 'action'=>'add']);?></li>
                        <li><a href="#">Gift Vouchers</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    */?>

    <div id="content-body" class="container <?= $this->template ?>">
		<?= $this->Flash->render() ?>
        <?= $this->fetch ('content'); ?>
    </div>

    <!--footer-->
    <footer class="footer1">
      <div class="container">
        <div class="row"><!-- row -->
          <div class="col-md-3 col-md-offset-2 col-sm-4 col-sm-offset-1"><!-- widgets column center -->
            <ul class="list-unstyled clear-margins"><!-- widgets -->
            	<li class="widget-container widget_recent_news"><!-- widgets list -->
                <h1 class="title-widget">Contact</h1>
                  <div class="footerp">
                    <p><b>Email:</b> <a href="mailto:info@rubysgifts.com.au">info@rubysgifts.com.au</a></p>
                    <p><b>Phone: </b>03 9532 9155</p>
                    <p><b>Fax: </b>03 9523 5216</p>
                  </div>
                  <div class="social-icons">
                  	<ul class="nomargin">
                      <a href="https://www.facebook.com/rubygifts"><i class="fa fa-facebook-square fa-3x social-fb" id="social"></i></a>
        	            <a href="https://#"><i class="fa fa-instagram fa-3x social-is" id="social"></i></a>
        	            <a href="https://#"><i class="fa fa-pinterest-square fa-3x social-gp" id="social"></i></a>
        	            <a href="mailto:info@rubysgifts.com.au"><i class="fa fa-envelope-square fa-3x social-em" id="social"></i></a>
                    </ul>
                  </div>
            	</li>
            </ul>
          </div>

            <div class="col-md-3 col-sm-4"><!-- widgets column left -->
                <ul class="list-unstyled clear-margins"><!-- widgets -->
                    <li class="widget-container widget_recent_news"><!-- widgets list -->
                        <h1 class="title-widget"> About</h1>
                        <ul>
                            <p><b><a href="#">About Us</b></a></p>
                            <p><b><a href="#">Brands</b></a></p>
                            <p><b><a href="#">Terms &amp; Conditions</b></a></p>
                            <p><b><a href="#">Privacy Policy</b></a></p>
                        </ul>
                    </li>
                </ul>
            </div><!-- widgets column left end -->

            <div class="col-md-2 col-sm-3"><!-- widgets column left -->
                <ul class="list-unstyled clear-margins"><!-- widgets -->
                    <li class="widget-container widget_recent_news"><!-- widgets list -->
                        <h1 class="title-widget">Help</h1>
                        <ul>
                            <p><b><a href="#">Delivery</b></a></p>
                            <p><b><a href="#">Returns</b></a></p>
                            <p><b><a href="#">Contact</b></a></p>
                            <p><b><a href="#">FAQs</b></a></p>
                        </ul>
                    </li>
                </ul>
            </div><!-- widgets column left end -->
      </div>
    </div>
    </footer>
    <!--header-->

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="copyright">
                    © 2016, Ruby's Gifts, All rights reserved
                </div>
            </div>
        </div>
    </div>

	<script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script type="text/javascript" src="<?php echo $this->request->webroot;?>js/custom.js"></script>
</body>
</html>
