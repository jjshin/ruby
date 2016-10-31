<div class="enquires form large-9 medium-8 columns content">
    <?= $this->Form->create($enquire) ?>
    <fieldset>
        <legend><?= __('Enquire') ?></legend>
        <?php
            echo $this->Form->hidden('products_id');
            echo $this->Form->input('title');
            echo $this->Form->input('content');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
