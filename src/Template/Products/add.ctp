<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Products'), ['action' => 'adminIndex']) ?></li>
    </ul>
</nav>
<div class="products form large-9 medium-8 columns content">
    <?= $this->Form->create($product, ['type'=>'file']) ?>
    <fieldset>
        <legend><?= __('Add Product') ?></legend>
        <?php
			$option=array();
			foreach($subcategory as $cate){
				$option[$cate->id]=$cate->name;
			}
            echo $this->Form->select('subcategory_id', $option);
            echo $this->Form->input('name');
            echo $this->Form->input('descript');
            echo $this->Form->input('ship');
            echo $this->Form->input('qty');
            echo $this->Form->input('price');
            echo $this->Form->file('image');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
