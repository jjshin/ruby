
<div class="userShipping form large-9 medium-8 columns content">
    <?= $this->Form->create($userShipping) ?>
    <fieldset>
        <legend><?= __('Add User Shipping') ?></legend>
        <?php
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('shipping_address1');
            echo $this->Form->input('shipping_address2');
            echo $this->Form->input('shipping_suburb');
            echo $this->Form->input('shipping_state');
            echo $this->Form->input('shipping_pcode');
            echo $this->Form->input('shipping_country_id', ['options' => $countries, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
