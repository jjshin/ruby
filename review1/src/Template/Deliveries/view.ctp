<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Delivery'), ['action' => 'edit', $delivery->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Delivery'), ['action' => 'delete', $delivery->id], ['confirm' => __('Are you sure you want to delete # {0}?', $delivery->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Deliveries'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Delivery'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="deliveries view large-9 medium-8 columns content">
    <h3><?= h($delivery->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('First Name') ?></th>
            <td><?= h($delivery->first_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Name') ?></th>
            <td><?= h($delivery->last_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($delivery->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address1') ?></th>
            <td><?= h($delivery->address1) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address2') ?></th>
            <td><?= h($delivery->address2) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('City') ?></th>
            <td><?= h($delivery->city) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Country') ?></th>
            <td><?= h($delivery->country) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('State') ?></th>
            <td><?= h($delivery->state) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Zip') ?></th>
            <td><?= h($delivery->zip) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contact No') ?></th>
            <td><?= h($delivery->contact_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($delivery->id) ?></td>
        </tr>
    </table>
</div>
