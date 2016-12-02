<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Category'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="products form large-9 medium-8 columns content">
    <?= $this->Form->create($subcategory) ?>
    <fieldset>
        <legend><?= __('Add Category') ?></legend>
        <?php
			$option=array();
			foreach($category as $cate){
				$option[$cate->id]=$cate->cate_name;
			}
            echo $this->Form->select('category_id', $option, array('default'=>$category_id));
            echo $this->Form->input('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
