<div>
  <h2>My Order</h2>
  <ul>
    <?php foreach($orders as $order):?>
      <li>
        <span><?= $order['id'];?></span>
        <span><?= $this->Html->link($order['created'], ['action'=>'orderDetail', $order['id']]);?></span>
        <span><?= $this->Number->currency($order['order_total'], 'USD');?></span>
        <span><?= $order['order_status'];?></span>

        <a href="#" class="btn btn-xs btn-info">Change Status</a>
      </li>
    <?php endforeach;?>
  </ul>
</div>
