<h3>Submenu</h3>
<div class="admin-submenu"><?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'btn btn-warning']) ?></div>
<h3 class="form-title"><?= __('Add User') ?></h3>
<div class="add-user-form half-row">
    <?= $this->Form->create($user, ['class' => 'form-group']) ?>
    <fieldset>
        <?php
            echo $this->Form->input('firstname', ['class' => 'form-control']);
            echo $this->Form->input('lastname', ['class' => 'form-control']);
            echo $this->Form->input('username', ['class' => 'form-control']);
            echo $this->Form->input('password', ['class' => 'form-control']);
            echo $this->Form->input('email', ['class' => 'form-control']);
            echo $this->Form->input('phone', ['class' => 'form-control']);
			echo $this->Form->input('userRole', [
				'type' => 'select',
				'options' => [1=>'Admin', 10=>'User'],
				'empty' => 'Select User Role',
				'class' => 'form-control required'
			]);
		?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info']) ?>
    <?= $this->Form->end() ?>
</div>
