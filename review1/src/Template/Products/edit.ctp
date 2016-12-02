<br>
<div class="col-md-6">
    <?= $this->Form->create($product) ?>
        <legend><?= __('Edit Product') ?></legend>
        <?php
            echo $this->Form->input('name', array('style'=>'width:310px;'));
            echo $this->Form->input('desc', array('type'=>'textarea', 'style'=>'width:310px;'));
            echo $this->Form->input('price', array('type'=>'decimal', 'style'=>'width:310px;'));
            echo $this->Form->input('weight', array('style'=>'width:310px;'));
            echo $this->Form->input('brand_id');
            echo "Restricted product? ".$this->Form->checkbox('restricted')."<br>";
        ?>
</div>

<div class="col-md-6">
        <br>
        <br>
        <?php echo $this->Form->input('categories._ids', ['options' => $categories]); ?>
        Recipes
        <?php echo $this->Form->textarea('recipes', array('label'=>'Recipes','class'=> 'ckeditor', 'style'=>'width:500px; height:519px;')); ?>
        <br>
        <br>
        <?= $this->Form->button(__('Submit')) ?>
        <?= $this->Form->end() ?>
        <br>
</div>


