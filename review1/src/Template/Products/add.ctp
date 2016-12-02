<div class="col-md-6">
    <?= $this->Form->create($product, array('type'=>'file')) ?>
        <legend><?= __('Add New Product') ?></legend>
        <?php
            echo $this->Form->input('name', array('label' => 'Product Name:', 'style'=>'width:300px;'));
            echo $this->Form->input('desc', array('label' => 'Description of Product:', 'type' => 'textarea' ,'style'=>'width:300px; height:100px;'));
            echo $this->Form->input('price', array('type' =>'decimal', 'label' => 'Price:',  'style'=>'width:300px;'));
            echo $this->Form->input('qty', array('label' => 'Quantity:',  'style'=>'width:300px;'));
            echo $this->Form->input('weight', array('label' => 'Weight (in grams):',  'style'=>'width:300px;'));
            echo "Restricted product? ".$this->Form->checkbox('restricted')."<br>";
            echo $this->Form->input('image', array('type' => 'file', 'multiple' => 'true'));
            echo $this->Form->input('image_dir', ['type' => 'hidden']);
            echo $this->Form->input('brand_id', array('label' => 'Brand:'))."<br>";


        ?>
</div>

<div class="col-md-6">
        <br>
        <br>
        <?php
            echo $this->Form->input('categories._ids', array('label' => 'Category: (ctrl + click to select multiple)', ['options' => $categories]))."<br>";
            echo $this->CKEditor->loadJs();
            echo $this->Form->input('Recipes', array('style'=>'width:500px; height:570px;'));
            echo $this->CKEditor->replace('Recipes');
        ?>
        <br>
        <?= $this->Form->button(__('Submit')) ?>
        <?= $this->Form->end() ?>
</div>

