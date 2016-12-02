
<div class="lineitems index large-12 medium-8 columns content">
    <h3><?= __('Line Items') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('order_id') ?></th>
                <th><?= $this->Paginator->sort('product_id') ?></th>
                <th><?= $this->Paginator->sort('qty') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lineitems as $lineitem): ?>
            <tr>
                <td><?= $this->Number->format($lineitem->id) ?></td>
                <td><?= $lineitem->has('order') ? $this->Html->link($lineitem->order->id, ['controller' => 'Orders', 'action' => 'view', $lineitem->order->id]) : '' ?></td>
                <td><?= $lineitem->has('product') ? $this->Html->link($lineitem->product->name, ['controller' => 'Products', 'action' => 'view', $lineitem->product->id]) : '' ?></td>
                <td><?= $this->Number->format($lineitem->qty) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $lineitem->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $lineitem->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $lineitem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lineitem->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
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
