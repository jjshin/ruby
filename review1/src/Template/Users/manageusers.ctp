<div class="users index large-10 columns content">
    <h3><?= ('User Management') ?></h3>
    <br>
    <br>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id', 'Id') ?></th>
                <th><?= $this->Paginator->sort('lname', array('label'=>'Last Name')) ?></th>
                <th><?= $this->Paginator->sort('fname', array('label'=>'First Name')) ?></th>
                <th><?= $this->Paginator->sort('email', array('label'=>'Email')) ?></th>
                <th><?= $this->Paginator->sort('contactno', array('label'=>'Phone')) ?></th>
                <th><?= $this->Paginator->sort('user_type', array('label'=>'User Level')) ?></th>

                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= h($user->id)?></td>
                <td><?= h($user->lname) ?></td>
                <td><?= h($user->fname) ?></td>
                <td><?= h($user->email) ?></td>
                <td><?= h($user->contactno) ?></td>
                <td><?= h($user->user_type) ?></td>

                <td class="actions">
                <?php
                    if ($user->user_type == 'admin') {
                         echo $this->Html->link(__('View Details'), ['action' => 'view', $user->id])."<br>";
                         echo $this->Html->link(__('Edit Details'), ['action' => 'edit', $user->id])."<br>";
                    } else {
                         echo $this->Html->link(__('View Details'), ['action' => 'view', $user->id])."<br>";
                         echo $this->Html->link(__('Edit Details'), ['action' => 'edit', $user->id])."<br>";
                         echo $this->Html->link(__('Edit Client notes'), ['action' => 'clientnotes', $user->id])."<br>";
                         echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)])."<br>";
                    }
                ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        </div>
    </table>

    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <br>
        <?= $this->Paginator->counter() ?>
        <br>
    </div>
</div>
