<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Delivery'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="deliveries index large-9 medium-8 columns content">
    <h3><?= __('Deliveries') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('first_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('last_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address1') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address2') ?></th>
                <th scope="col"><?= $this->Paginator->sort('city') ?></th>
                <th scope="col"><?= $this->Paginator->sort('country') ?></th>
                <th scope="col"><?= $this->Paginator->sort('state') ?></th>
                <th scope="col"><?= $this->Paginator->sort('zip') ?></th>
                <th scope="col"><?= $this->Paginator->sort('contact_no') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($deliveries as $delivery): ?>
            <tr>
                <td><?= $this->Number->format($delivery->id) ?></td>
                <td><?= h($delivery->first_name) ?></td>
                <td><?= h($delivery->last_name) ?></td>
                <td><?= h($delivery->email) ?></td>
                <td><?= h($delivery->address1) ?></td>
                <td><?= h($delivery->address2) ?></td>
                <td><?= h($delivery->city) ?></td>
                <td><?= h($delivery->country) ?></td>
                <td><?= h($delivery->state) ?></td>
                <td><?= h($delivery->zip) ?></td>
                <td><?= h($delivery->contact_no) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $delivery->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $delivery->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $delivery->id], ['confirm' => __('Are you sure you want to delete # {0}?', $delivery->id)]) ?>
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
