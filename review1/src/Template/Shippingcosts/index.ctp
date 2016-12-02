<div class="medicinal index large-9 medium-8 columns content">
    <h3><?= __('Shipping Prices') ?></h3>
    <table cellpadding="3" cellspacing="3">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('from_weight') ?></th>
                <th><?= $this->Paginator->sort('to_weight') ?></th>
                <th><?= $this->Paginator->sort('price') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($shippingcosts as $shippingcosts): ?>
            <center>
            <tr>
                <td><?= h($shippingcosts->from_weight) ?></td>
                <td><?= h($shippingcosts->to_weight) ?></td>
                <td><?= h($shippingcosts->price) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $shippingcosts->id]) ?><br>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $shippingcosts->id]) ?>
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
        <br>
        <?= $this->Paginator->counter() ?>
    </div>
</div>