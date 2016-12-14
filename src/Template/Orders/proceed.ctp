<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" id="frm">


        <!-- Identify your business so that you can collect the payments. -->

        <!-- Specify a Buy Now button. -->

        <input type="hidden" name="cmd" value="_cart">
        <input type="hidden" name="upload" value="1">
    
        <input type="hidden" name="return" value="http://ie.infotech.monash.edu/team21/build4/orders/success/<?=$order_id?>">
<!--        <input type="hidden" name="return" value="http://localhost/team-21/orders/success/<?=$order_id?>">-->
          <?php $number = 1; ?>
          <?php foreach ($products as  $item): ?>
                  <?php
                  $shipping = (json_decode($response)->result->services[0]->totalprice_normal);
                  if ($shipping = null){
                          $this->Flash->error(__('Wrong Address.'));
                  }

                  debug($shipping);
                  //debug($aa);
                  die();

                  ?>

        <!-- Specify details about the item that buyers will purchase. -->
        <input type="hidden" name="item_name_<?php echo $number ?>" value="<?php echo $item->Products['name']?>">
        <input type="hidden" name="amount_<?php echo $number ?>" value="<?php echo $item->Products['sale_price']?>">
        <input type="hidden" name="quantity_<?php echo $number ?>" value="<?php echo $item->orderqty;?>">
                  <input type="hidden" name="handling_cart" value=<?= $shipping ?>>
          <?php $number = $number +1; ?>

          <?php endforeach; ?>


        <input type="hidden" name="business" value="businesstest@rubysgifts.com">
        <input type="hidden" name="currency_code" value="AUD">



        <!-- <input type="hidden" name="return" value="<?php echo  $redirect_url ?>">
        <input type="hidden" name="cancel_return" value="<?php echo $redirect_url ?>"> -->
          <?php //echo $this->Form->create(null, ['url'=>['controller'=>'Orders', 'action'=>'success']]);?>

</form>

<script type="text/javascript" src="<?php echo  $this->request->webroot;?>js/jquery.min.js"></script>
<script>
    $(document).ready(function(){
       $('#frm').submit(); 
    });
</script>