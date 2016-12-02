<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Country'), ['action' => 'edit', $country->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Country'), ['action' => 'delete', $country->id], ['confirm' => __('Are you sure you want to delete # {0}?', $country->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Countries'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Country'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="countries view large-9 medium-8 columns content">
    <h3><?= h($country->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Code') ?></th>
            <td><?= h($country->code) ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($country->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($country->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Users') ?></h4>
        <?php if (!empty($country->users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Email') ?></th>
                <th><?= __('Password') ?></th>
                <th><?= __('Fname') ?></th>
                <th><?= __('Lname') ?></th>
                <th><?= __('Dob') ?></th>
                <th><?= __('address1') ?></th>
                <th><?= __('address2') ?></th>
                <th><?= __('Suburb') ?></th>
                <th><?= __('State') ?></th>
                <th><?= __('Pcode') ?></th>
                <th><?= __('Contactno') ?></th>
                <th><?= __('User Type') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Country Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($country->users as $users): ?>
            <tr>
                <td><?= h($users->id) ?></td>
                <td><?= h($users->email) ?></td>
                <td><?= h($users->password) ?></td>
                <td><?= h($users->fname) ?></td>
                <td><?= h($users->lname) ?></td>
                <td><?= h($users->dob) ?></td>
                <td><?= h($users->address1) ?></td>
                <td><?= h($users->address2) ?></td>
                <td><?= h($users->suburb) ?></td>
                <td><?= h($users->state) ?></td>
                <td><?= h($users->pcode) ?></td>
                <td><?= h($users->contactno) ?></td>
                <td><?= h($users->user_type) ?></td>
                <td><?= h($users->created) ?></td>
                <td><?= h($users->modified) ?></td>
                <td><?= h($users->country_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
