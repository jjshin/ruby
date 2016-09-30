<div class="login-form form-wrapper">
    <h2>Login</h2>
    <?= $this->Flash->render('auth') ?>
    <?= $this->Form->create(null, ['class' => 'form-group']) ?>
    <?= $this->Form->input('username', ['class' => 'form-control']) ?>
    <?= $this->Form->input('password', ['class' => 'form-control']) ?>
    <?= $this->Form->button('Login', ['class' => 'btn btn-info']) ?>
    <?= $this->Form->end() ?>
</div>
<div class="registration-form form-wrapper">
    <h2>Register</h2>
    <form method="post" class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" class="form-control">
        <label for="password">Password</label>
        <input type="text" name="passworld" class="form-control">
        <button type="button" name="button" class="btn btn-warning">Register</button>
    </form>
</div>
