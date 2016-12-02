<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Supplier'), ['action' => 'edit', $supplier->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Supplier'), ['action' => 'delete', $supplier->id], ['confirm' => __('Are you sure you want to delete # {0}?', $supplier->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Suppliers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Supplier'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="suppliers view large-9 medium-8 columns content">
    <h3><?= h($supplier->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($supplier->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($supplier->id) ?></td>
        </tr>
    </table>
</div>
