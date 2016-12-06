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



   <form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">

  <!-- Identify your business so that you can collect the payments. -->
   <input type="hidden" name="business" value="rubysgiftstest@gmail.com">

  <!-- Specify a Buy Now button. -->
  <input type="hidden" name="cmd" value="_cart">
  <input type="hidden" name="upload" value="1">
  <input type="hidden" name="lc" value="AU">
  <!-- Specify details about the item that buyers will purchase. -->


    <?php $i = 1; ?>


     <?php foreach ($products as $key => $product): ?>
   <input type="hidden" name="<?= 'item_name_'.$i ?>" value="<?php echo $product['item']['name'] ?>">
   <input type="hidden" name="<?= 'amount_'.$i ?>" value="<?php echo $product['item']['price'] ?>">
   <input type="hidden" name="<?= 'quantity_'.$i ?>" value="<?php echo $product['qty'] ?>">


  <?php $i = $i + 1; ?>


    <?php endforeach; ?>
    <input type="hidden" name="handling_cart" value=<?= $shippingCost ?>>
    <input type="hidden" name="address_override" value="1">
    <input type="hidden" name="address1" value="<?=$address1?>">
    <input type="hidden" name="address2" value="<?=$address2?>">
    <input type="hidden" name="city" value="<?=$suburb?>">
    <input type="hidden" name="country" value="<?=$country?>">
    <input type="hidden" name="email" value="<?=$email?>">
    <input type="hidden" name="first_name" value="<?=$firstName?>">
    <input type="hidden" name="last_name" value="<?=$lastName?>">
    <input type="hidden" name="state" value="<?=$state?>">
    <input type="hidden" name="zip" value="<?=$postcode?>">
     <input type="hidden" name="currency_code" value="AUD">


  <!-- Display the payment button. -->
   <input type="image" name="submit" border="0"
   src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/gold-rect-paypalcheckout-44px.png"
   alt="PayPal Checkout">


</form>
    </div>
</div>
