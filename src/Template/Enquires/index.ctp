
<div class="enquires index large-9 medium-8 columns content">
    <h3><?= __('Enquires') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('users_id') ?></th>
                <th><?= $this->Paginator->sort('products_id') ?></th>
                <th><?= $this->Paginator->sort('title') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($enquires as $enquire): ?>
            <tr>
                <td><?= $this->Number->format($enquire->id) ?></td>
                <td><?= $enquire->has('user') ? $this->Html->link($enquire->user->id, ['controller' => 'Users', 'action' => 'view', $enquire->user->id]) : '' ?></td>
                <td><?= $enquire->has('product') ? $this->Html->link($enquire->product->name, ['controller' => 'Products', 'action' => 'view', $enquire->product->id]) : '' ?></td>
                <td><?= h($enquire->title) ?></td>
                <td><?= h($enquire->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $enquire->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $enquire->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $enquire->id], ['confirm' => __('Are you sure you want to delete # {0}?', $enquire->id)]) ?>
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
