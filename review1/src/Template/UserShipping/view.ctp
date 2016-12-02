
<div class="userShipping view large-9 medium-8 columns content">
    <h3><?= h($userShipping->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $userShipping->has('user') ? $this->Html->link($userShipping->user->id, ['controller' => 'Users', 'action' => 'view', $userShipping->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Shipping address1') ?></th>
            <td><?= h($userShipping->shipping_address1) ?></td>
        </tr>
        <tr>
            <th><?= __('Shipping address2') ?></th>
            <td><?= h($userShipping->shipping_address2) ?></td>
        </tr>
        <tr>
            <th><?= __('Shipping Suburb') ?></th>
            <td><?= h($userShipping->shipping_suburb) ?></td>
        </tr>
        <tr>
            <th><?= __('Shipping State') ?></th>
            <td><?= h($userShipping->shipping_state) ?></td>
        </tr>
        <tr>
            <th><?= __('Country') ?></th>
            <td><?= $userShipping->has('country') ? $this->Html->link($userShipping->country->name, ['controller' => 'Countries', 'action' => 'view', $userShipping->country->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($userShipping->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Shipping Pcode') ?></th>
            <td><?= $this->Number->format($userShipping->shipping_pcode) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Orders') ?></h4>
        <?php if (!empty($userShipping->orders)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Date') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Total') ?></th>
                <th><?= __('Status') ?></th>
                <th><?= __('Discount') ?></th>
                <th><?= __('Courier Id') ?></th>
                <th><?= __('Vendor Id') ?></th>
                <th><?= __('User Shipping Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($userShipping->orders as $orders): ?>
            <tr>
                <td><?= h($orders->id) ?></td>
                <td><?= h($orders->date) ?></td>
                <td><?= h($orders->user_id) ?></td>
                <td><?= h($orders->total) ?></td>
                <td><?= h($orders->status) ?></td>
                <td><?= h($orders->discount) ?></td>
                <td><?= h($orders->courier_id) ?></td>
                <td><?= h($orders->vendor_id) ?></td>
                <td><?= h($orders->user_shipping_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Orders', 'action' => 'view', $orders->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Orders', 'action' => 'edit', $orders->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Orders', 'action' => 'delete', $orders->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orders->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
