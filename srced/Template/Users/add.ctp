<h3>Add New Admin Account</h3>
<div class="admin-submenu"><?= $this->Html->link(__('Go Back'), ['action' => 'index'], ['class' => 'btn btn-warning']) ?></div>
<h3 class="form-title"><?= __('Account Details') ?></h3>
<div class="add-user-form half-row">
    <?= $this->Form->create($user, ['class' => 'form-group']) ?>
    <fieldset>
        <?php
            echo $this->Form->input('firstname', ['class' => 'form-control']);
            echo $this->Form->input('lastname', ['class' => 'form-control']);
            echo $this->Form->input('email', ['class' => 'form-control']);
            echo $this->Form->input('password', ['class' => 'form-control']);
			      echo $this->Form->input('role', [
				          'type' => 'select',
				'options' => [1=>'Admin'],
				'class' => 'form-control required'
			]);

      // echo $this->Form->input('address1', ['class' => 'form-control']);
      // echo $this->Form->input('address2', ['class' => 'form-control']);
      // echo $this->Form->input('suburb', ['class' => 'form-control']);
      // echo $this->Form->input('state', ['class' => 'form-control']);
      // echo $this->Form->input('postcode', ['class' => 'form-control']);
      //
      // echo $this->Form->input('subscribe', ['type'=>'checkbox', 'value'=>1, 'label'=>'I would like to receive emails about special promos and offers from Ruby\'s Gifts.']);
		?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info']) ?>
    <?= $this->Form->end() ?>

</div>
