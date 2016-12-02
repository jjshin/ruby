<div class="col-md-1"></div>
<div class="col-md-10">
    <?= $this->Form->create($medicinal) ?>
    <fieldset>
        <legend><?= __('Add Entry') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('desc');
        ?>
    </fieldset>
    <br>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
<div class="col-md-1"></div>
