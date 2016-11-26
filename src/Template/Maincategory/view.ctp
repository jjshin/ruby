<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Maincategory'), ['action' => 'edit', $maincategory->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Maincategory'), ['action' => 'delete', $maincategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $maincategory->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Maincategory'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Maincategory'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Category'), ['controller' => 'Category', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Category', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="maincategory view large-9 medium-8 columns content">
    <h3><?= h($maincategory->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($maincategory->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($maincategory->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Category') ?></h4>
        <?php if (!empty($maincategory->category)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Cate Name') ?></th>
                <th><?= __('Maincategory Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($maincategory->category as $category): ?>
            <tr>
                <td><?= h($category->id) ?></td>
                <td><?= h($category->cate_name) ?></td>
                <td><?= h($category->maincategory_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Category', 'action' => 'view', $category->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Category', 'action' => 'edit', $category->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Category', 'action' => 'delete', $category->id], ['confirm' => __('Are you sure you want to delete # {0}?', $category->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
