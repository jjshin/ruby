<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $subcategory->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $subcategory->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Subcategory'), ['action' => 'index', $subcategory->id]) ?></li>
    </ul>
</nav>
<div class="products form large-9 medium-8 columns content">
    <?= $this->Form->create($subcategory) ?>
    <fieldset>
        <legend><?= __('Edit subcategory') ?></legend>
        <?php
			$option=array();
			foreach($category as $cate){
				$option[$cate->id]=$cate->cate_name;
			}
            echo $this->Form->select('category_id', $option);
            echo $this->Form->input('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
