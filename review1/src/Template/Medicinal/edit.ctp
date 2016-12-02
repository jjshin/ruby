<div class="col-md-1"></div>
<div class="col-md-10">
    <center>
    <?= $this->Form->create($medicinal) ?>
    <fieldset>
        <legend><?= "Edit ".h($medicinal->name) ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->textarea('desc', array('class'=> 'ckeditor', 'style'=>'width:500px; height:519px;'));
        ?>
    </fieldset>
    <br>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
    </center>
</div>
<div class="col-md-1"></div>
