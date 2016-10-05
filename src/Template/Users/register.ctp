<div class="registration-form form-wrapper">
	<h2><?= __('Registeration') ?></h2>
	<?= $this->Flash->render() ?>
    <?= $this->Form->create($user, ['class' => 'form-group']) ?>
    <?php
        echo $this->Form->input('firstname', ['class' => 'form-control']);
        echo $this->Form->input('lastname', ['class' => 'form-control']);
        echo $this->Form->input('username', ['class' => 'form-control']);
        echo $this->Form->input('password', ['class' => 'form-control']);
        echo $this->Form->input('email', ['class' => 'form-control']);
        echo $this->Form->input('phone', ['class' => 'form-control']);
    ?>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info']) ?>
    <?= $this->Form->end() ?>
</div>
