<div>
  <h2>My Order</h2>

  <h3>Detail</h3>
  <ul>
    <li>
      <label><strong>Order Date</strong></label>
      <span><?= $order['created'];?></span>
    </li>

    <li>
      <label><strong>Order Status</strong></label>
      <span class="label label-default">
        <?php
        $options=array(1=>'Confirming', 2=>'Confirmed', 3=>'On its way', 4=>'Out for delivery', 5=>'Delivered', 6=>'Cancelled');
        echo $options[$order['order_status']];
        ?>
      </span>
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
