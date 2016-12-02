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

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css">
    <!-- Latest compiled and minified CSS -->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="<?php echo  $this->request->webroot;?>css/slick.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo  $this->request->webroot;?>css/slick-theme.css"/>
    <?= $this->Html->css('custom.css') ?>
</head>
<h3>Checkout Confirmation</h3>
<br>
<div class = "row">
  <div class="col-md-8">
    <div class="container">
    <h3>Shipping Address</h3>
    <br>
    <div>

      <div class="row">
        <div class="col-md-8">
          First Name:<?php echo $_POST['receive_name'];?>
        </div>
      </div>

      <div class="row">
        <div class="col-md-8">
          Phone Number: <?php echo $_POST['phone'];?>
        </div>
      </div>

      <div class="row">
        <div class="aa-checkout-single-bill">
          <div class="col-md-12">
            Address 1: <?php echo $_POST['address1'];?>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          Address 2: <?php echo $_POST['address2'];?>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          Suburb: <?php echo $_POST['suburb'];?>
        </div>
      </div>

      <div class="row">
        <div class="col-md-8">
          State: <?php echo $_POST['state'];?>
        </div>
      </div>

      <div class="row">
        <div class="col-md-8">
          Postcode: <?php echo $_POST['postcode'];?>
        </div>
      </div>
      <br>
      <?= $this->Html->link('Edit Address', ['controller' => 'orders', 'action' => ''], array( 'class' => 'btn btn-default')) ?>
    </div>
  </div>

  </div>
<!--    <div class="col-md-8">-->
      <h3>Order Details</h3>
      <br>
      <div>
        <th>Order Product</th>
        <td> <b><?= $productname ?></b>   </td>
      </div>
<div>
        <th>Product Price</th>
        <td> <b><?= $orderprice ?></b>   </td>
</div>
      <!--    <tr>-->
      <!--      <th>Order Qty</th>-->
      <!--      <td> <b>--><?//= $orderqty ?><!--</b>   </td>-->
      <!--    </tr>-->
      <!--    <tr>-->
      <!--      <th>Order Total Price</th>-->
      <!--      <td> <b>--><?//= $ordertotal ?><!--</b>   </td>-->
      <!--    </tr>-->

      <br>
<!--    </div>-->
  <br>

<form target="paypal" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">

  <!-- Identify your business so that you can collect the payments. -->
  <input type="hidden" name="business" value="rubysgiftstest@gmail.com">

  <!-- Specify a Buy Now button. -->
  <input type="hidden" name="cmd" value="_xclick">


<!--  --><?php //$i = 1; ?>

<!--  --><?php //foreach ($cart as $key => $item): ?>
  <!-- Specify details about the item that buyers will purchase. -->
  <input type="hidden" name=<?= 'item_name' ?> value="<?php echo $productname ?>">
  <input type="hidden" name="amount" value="<?php echo $orderprice ?>">
  <input type="hidden" name="quantity" value="<?php echo $orderqty ?>">
  <input type="hidden" name="currency_code" value="AUD">

<!--  --><?php //$i = $i + 1; ?>
<!--  --><?php //endforeach; ?>

  <!-- Display the payment button. -->
  <h2>Checkout</h2>
  <input type="image" name="submit" border="0"
         src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/gold-rect-paypalcheckout-44px.png"
         alt="Check out">
  <img alt="" border="0" width="1" height="1"
       src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >

</form>
<br>
