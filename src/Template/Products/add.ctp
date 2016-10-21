<h3>Submenu</h3>
<div class="admin-submenu"><?= $this->Html->link(__('List Products'), ['action' => 'adminIndex'], ['class' => 'btn btn-warning']) ?></div>
<h3 class="form-title"><?= __('Add Product') ?></h3>
<div class="products-form half-row">
    <?= $this->Form->create($product, ['type'=>'file', 'class' => 'form-group']) ?>
    <fieldset>
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
            echo $this->Form->file('image', ['class' => 'form-control']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info']) ?>
    <?= $this->Form->end() ?>
</div>

<script>
$(document).ready(function(){
  $('#price').on('change', function(e){
    $(this).val(parseFloat($(this).val()).toFixed(2));
  });
});
</script>
