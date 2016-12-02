<div class="col-md-1"></div>
<div class="col-md-10">
    <center>
    <?= $this->Form->create($category) ?>
    <fieldset>
        <legend><?= __('Add Category') ?></legend>
        <?php
            echo $this->Form->input('name');
        ?>
    </fieldset>
    <br>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
    </center>
</div>

<div class="col-md-1"></div>

