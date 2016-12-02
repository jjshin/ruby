
<div class="enquires form large-9 medium-8 columns content">
    <?= $this->Form->create($enquire) ?>
    <fieldset>
        <legend><?= __('Edit Enquire') ?></legend>
        <?php
            echo $this->Form->input('users_id', ['options' => $users]);
            echo $this->Form->input('products_id', ['options' => $products, 'empty' => true]);
            echo $this->Form->input('title');
            echo $this->Form->input('content');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
