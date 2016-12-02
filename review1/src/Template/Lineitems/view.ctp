
<div class="lineitems view large-9 medium-8 columns content">
    <h3><?= h($lineitem->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Order') ?></th>
            <td><?= $lineitem->has('order') ? $this->Html->link($lineitem->order->id, ['controller' => 'Orders', 'action' => 'view', $lineitem->order->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Product') ?></th>
            <td><?= $lineitem->has('product') ? $this->Html->link($lineitem->product->name, ['controller' => 'Products', 'action' => 'view', $lineitem->product->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($lineitem->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Qty') ?></th>
            <td><?= $this->Number->format($lineitem->qty) ?></td>
        </tr>
    </table>
</div>
