
    <h3><?= __('All Orders') ?></h3>
    <br>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>

                <th scope="col"><?= $this->Paginator->sort('id', 'Order Id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id', 'Cust. Id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type', 'Checkout method') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total', 'Grand total') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status', 'Order status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('posted', 'Postage status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <center>
            <?php foreach ($orders as $order): ?>
            <tr>
                <td><?= $this->Number->format($order->id) ?></td>
                <td><?= h($order->date) ?></td>
                <td><?= $order->has('user') ? $this->Html->link($order->user->id, ['controller' => 'Users', 'action' => 'view', $order->user->id]) : '' ?></td>
                <td><?= h($order->type) ?></td>
                <td><?= $this->Number->currency($order->total+$order->shipping) ?></td>
                <td><?= h($order->status) ?></td>
                <td>
                    <?php if ($order->posted):?>
                        <?= "Posted"; ?>
                    <?php else:?>
                        <?= "Need to post"; ?></td>
                    <?php endif;?>
                </td>

                <td class="actions">
                    <?= $this->Html->link(__('View Order'), ['action' => 'view', $order->id]) ?><br>
                    <?= $this->Html->link(__('Edit Order Status'), ['action' => 'status', $order->id]) ?><br>
                     <?= $this->Html->link(__('Edit Post Status'), ['action' => 'edit', $order->id]) ?><br>

                </td>
            </tr>
            <?php endforeach; ?>
            </center>
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

