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

<div class="productsCategories form large-9 medium-8 columns content">
    <?= $this->Form->create($productsCategory) ?>
    <fieldset>
        <legend><?= __('Add Products Category') ?></legend>
        <?php
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
