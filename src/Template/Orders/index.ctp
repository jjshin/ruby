<div class="container clearfix ind-common-pad">

    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 pull-left">

            <div class="section_header2 common">
              <center>
                <h2>Shipping Address</h2>
              </center>
            </div>

            <div>
              <center>
    <fieldset>
      <?php
      echo $this->Form->create(null, ['url'=>['controller'=>'Orders', 'action'=>'proceed']]);
      echo $this->Form->button('Use Registered Details', ['class'=>'btn btn-primary', 'type'=>'button', 'onclick'=>'set_detail();']);
      echo $this->Form->input('receive_name', ['class'=>'form-control', 'required', 'id'=>'receive_name', 'style'=>'width: 400px']);
      echo $this->Form->input('phone', ['class'=>'form-control', 'required', 'id'=>'phone', 'style'=>'width: 400px']);
      echo $this->Form->input('address1', ['class'=>'form-control', 'required', 'id'=>'address1', 'style'=>'width: 400px']);
      echo $this->Form->input('address2', ['class'=>'form-control', 'id'=>'address2', 'style'=>'width: 400px']);
      echo $this->Form->input('suburb', ['class'=>'form-control', 'required', 'id'=>'suburb', 'style'=>'width: 400px']);
      echo $this->Form->input('state', ['class'=>'form-control', 'required', 'id'=>'state', 'style'=>'width: 400px']);
      echo $this->Form->input('postcode', ['class'=>'form-control', 'required', 'id'=>'postcode', 'style'=>'width: 400px']);
       ?>
    </fieldset>
  </center>
  </div>

  <?php if ($this->request->session()->read('Auth.User.id')) { ?>
<script>
  function set_detail(){
    $('#receive_name').val('<?= $this->request->session()->read('Auth.User.firstname').' '.$this->request->session()->read('Auth.User.lastname');?>')
    $('#phone').val('<?= $this->request->session()->read('Auth.User.phone');?>');
    $('#address1').val('<?= $this->request->session()->read('Auth.User.address1');?>');
    $('#address2').val('<?= $this->request->session()->read('Auth.User.address2');?>');
    $('#suburb').val('<?= $this->request->session()->read('Auth.User.suburb');?>');
    $('#state').val('<?= $this->request->session()->read('Auth.User.state');?>');
    $('#postcode').val('<?= $this->request->session()->read('Auth.User.postcode');?>');
  }
</script>
<?php }?>
  <br>





          </div>
          <div class="col-lg-6 about-sec-content">
              <div class="section_header2 common">
                <center>
                  <h2>Order Confirmation</h2>
                </center>
              </div>
              <center>
                <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
               <?php echo $this->Form->create(null, ['url'=>['controller'=>'Orders', 'action'=>'index']]);?>
      <ul>
      <?php
      $total=0;
        foreach($cart as $item):
          $total+=($item['qty'] * $item->Products['sale_price']);
      ?>
        <li>
          <?= empty($item->Products['image']) ? '' : $this->Html->image($item->Products['image'], ['style'=>'max-width:150px;']); ?>
          <br>
          <strong><?= $item->Products['name'];?></strong>
          <span>x <?= $item['qty'];?></span>
          <!-- <span class="price"><?= $this->Number->currency($item->Products['sale_price'], 'USD');?></span> -->
          <span class="sub_total"><?= $this->Number->currency($item->Products['sale_price']*$item['qty'], 'USD');?></span>
        </li>
      <?php endforeach;?>
      </ul>
    </center>
<br>
      <div>
        <center>
        <label><strong>TOTAL</strong></label>
        <span id="cart_total"><?= $this->Number->currency($total, 'USD');?></span>
        </center>
      </div>
    </div>



      <?php /*
        <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">


        <!-- Identify your business so that you can collect the payments. -->

        <!-- Specify a Buy Now button. -->

        <input type="hidden" name="cmd" value="_cart">
        <input type="hidden" name="upload" value="1">
          <?php $number = 1; ?>
          <?php foreach ($cart as  $item): ?>

        <!-- Specify details about the item that buyers will purchase. -->
        <input type="hidden" name="item_name_<?php echo $number ?>" value="<?php echo $item->Products['name']?>">
        <input type="hidden" name="amount_<?php echo $number ?>" value="<?php echo $item->Products['sale_price']?>">
        <input type="hidden" name="quantity_<?php echo $number ?>" value="<?php echo $item['qty']?>">
          <?php $number = $number +1; ?>
        <?php endforeach; ?>

        <input type="hidden" name="business" value="businesstest@rubysgifts.com">
        <input type="hidden" name="currency_code" value="AUD">
        <input type="hidden" name="no_shipping" value="0">
        <!-- <input type="hidden" name="return" value="<?php echo  $redirect_url ?>">
        <input type="hidden" name="cancel_return" value="<?php echo $redirect_url ?>"> -->
          <?php //echo $this->Form->create(null, ['url'=>['controller'=>'Orders', 'action'=>'success']]);?>


        <!-- Display the payment button. -->
        <center>
        <input type="image" name="submit" border="0"
               src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/gold-rect-paypalcheckout-44px.png"
               alt="Check out">
        <img alt="" border="0" width="1" height="1"
             src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >

      </form>
      */?>
    
    <input type="image" name="submit" border="0"
               src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/gold-rect-paypalcheckout-44px.png"
               alt="Check out">
        <img alt="" border="0" width="1" height="1"
             src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >
<?php echo $this->Form->end();?>



          </div>
        </div>
      </div>
