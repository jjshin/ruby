
<div class="orders view large-9 medium-8 columns content">
    <h3><?= h("Order ID: ".$order->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Order Id:') ?></th>
            <td><?= $this->Number->format($order->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date of order:') ?></th>
            <td><?= h($order->date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Order Status:') ?></th>
            <td><?= h($order->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Transaction no:') ?></th>
            <td><?= h($order->transaction_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Posting to:') ?></th>
            <td><?= $order->has('delivery') ? $this->Html->link($order->delivery->id, ['controller' => 'Deliveries', 'action' => 'view', $order->delivery->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total item Price:') ?></th>
            <td><?= $this->Number->currency($order->total) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Shipping:') ?></th>
            <td><?= $this->Number->currency($order->shipping) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Grand total:')?></th>
            <td><?= $this->Number->currency($order->total+$order->shipping) ?></td>
        </tr>
    </table>
    <br>
    <div class="related">
        <h4><?= __('Products Ordered:') ?></h4>
        <?php if (!empty($order->lineitems)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Product') ?></th>
                <th scope="col"><?= __('Qty') ?></th>
            </tr>
            <?php foreach ($order->lineitems as $lineitem): ?>
            <tr>
                <td><?= h($lineitem->product->name) ?></td>
                <td><?= h($lineitem->qty) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
