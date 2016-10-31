<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Enquire'), ['action' => 'edit', $enquire->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Enquire'), ['action' => 'delete', $enquire->id], ['confirm' => __('Are you sure you want to delete # {0}?', $enquire->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Enquires'), ['action' => 'index']) ?> </li>
    </ul>
</nav>
<div class="enquires view large-9 medium-8 columns content">
    <h3><?= h($enquire->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $enquire->has('user') ? $this->Html->link($enquire->user->id, ['controller' => 'Users', 'action' => 'view', $enquire->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Product') ?></th>
            <td><?= $enquire->has('product') ? $this->Html->link($enquire->product->name, ['controller' => 'Products', 'action' => 'view', $enquire->product->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($enquire->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($enquire->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($enquire->created) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Content') ?></h4>
        <?= $this->Text->autoParagraph(h($enquire->content)); ?>
    </div>
</div>
