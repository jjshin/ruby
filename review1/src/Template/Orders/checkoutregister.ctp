<br>
<br>
<h3>Checkout</h3>
<br>
<div class = "row">
  <div class="col-md-8">
            <h3>Shipping Address</h3>
            <br>

            $this->Form->create($user); ?>
            <?php
                echo $this->Form->input('email');
                echo $this->Form->input('password');
                echo $this->Form->input('fname', array('label' => 'First Name'));
                echo $this->Form->input('lname', array('label' => 'Last Name'));
                $this->Form->input('dob', array( 'label' => 'Date of birth', 'empty'=>true,
                            'dateFormat' => 'DD-MMM-YYYY',
                            'minYear' => date('Y') - 70,
                            'maxYear' => date('Y') - 15 ));
                echo $this->Form->input('streetno', array('label' => 'Street Number'));
                echo $this->Form->input('street', array('label' => 'Street'));
                echo $this->Form->input('suburb', array('label' => 'Suburb'));
                echo $this->Form->input('state', array('label' => 'State'));
                echo $this->Form->input('pcode', array('label' => 'Postcode'));
                echo $this->Form->input('contactno', array('label' => 'Contact Number'));
                echo $this->Form->input('country_id', ['options' => $countries, 'empty' => true]);

             ?>
       <br>
       <?= $this->Form->submit('Register', array('class' => 'button')); ?>
       <?= $this->Form->end(); ?>
</div>
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
</div>
