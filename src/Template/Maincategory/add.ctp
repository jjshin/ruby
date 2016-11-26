<div class="maincategory form large-9 medium-8 columns content">
    <?= $this->Form->create($maincategory) ?>
    <fieldset>
        <legend><?= __('Add Maincategory') ?></legend>
        <?php
            echo $this->Form->input('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
