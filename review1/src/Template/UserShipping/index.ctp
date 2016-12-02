
<div class="userShipping index large-9 medium-8 columns content">
    <h3><?= __('User Shipping') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th><?= $this->Paginator->sort('shipping_address1') ?></th>
                <th><?= $this->Paginator->sort('shipping_address2') ?></th>
                <th><?= $this->Paginator->sort('shipping_suburb') ?></th>
                <th><?= $this->Paginator->sort('shipping_state') ?></th>
                <th><?= $this->Paginator->sort('shipping_pcode') ?></th>
                <th><?= $this->Paginator->sort('shipping_country_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($userShipping as $userShipping): ?>
            <tr>
                <td><?= $this->Number->format($userShipping->id) ?></td>
                <td><?= $userShipping->has('user') ? $this->Html->link($userShipping->user->id, ['controller' => 'Users', 'action' => 'view', $userShipping->user->id]) : '' ?></td>
                <td><?= h($userShipping->shipping_address1) ?></td>
                <td><?= h($userShipping->shipping_address2) ?></td>
                <td><?= h($userShipping->shipping_suburb) ?></td>
                <td><?= h($userShipping->shipping_state) ?></td>
                <td><?= $this->Number->format($userShipping->shipping_pcode) ?></td>
                <td><?= $userShipping->has('country') ? $this->Html->link($userShipping->country->name, ['controller' => 'Countries', 'action' => 'view', $userShipping->country->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $userShipping->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $userShipping->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $userShipping->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userShipping->id)]) ?>
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
