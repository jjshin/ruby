<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $product->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Products'), ['action' => 'adminIndex']) ?></li>
    </ul>
</nav>
<div class="products form large-9 medium-8 columns content">
    <?= $this->Form->create($product) ?>
    <fieldset>
        <legend><?= __('Edit Product') ?></legend>
        <?php
			$option=array();
			foreach($subcategory as $cate){
				$option[$cate->id]=$cate->name;
			}
            echo $this->Form->input('subcategory_id', [
              'type' => 'select',
              'options' => $option,
              'class' => 'form-control'
            ]);
            echo $this->Form->input('name', ['class' => 'form-control']);
            echo $this->Form->input('descript', ['class' => 'form-control']);
            echo $this->Form->input('ship');
            echo $this->Form->input('qty', ['class' => 'form-control', 'min'=>0]);
            echo $this->Form->input('price', ['id'=>'price', 'class' => 'form-control', 'min'=>'0.00', 'step'=>'0.01']);
            //echo $this->Form->input('image');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<script>
$(document).ready(function(){
  $('#price').on('change', function(e){
    $(this).val(parseFloat($(this).val()).toFixed(2));
  });
});
</script>
