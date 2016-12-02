<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Shippingcost'), ['action' => 'edit', $shippingcost->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Shippingcost'), ['action' => 'delete', $shippingcost->id], ['confirm' => __('Are you sure you want to delete # {0}?', $shippingcost->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Shippingcosts'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Shippingcost'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="shippingcosts view large-9 medium-8 columns content">
    <h3><?= h($shippingcost->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('From Weight') ?></th>
            <td><?= $this->Number->format($shippingcost->from_weight) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('To Weight') ?></th>
            <td><?= $this->Number->format($shippingcost->to_weight) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= $this->Number->format($shippingcost->price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($shippingcost->id) ?></td>
        </tr>
    </table>
</div>
