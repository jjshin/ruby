<div class="col-md-1"></div>
<div class="col-md-10">
    <center>
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Edit Client notes') ?></legend>
        <?php
            echo $this->Form->textarea('notes', array('class'=> 'ckeditor', 'style'=>'width:500px; height:519px;'));
        ?>
    </fieldset>

    <br>
    <?= $this->Form->button(__('Submit')) ?>
    </center>
</div>
<div class="col-md-1"></div>
