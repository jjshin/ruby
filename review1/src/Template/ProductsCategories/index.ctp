<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Inventory Management') ?></li>
        <p>
        <li><?= $this->Html->link(__('Home'), ['controller' => 'users', 'action' => 'admin']) ?></li>
        <p>
        <li class="heading"> Add </li>
        <li><?= $this->Html->link(__('New item'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
        <p>
        <li class="heading"> View/Edit </li>
        <li><?= $this->Html->link(__('View/Edit Items'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('View Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="productsCategories index large-9 medium-8 columns content">
    <h3><?= __('Products Categories') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('category_id') ?></th>
                <th><?= $this->Paginator->sort('product_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productsCategories as $productsCategory): ?>
            <tr>
                <td><?= $productsCategory->has('category') ? $this->Html->link($productsCategory->category->name, ['controller' => 'Categories', 'action' => 'view', $productsCategory->category->id]) : '' ?></td>
                <td><?= $productsCategory->has('product') ? $this->Html->link($productsCategory->product->name, ['controller' => 'Products', 'action' => 'view', $productsCategory->product->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $productsCategory->category_id])"<br>"?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $productsCategory->category_id])"<br>"?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $productsCategory->category_id], ['confirm' => __('Are you sure you want to delete # {0}?', $productsCategory->category_id)])"<br>"?>
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
        <br><?= $this->Paginator->counter() ?>
    </div>
</div>
