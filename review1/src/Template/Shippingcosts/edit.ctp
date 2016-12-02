
<div class="Shippingcosts form large-9 medium-8 columns content">
    <?= $this->Form->create($shippingcosts) ?>
    <fieldset>
        <legend><?= __('Edit Shipping Cost') ?></legend>
        <?php
            echo $this->Form->input('from_weight');
            echo $this->Form->input('to_weight');
            echo $this->Form->input('price');
        ?>
    </fieldset>
    <br>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
