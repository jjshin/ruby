<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $category->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $category->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Category'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="products form large-9 medium-8 columns content">
    <?= $this->Form->create($category) ?>
    <fieldset>
        <legend><?= __('Edit category') ?></legend>
        <?php
            echo $this->Form->input('cate_name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>