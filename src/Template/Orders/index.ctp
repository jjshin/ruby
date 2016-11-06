<div class="products index large-9 medium-8 columns content">
  <h2>Order</h2>
  <?php echo $this->Form->create(null, ['url'=>['controller'=>'Orders', 'action'=>'proceed']]);?>
  <ul>
  <?php
  $total=0;
    foreach($cart as $item):
      $total+=($item['qty'] * $item->Products['sale_price']);
  ?>
    <li>
      <?= empty($item->Products['image']) ? '' : $this->Html->image($item->Products['image'], ['style'=>'max-width:100px;']); ?>
      <strong><?= $item->Products['name'];?></strong>
      <span><?= $item['qty'];?></span>
      <span class="price"><?= $this->Number->currency($item->Products['sale_price'], 'USD');?></span>
      <span class="sub_total"><?= $this->Number->currency($item->Products['sale_price']*$item['qty'], 'USD');?></span>
    </li>
  <?php endforeach;?>
  </ul>

  <div>
    <label><strong>TOTAL</strong></label>
    <span id="cart_total"><?= $this->Number->currency($total, 'USD');?></span>
  </div>

  <div>
    <fieldset>
      <?php
      echo $this->Form->button('Same as user detail', ['class'=>'btn btn-primary', 'type'=>'button', 'onclick'=>'set_detail();']);

      echo '<h3>Delivery Detail</h3>';
      echo $this->Form->input('receive_name', ['class'=>'form-control', 'required', 'id'=>'receive_name']);
      echo $this->Form->input('phone', ['class'=>'form-control', 'required', 'id'=>'phone']);
      echo $this->Form->input('address1', ['class'=>'form-control', 'required', 'id'=>'address1']);
      echo $this->Form->input('address2', ['class'=>'form-control', 'id'=>'address2']);
      echo $this->Form->input('suburb', ['class'=>'form-control', 'required', 'id'=>'suburb']);
      echo $this->Form->input('state', ['class'=>'form-control', 'required', 'id'=>'state']);
      echo $this->Form->input('postcode', ['class'=>'form-control', 'required', 'id'=>'postcode']);
       ?>
    </fieldset>
  </div>

  <div>
    <?php
      echo $this->Form->button('Proceed', ['class'=>'btn btn-success']);
      echo $this->Form->end();
     ?>
</div>

<?php if ($this->request->session()->read('Auth.User.id')) { ?>
<script>
  function set_detail(){
    $('#receive_name').val('<?= $this->request->session()->read('Auth.User.firstname').', '.$this->request->session()->read('Auth.User.lastname');?>')
    $('#phone').val('<?= $this->request->session()->read('Auth.User.phone');?>');
    $('#address1').val('<?= $this->request->session()->read('Auth.User.address1');?>');
    $('#address2').val('<?= $this->request->session()->read('Auth.User.address2');?>');
    $('#suburb').val('<?= $this->request->session()->read('Auth.User.suburb');?>');
    $('#state').val('<?= $this->request->session()->read('Auth.User.state');?>');
    $('#postcode').val('<?= $this->request->session()->read('Auth.User.postcode');?>');
  }
</script>
<?php }?>
