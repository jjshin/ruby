<h3>Submenu</h3>
<div class="admin-submenu"><?= $this->Html->link(__('Add New User'), ['action' => 'add'], ['class' => 'btn btn-warning']) ?></div>
<h3><?= __('Users') ?></h3>
<div>
  <nav>
    <ul>
      <li><?= $this->Html->link('Users', ['action'=>'index', 10]);?></li>
      <li><?= $this->Html->link('Admins', ['action'=>'index', 1]);?></li>
    </ul>
</div>
<div class="users-table">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('firstname') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lastname') ?></th>
                <?php /*<th scope="col"><?= $this->Paginator->sort('username') ?></th>*/?>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('phone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('role') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $this->Number->format($user->id) ?></td>
                <td><?= h($user->firstname) ?></td>
                <td><?= h($user->lastname) ?></td>
                <?php /*<td><?= h($user->username) ?></td>*/?>
                <td><?= h($user->email) ?></td>
                <td><?= h($user->phone) ?></td>
                <td><?= h($user->role == 1 ? 'Admin' : 'Customer') ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
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
