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
            <td><?= $enquire->Users ? $this->Html->link($enquire->Users['email'], ['controller' => 'Users', 'action' => 'view', $enquire->Users['id']]) : $enquire->email; ?></td>
        </tr>
        <tr>
            <th><?= __('Product') ?></th>
            <td><?= $enquire->Products  ? $this->Html->link($enquire->Products['name'], ['controller' => 'Products', 'action' => 'view', $enquire->Products['id']]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($enquire->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($enquire->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Phone') ?></th>
            <td><?= h($enquire->phone) ?></td>
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
