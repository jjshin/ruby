<div>
  <h3>Manage Orders</h3>
  <table class="table">
    <thead>
      <tr>
        <th>Order No.</th>
        <th>Customer Email</th>
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
        <td><?= $order->Users['email'];?></td>
        <td><?= $order['created'];?></td>
        <td><?= $this->Number->currency($order['order_total'], 'USD');?></td>
        <td>
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
        </td>
        <td>
          <?= $this->Html->link('View Detail', ['action'=>'adminDetail', $order['id']], ['class'=>'btn btn-xs btn-info']);?>
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
