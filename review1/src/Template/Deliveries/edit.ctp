<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $delivery->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $delivery->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Deliveries'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="deliveries form large-9 medium-8 columns content">
    <?= $this->Form->create($delivery) ?>
    <fieldset>
        <legend><?= __('Edit Delivery') ?></legend>
        <?php
            echo $this->Form->input('first_name');
            echo $this->Form->input('last_name');
            echo $this->Form->input('email');
            echo $this->Form->input('address1');
            echo $this->Form->input('address2');
            echo $this->Form->input('city');
            echo $this->Form->input('country');
            echo $this->Form->input('state');
            echo $this->Form->input('zip');
            echo $this->Form->input('contact_no');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
