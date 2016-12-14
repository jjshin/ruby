


<div class="col-md-6 col-md-offset-3">
             <h3>Reset Password</h3>
    <br>
            <?= $this->Form->create(null, [
                'type' => 'post'
            ]) ?>

            <?= $this->Form->input('newpassword', [
                'id' => 'newpassword',
                'type' => 'password',
                'class' => 'form-control',
                'label' => 'New password',
                'placeholder' => 'Please enter new password'
            ]) ?>

            <?= $this->Form->input('confirm_password', [
                'id' => 'confirm_password',
                'type' => 'password',
                'class' => 'form-control',
                'label' => 'Re-enter your password',
                'placeholder' => 'Please re-enter your password'
            ]) ?>
    <br>
</div>
<br>

<?= $this->Flash->render() ?>
<div class="col-md-6 col-md-offset-3">
<?= $this->Form->button('Reset', [
    'id' => 'btnReset',
    'class' => 'btn btn-lg btn-danger btn-block',
]) ?>
<?= $this->Form->end() ?>
    <br>
</div>
<script>
    $('#confirm_password, #newpassword').on('input',function(e){
        var pass = $('#newpassword').val();
        var confirm_password = $('#confirm_password').val();
        var $confirm = $('#confirm_password');

        $confirm.parent('div').removeClass('has-success has-feedback');
        $confirm.parent('div').removeClass('has-error has-feedback');
        $confirm.next().remove();

        console.log(pass + ' ' + confirm_password);
        if (pass !== confirm_password) {
            $confirm.parent('div').addClass('has-error has-feedback');
            $confirm.parent('div').append('<i class="fa fa-times form-control-feedback"></i>');
            $('#btnReset').attr('disabled', true);
        } else {
            $confirm.parent('div').addClass('has-success has-feedback');
            $confirm.parent('div').append('<i class="fa fa-check form-control-feedback"></i>');
            $('#btnReset').removeAttr('disabled');
        }
    });
</script>
