<div class="products index large-9 medium-8 columns content">
  <h2>Order</h2>
  <?php echo $this->Form->create(null, ['url'=>['controller'=>'Orders', 'action'=>'proceed']]);?>
  <ul>
  <?php
  $total=0;
    foreach($cart as $item):
      $total+=($item['qty'] * $item->Products['price']);
  ?>
    <li>
      <?= empty($item->Products['image']) ? '' : $this->Html->image($item->Products['image'], ['style'=>'max-width:100px;']); ?>
      <strong><?= $item->Products['name'];?></strong>
      <span><?= $item['qty'];?></span>
      <span class="price"><?= $this->Number->currency($item->Products['price'], 'USD');?></span>
    </li>
  <?php endforeach;?>
  </ul>

  <div>
    <label><strong>TOTAL</strong></label>
    <span id="cart_total"><?= $this->Number->currency($total, 'USD');?></span>
  </div>

  <div>
    <?php
      echo $this->Form->button('Proceed', ['class'=>'btn btn-success']);
      echo $this->Form->end();
     ?>
</div>
