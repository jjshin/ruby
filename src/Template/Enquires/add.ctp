
<div class="enquires form large-9 medium-8 columns content">
    <?= $this->Form->create($enquire) ?>

    <fieldset>
        <legend><?= __('Enquire') ?></legend>
        <?php
            echo $this->Form->hidden('products_id', ['class' => 'form-control']);
            echo $this->Form->input('title', ['class' => 'form-control']);
            echo $this->Form->input('name', ['class' => 'form-control']);
            echo $this->Form->input('phone',['class' => 'form-control']);

            echo $this->Form->input('email', ['class' => 'form-control']);
            echo $this->Form->input('content', ['class' => 'form-control']);
        ?>
    </fieldset>

    <?= $this->Form->button(__('Submit'), ['class' => 'form-control']) ?>
    <?= $this->Form->end() ?>
</div>

<?php



?>
