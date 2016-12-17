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
    <script type="text/javascript" src="<?php echo  $this->request->webroot;?>js/dropdown.js"></script>
    <script type="text/javascript" src="<?php echo  $this->request->webroot;?>js/jquery.elevateZoom-3.0.8.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css">
    
    <!-- Latest compiled and minified CSS -->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="<?php echo  $this->request->webroot;?>css/slick.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo  $this->request->webroot;?>css/slick-theme.css"/>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <?= $this->Html->css('custom.css') ?>
</head>
<body>

    <div id="logo" class="container" style="padding-top: 0px; padding-bottom: 20px;">
        <div class="col-md-4 col-md-offset-4">
            <a href="<?php echo  $this->request->webroot;?>"><img src="<?php echo  $this->request->webroot;?>img/logo.png" style="max-width:100%;"></a>
        </div>
        <div class="col-md-4 text-right" style="margin-top:40px;">
		<?php if (is_null($this->request->session()->read('Auth.User.id'))) { ?>
            <?= $this->Html->link('', ['controller'=>'Cart', 'action'=>'index'], ['class'=>'glyphicon glyphicon-shopping-cart', 'role'=>'button']);?>
            <?= $this->Html->link('', ['controller'=>'Users', 'action'=>'login'], ['class'=>"glyphicon glyphicon-user", 'role'=>'button']);?>

        <?php } elseif($this->request->session()->read('Auth.User.role')==1){ //Admin ?>
            <strong><?php echo $this->request->session()->read('Auth.User.firstname').' '.$this->request->session()->read('Auth.User.lastname');?></strong>
            <?= $this->Html->link('Admin', ['controller'=>'Users', 'action'=>'index'], ['class'=>'btn btn-success', 'role'=>'button']);?>
            <?= $this->Html->link('Logout', ['controller'=>'Users', 'action'=>'logout'], ['class'=>'btn btn-info', 'role'=>'button']);?>
        <?php } else { //User ?>
            <strong><?php echo $this->request->session()->read('Auth.User.firstname').' '.$this->request->session()->read('Auth.User.lastname');?></strong>
            <?= $this->Html->link('', ['controller'=>'Cart', 'action'=>'index'], ['class'=>'glyphicon glyphicon-shopping-cart', 'role'=>'button']);?>
            <?= $this->Html->link('My Account', ['controller'=>'Myshop', 'action'=>'index'], ['class'=>'btn btn-info', 'role'=>'button']);?>
            <?= $this->Html->link('Logout', ['controller'=>'Users', 'action'=>'logout'], ['class'=>'btn btn-warning', 'role'=>'button']);?>
        <?php } ?>

        </div>
    </div>
<?php /*
    <nav class="navbar navbar-inverse">
      <div class="container-fluid nav-top">
                  <!-- Brand and toggle get grouped for better mobile display -->
                  <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>
                  </div>
                  <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                      <li><a class="direct-link" href="<?php echo  $this->request->webroot;?>">Home</a></li>
                      <li><a href="#" class="dropdown-toggle" data-toggle="dropdown">For Her <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                          <li><a href="#" class="dropdown-toggle" data-toggle="dropdown">Accessories <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                              <li><a href="#" class="dropdown-toggle" data-toggle="dropdown">Ring<b class="caret"></b></a>

                                                          </li>
                                                      </ul>
                                                  </li>
                                              </ul>
                                          </li>
                                      </ul>


                  </div>
    </nav>
    */?>
