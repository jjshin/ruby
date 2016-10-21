<div class="registration-form form-wrapper">
	<h2><?= __('Registeration') ?></h2>

    <?= $this->Form->create($user, ['class' => 'form-group']) ?>
    <?php
        echo $this->Form->input('firstname', ['class' => 'form-control']);
        echo $this->Form->input('lastname', ['class' => 'form-control']);
        //echo $this->Form->input('username', ['class' => 'form-control']);
        echo $this->Form->input('password', ['class' => 'form-control']);
        echo $this->Form->input('email', ['class' => 'form-control']);
        echo $this->Form->input('phone', ['class' => 'form-control']);

        echo $this->Form->input('address1', ['class' => 'form-control']);
        echo $this->Form->input('address2', ['class' => 'form-control']);
        echo $this->Form->input('suburb', ['class' => 'form-control']);
        echo $this->Form->input('state', ['class' => 'form-control']);
        echo $this->Form->input('postcode', ['class' => 'form-control']);

        echo $this->Form->input('subscribe', ['type'=>'checkbox', 'value'=>1, 'label'=>'I would like to receive emails about special promos and offers from Ruby\'s Gifts.']);
    ?>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info']) ?>
    <?= $this->Form->end() ?>
</div>
