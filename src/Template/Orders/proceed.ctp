<br>
<br>
<h3>Checkout</h3>
<br>
<div class = "row">
  <div class="col-md-8">
            <h3>Shipping Address</h3>
            <br>

          <div>
             <div class="row">
                <div class="col-md-6">
                    Receive Name:<?= $this->request->data['receive_name'] ?>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                    Email Address: <?= $this->request->session()->read('Auth.User.email') ?>
                </div>
                <div class="col-md-6">
                    Phone Number: <?= $this->request->data['phone'] ?>
                </div>
              </div>
              <div class="row">
                <div class="aa-checkout-single-bill">
                <div class="col-md-12">
                    Address 1: <?= $this->request->data['address1'] ?>
                </div>
              </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                    Address 2: <?= $this->request->data['address2'] ?>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                    Suburb: <?= $this->request->data['suburb'] ?>
                </div>
                <div class="col-md-6">
                    State: <?= $this->request->data['state'] ?>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                    Postcode: <?= $this->request->data['postcode'] ?>
                </div>
              </div>
            </div>
            <br>
<?= $this->Html->link('Edit Address', ['controller' => 'orders', 'action' => 'checkoutguest'], array( 'class' => 'btn btn-default')) ?>
</div>
<br>
  <div class = "col-md-4">
    <h3>Price Details</h3>
    <br>
    <div>


	    <div class="price-details">

			<span>Total</span>
                <span class="total">$ <?= $total ?></span>
		    <div class="clearfix"></div>
		</div>
  </div>
<br>


<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">

  <input type="hidden" name="cmd" value="_cart">
  <input type="hidden" name="upload" value="1">
    <?php $number = 1; ?>
    <?php foreach ($products as  $item): ?>

  <!-- Specify details about the item that buyers will purchase. -->
  <input type="hidden" name="item_name_<?php echo $number ?>" value="<?php echo $item->Products['name']?>">
  <input type="hidden" name="amount_<?php echo $number ?>" value="<?php echo $item->Products['sale_price']?>">
  <input type="hidden" name="quantity_<?php echo $number ?>" value="<?php echo $item['qty']?>">
    <?php $number++; ?>
  <?php endforeach; ?>

  <input type="hidden" name="business" value="businesstest@rubysgifts.com">
  <input type="hidden" name="currency_code" value="AUD">
  <input type="hidden" name="no_shipping" value="0">
  <input type="hidden" name="return" value="<?php echo  $this->request->webroot;?>orders/success">
  <input type="hidden" name="cancel_return" value="<?php echo  $this->request->webroot;?>orders/fail">


  <!-- Display the payment button. -->
  <center>
  <input type="image" name="submit" border="0"
         src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/gold-rect-paypalcheckout-44px.png"
         alt="Check out">
  <img alt="" border="0" width="1" height="1"
       src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >

</form>


    </div>
</div>