<?php //echo '<pre>'; print_r($categories); echo '</pre>';?>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid nav-top">
        <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a class="direct-link" href="<?php echo  $this->request->webroot;?>">Home</a></li>
    				<?php foreach($categories as $id=>$main): ?>
    				<li>
                       	<?php if(sizeof($main)>1){?>
    						<a type="button" class="dropdown-toggle" data-toggle="dropdown"><?= $main['name'];?> <span class="caret"></span></a>
            <ul class="dropdown-menu">
                  <!-- add view all -->
                    <li>
                        <?= $this->Html->link('view all', ['controller'=>'Products', 'action' => 'index', $id], ['class'=>'direct-link']) ?>
                    </li>
                <?php foreach($main['children'] as $cateid=>$cate):?>
                    <li>
                        <?php if(sizeof($cate)>1){?>
                            <a type="button" class="dropdown-toggle" data-toggle="dropdown"><?= $cate['name'];?> <span class="caret"></span></a>
                            <ul class="dropdown-menu">
<!--
                                <li>
                        <?= $this->Html->link('view all', ['controller'=>'Products', 'action' => 'index', $id, $cateid], ['class'=>'direct-link']) ?>
                    </li>
-->
                            <?php foreach($cate['children'] as $sub):?>
                                <li>
                                    <?php echo $this->Html->link($sub['name'], ['controller'=>'Products', 'action' => 'index', $id, $cateid, $sub['id']], ['class'=>'direct-link']) ?>
                                </li>
                            <?php endforeach; ?>
                            </ul>
                        <?php }else{ ?>
                            <?= $this->Html->link($cate['name'], ['controller'=>'Products', 'action' => 'index', $id, $cateid], ['class'=>'direct-link']) ?>
                        <?php } ?>
                    </li>
                <?php endforeach; ?>

            </ul>
    					<?php }else{ ?>
    						<?= $this->Html->link($main['name'], ['controller'=>'Products', 'action' => 'index', $id], ['class'=>'direct-link']) ?>
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
                    <!-- <li><a class="direct-link" href="<?php echo  $this->request->webroot;?>coming">Sales</a></li>
                    <li><a class="direct-link" href="<?php echo  $this->request->webroot;?>coming">Gift Voucher</a></li>
                    <li><a class="direct-link" href="<?php echo  $this->request->webroot;?>coming">Enquire</a></li> -->

                    <!-- <li>
                        <a type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Enquires <span class="caret"></span></a>
                        <ul class="dropdown-menu" aria-labelledby="dLabel">
                            <li><?php echo $this->Html->link('Enquires', ['controller'=>'Enquires', 'action'=>'add']);?></li>
                            <li><a href="#">Gift Vouchers</a></li>
                        </ul>
                    </li> -->
                </ul>
<!--                <div class="col-sm-4 col-md-3">-->
<!--                  <form class="navbar-form" role="search">-->
<!--                    <div class="input-group">-->
<!--                      <input type="text" class="form-control" placeholder="Search" name="q">-->
<!--                      <div class="input-group-btn">-->
<!--                        <button class="btn btn-default" type="submit" style="margin-top: 0px"><i class="glyphicon glyphicon-search"></i></button>-->
<!--                      </div>-->
<!--                    </div>-->
<!--                  </form>-->
<!--                </div>-->
            </div>
        </div>
    </nav>

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
                            <p><b><a href="<?php echo  $this->request->webroot;?>/footer/aboutus">About Us</b></a></p>
                            <p><b><a href="<?php echo  $this->request->webroot;?>/footer/brands">Brands</b></a></p>
                            <p><b><a href="<?php echo  $this->request->webroot;?>/footer/termsandcondition">Terms &amp; Conditions</b></a></p>
                            <p><b><a href="<?php echo  $this->request->webroot;?>/footer/privacypolicy">Privacy Policy</b></a></p>
                        </ul>
                    </li>
                </ul>
            </div><!-- widgets column left end -->

            <div class="col-md-2 col-sm-3"><!-- widgets column left -->
                <ul class="list-unstyled clear-margins"><!-- widgets -->
                    <li class="widget-container widget_recent_news"><!-- widgets list -->
                        <h1 class="title-widget">Help</h1>
                        <ul>
                            <p><b><a href="<?php echo  $this->request->webroot;?>subscribe">Subscribe</b></a></p>
                            <p><b><a href="<?php echo  $this->request->webroot;?>/footer/delivery">Delivery</b></a></p>
                            <p><b><a href="<?php echo  $this->request->webroot;?>/footer/returns">Returns</b></a></p>
                            <p><b><a href="<?php echo  $this->request->webroot;?>/footer/faq">FAQ</b></a></p>
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
