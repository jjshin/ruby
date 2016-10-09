<div>
  <h2>My Order</h2>
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Order Date</th>
        <th>Order Total</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>

    <tbody>
    <?php foreach($orders as $order):?>
      <tr>
        <td><?= $order['id'];?></td>
        <td><?= $order['created'];?></td>
        <td><?= $this->Number->currency($order['order_total'], 'USD');?></td>
        <td>
          <span class="label label-default">
          <?php
          $options=array(1=>'Confirming', 2=>'Confirmed', 3=>'On its way', 4=>'Out for delivery', 5=>'Delivered', 6=>'Cancelled');
          echo $options[$order['order_status']];
          ?>
          </span>
        </td>
        <td>
          <?= $this->Html->link('View Detail', ['action'=>'orderDetail', $order['id']], ['class'=>'btn btn-xs btn-info']);?>
        </td>
      </tr>
    <?php endforeach;?>
    </tbody>
  </table>

  <div class="paginator">
      <ul class="pagination">
          <?= $this->Paginator->prev('< ' . __('previous')) ?>
          <?= $this->Paginator->numbers() ?>
          <?= $this->Paginator->next(__('next') . ' >') ?>
      </ul>
      <p><?= $this->Paginator->counter() ?></p>
  </div>

</div>
