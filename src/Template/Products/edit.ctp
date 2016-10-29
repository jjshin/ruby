<h3>Submenu</h3>
<div class="admin-submenu"><?= $this->Html->link(__('List Products'), ['action' => 'adminIndex'], ['class' => 'btn btn-warning']) ?></div>
<h3 class="form-title"><?= __('Add Product') ?></h3>
<div class="products-form half-row">
    <?= $this->Form->create($product, ['type'=>'file', 'class' => 'form-group']) ?>
    <fieldset>
      <?php
            echo $this->Form->input('subcategory_id', ['options' => $subcategory, 'class' => 'form-control']);
            echo $this->Form->input('suppliers_id', ['options' => $suppliers, 'class' => 'form-control']);
            echo $this->Form->input('brands_id', ['options' => $brands, 'class' => 'form-control']);
            echo $this->Form->input('name', ['class' => 'form-control']);
            echo $this->Form->input('qty', ['class' => 'form-control', 'min'=>0]);

            $options=array(1=>'Add Cart', 2=>'Enquire');
            echo $this->Form->input('status', ['options'=>$options, 'class' => 'form-control']);

            echo $this->Form->input('sku', ['class' => 'form-control']);
            echo $this->Form->input('short_desc', ['class' => 'form-control']);
            echo $this->Form->input('long_desc', ['class' => 'form-control']);
            echo $this->Form->input('retail_price', ['class' => 'form-control price', 'min'=>'0.00', 'step'=>'0.01']);
            echo $this->Form->input('cost_price', ['class' => 'form-control price', 'min'=>'0.00', 'step'=>'0.01']);
            echo $this->Form->input('sale_price', ['class' => 'form-control price', 'min'=>'0.00', 'step'=>'0.01']);
            echo $this->Form->input('size', ['class' => 'form-control']);
            echo $this->Form->input('sizeunit', ['class' => 'form-control']);
            echo $this->Form->input('weight', ['class' => 'form-control']);
            echo $this->Form->input('weightunit', ['class' => 'form-control']);
            echo $this->Form->input('height', ['class' => 'form-control']);
            echo $this->Form->input('heightunit', ['class' => 'form-control']);
            echo $this->Form->input('width', ['class' => 'form-control']);
            echo $this->Form->input('widthunit', ['class' => 'form-control']);
            echo $this->Form->input('length', ['class' => 'form-control']);
            echo $this->Form->input('lengthunit', ['class' => 'form-control']);
            echo $this->Form->file('image', ['class' => 'form-control']);
            echo $this->Form->file('image2', ['class' => 'form-control']);
            echo $this->Form->file('image3', ['class' => 'form-control']);
            echo $this->Form->file('image4', ['class' => 'form-control']);
            echo $this->Form->file('image5', ['class' => 'form-control']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info']) ?>
    <?= $this->Form->end() ?>
</div>

<script>
$(document).ready(function(){
  $('.price').on('change', function(e){
    $(this).val(parseFloat($(this).val()).toFixed(2));
  });
});
</script>
