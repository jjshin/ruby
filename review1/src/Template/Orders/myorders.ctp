<h3><?= __('My Orders') ?></h3>
    <br>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id', 'Order Id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('transaction_no') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $order): ?>
            <tr>
                <td><?= $this->Number->format($order->id) ?></td>
                <td><?= h($order->date) ?></td>
                <td><?= $this->Number->currency($order->total+$order->shipping) ?></td>
                <td><?= h($order->status) ?></td>
                <td><?= h($order->transaction_no) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'orders','action' => 'myorderreview', $order->id]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


