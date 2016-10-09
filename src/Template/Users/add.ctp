<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="add-user-form from-wrapper">
    <?= $this->Form->create($user, ['class' => 'form-group']) ?>
	<h3><?= __('Add User') ?></h3>
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
