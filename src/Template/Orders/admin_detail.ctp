<div>
  <h2>Order</h2>

  <h3>Detail</h3>
  <ul>
    <li>
      <label><strong>Order Date</strong></label>
      <span><?= $order['created'];?></span>
    </li>

    <li>
      <label><strong>Order Status</strong></label>
      <?php $options=array(1=>'Confirming', 2=>'Confirmed', 3=>'On its way', 4=>'Out for delivery', 5=>'Delivered', 6=>'Cancelled'); ?>
      <div class="dropdown">
        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
          <?= $options[$order['order_status']];?>
          <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
          <?php foreach($options as $key=>$option):?>
            <li><?= $this->Html->link($option, ['action'=>'changeStatus', $order['id'], $key]);?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    </li>

    <li>
      <label><strong>User ID</strong></label>
      <span><?= $order->Users['username'];?></span>
    </li>

    <li>
      <label><strong>User Name</strong></label>
      <span><?= $order->Users['firstname'].', '.$order->Users['lastname'];?></span>
    </li>

    <li>
      <label><strong>User Email</strong></label>
      <span><?= $order->Users['email'];?></span>
    </li>

  </ul>

  <h3>Products</h3>
  <ul>
    <?php
    foreach($products as $item):
      $subtotal=$item['totalprice']*$item['orderqty'];
    ?>
      <li>
        <?= empty($item->Products['image']) ? '' : $this->Html->image($item->Products['image'], ['style'=>'max-width:100px;']); ?>
        <strong><?= $item->Products['name'];?></strong>
        <span><?= $this->Number->currency($item['totalprice'], 'USD');?></span>
        <span><?= $item['orderqty'];?></span>
        <span><?= $this->Number->currency($subtotal, 'USD');?></span>
      </li>
    <?php endforeach;?>
  </ul>

  <div>
    <label><strong>TOTAL</strong></label>
    <span><?= $this->Number->currency($order['order_total'], 'USD');?></span>
  </div>

  <?= $this->Html->link('List', ['action'=>'order'], ['class'=>'btn btn-info']);?>

</div>
