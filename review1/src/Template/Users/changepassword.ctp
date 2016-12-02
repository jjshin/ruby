<div class="col-md-1"></div>
<div class="col-md-10">
    <br>
    <center>
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Change your password') ?></legend>
        <br>
        <p>Please enter your old password
        <br>
        <br>
        <?php
            echo $this->Form->input('old_password',['type' => 'password' , 'label'=>'Old password']);
            echo $this->Form->input('password1',['type'=>'password' ,'label'=>'New Password']);
            echo $this->Form->input('password2',['type' => 'password' , 'label'=>'Repeat New Password']);

        ?>
    </fieldset>
    <br>

    <?= $this->Form->button(__('Submit')) ?>
    </center>
</div>
<div class="col-md-1"></div>
