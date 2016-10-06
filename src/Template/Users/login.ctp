<div class="login-register-container">
    <div class="login-form form-wrapper">
        <h2>Login</h2>
        
        <?= $this->Form->create(null, ['class' => 'form-group']) ?>
        <?= $this->Form->input('username', ['class' => 'form-control']) ?>
        <?= $this->Form->input('password', ['class' => 'form-control']) ?>
        <?= $this->Form->button('Login', ['class' => 'btn btn-info']) ?>
        <?= $this->Form->end() ?>
    </div>
    <div class="registration-form form-wrapper">
        <h2>Register</h2>
        <p> Faster Shop and Be up to date on an order status.</P>
        <p> *By creating an account you agree to our Terms of Use and Privacy Policy.</P>
		<?= $this->Html->link('Register', ['controller'=>'Users', 'action'=>'register'], ['class'=>'btn btn-warning']);?>
    </div>
</div>
