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
      <span><?= $order['order_status'];?></span>
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

</div>
