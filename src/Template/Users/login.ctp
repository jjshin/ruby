<div class="col-md-6 col-md-offset-3">
    <div class="col-sm-6 text-center">
        <div class="login-form form-wrapper">
            <h2>Login</h2>

            <?= $this->Form->create(null, ['class' => 'form-group']) ?>
            <?= $this->Form->input('email', ['class' => 'form-control']) ?>
            <?= $this->Form->input('password', ['class' => 'form-control']) ?>
            <a id="btnForgot" href="#">Forgot password? CLICK HERE</a>
            <?= $this->Form->button('Login', ['class' => 'btn btn-info']) ?>
<!--            <a id="btnForgot" href="#">Forgot password? CLICK HERE</a>-->
<!---->
            <?= $this->Form->create(null, [
                'url' => ['controller' => 'Users', 'action' => 'forgotPassword'],
                'type' => 'post'
            ]) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>

    <div class="col-sm-6 text-center">
        <div class="registration-form form-wrapper col-md-6">
            <h2>Register</h2>
            <p> Faster Shop and Be up to date on an order status.</P>
            <br>
            <p> *By creating an account you agree to our Terms of Use and Privacy Policy.</P>

    		<?= $this->Html->link('Register', ['controller'=>'Users', 'action'=>'register'], ['class'=>'btn btn-warning']);?>
        </div>
    </div>

    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><?= __('Please enter your Login Email') ?></h4>
                </div>
                <div class="modal-body">
                    <!--Form start-->
                    <?= $this->Form->create(null, [
                        'url' => ['controller' => 'Users', 'action' => 'forgotPassword'],
                        'type' => 'post'
                    ]) ?>
                    <fieldset>
                        <?php
                        echo $this->Form->input('email', [
                            'class' => 'form-control'
                        ]);
                        ?>
                    </fieldset>

                    <?= $this->Form->button(__('Submit'), [
                        'class' => 'btn btn-warning btn-lg center-block',
                        'style' => 'margin-top: 30px;'
                    ]) ?>
                    <?= $this->Form->end() ?> <!--End of form-->

                    <!-- Show photo -->

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    <script>
        $(document).ready(function(){
            $('#btnForgot').click(function (e) {
                e.preventDefault();
                alert('reset click');
                $('#myModal').modal();
            });
        });
    </script>
</div>
