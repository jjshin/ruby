<br>
<br>
<h3>Checkout</h3>
<br>
<div class = "row">
  <div class="col-md-8">
     <h3>Shipping Address</h3>
     <br>
     <p>Currently we are only shipping within Australia.</p>
     <br>
     <?php echo $this->Form->create(null, [
        'url' => ['controller' => 'orders', 'action' => 'confirm']
     ]); ?>
     <div>
        <div class="row">
           <div class="col-md-6">
              <?= $this->Form->input('firstname', ['type' => 'carttext', 'placeholder' => "First Name*", 'label' => '', 'required' => true]); ?>
           </div>
           <div class="col-md-6">
              <?= $this->Form->input('lastname', ['type' => 'carttext', 'placeholder' => "Last Name*", 'label' => '', 'required' => true]); ?>
           </div>
        </div>
        <div class="row">
           <div class="col-md-6">
              <?= $this->Form->input('emailaddress', ['type' => 'cartemail', 'placeholder' => "Email Address*", 'label' => '', 'required' => true]); ?>
           </div>
           <div class="col-md-6">
              <?= $this->Form->input('phone', ['type' => 'carttel', 'placeholder' => "Phone*", 'label' => '', 'required' => true]); ?>
           </div>
        </div>
        <div class="row">
           <div class="aa-checkout-single-bill">
           <div class="col-md-6">
              <?= $this->Form->input('address1', ['type' => 'carttext', 'placeholder' => "Address 1*", 'label' => '', 'required' => true]); ?>
           </div>
           </div>
        </div>
        <div class="row">
           <div class="col-md-6">
              <?= $this->Form->input('address2', ['type' => 'carttext', 'placeholder' => "Address 2", 'label' => '', 'required' => false]); ?>
           </div>
        </div>
        <div class="row">
           <div class="col-md-6">
              <?= $this->Form->input('suburb', ['type' => 'carttext', 'placeholder' => "City", 'label' => '', 'required' => true]); ?>
           </div>
           <div class="col-md-6">
              <?= $this->Form->input('state', ['type' => 'carttext', 'placeholder' => "State/Region*", 'label' => '', 'required' => true]); ?>
           </div>
        </div>
        <div class="row">
           <div class="col-md-6">
              <?= $this->Form->input('postcode', ['type' => 'text', 'placeholder' => "Postcode / ZIP*", 'label' => '', 'required' => true]); ?>
           </div>
           <div class="col-md-6">
              <?= $this->Form->select('country', array('Australia' => 'Australia'), ['empty' => 'Country*']); ?>
            </div>
        </div>
     </div>
</div>
<br>
<br>
  <div class = "col-md-4">
    <h3>Price Details</h3>
    <br>
    <div>
	    <div class="price-details">

			<span>Sub Total</span>
                <span class="total">$ <?= $totalPrice ?></span>
			<span>Delivery Charges</span>
			    <span class="total">$ <?= $shippingCost ?></span>
		    <div class="clearfix"></div>
		</div>
		<h4 class="last-price">GRAND TOTAL</h4>
			<span class="total final">$
          <?= $totalPrice + $shippingCost ?>
			</span>
			<div class="clearfix"></div>
  </div>
<br>




     <?= $this->Form->submit('Save Shipping Address', ['class' => 'btn btn-default']); ?>
     <?php echo $this->Form->end();?>


</form>
    </div>
</div>
