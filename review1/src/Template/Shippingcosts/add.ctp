<div class="col-md-1"></div>
<div class="col-md-10">
    <center>
    <?= $this->Form->create($shippingcosts) ?>
    <fieldset>
        <legend><?= __('Add Shipping Costs') ?></legend>
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
<div class="col-md-1"></div>
