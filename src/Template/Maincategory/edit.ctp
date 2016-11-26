<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $maincategory->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $maincategory->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Maincategory'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Category'), ['controller' => 'Category', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Category', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="maincategory form large-9 medium-8 columns content">
    <?= $this->Form->create($maincategory) ?>
    <fieldset>
        <legend><?= __('Edit Maincategory') ?></legend>
        <?php
            echo $this->Form->input('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
