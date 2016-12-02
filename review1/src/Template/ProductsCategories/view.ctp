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
<div class="productsCategories view large-9 medium-8 columns content">
    <h3><?= h($productsCategory->category_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Category') ?></th>
            <td><?= $productsCategory->has('category') ? $this->Html->link($productsCategory->category->name, ['controller' => 'Categories', 'action' => 'view', $productsCategory->category->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Product') ?></th>
            <td><?= $productsCategory->has('product') ? $this->Html->link($productsCategory->product->name, ['controller' => 'Products', 'action' => 'view', $productsCategory->product->id]) : '' ?></td>
        </tr>
    </table>
</div>
