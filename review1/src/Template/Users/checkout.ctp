
		 <ol class="breadcrumb">
		  <li><?= $this->Html->link('Home', ['controller' => 'pages','action' => 'home']); ?></li>
		  <li class="active">Login</li>
		 </ol>

		 <div class="col-md-6 log">
		    <h2>Login</h2>
		    <br>
			<p>Welcome, please enter the following to continue.</p>
                <?= $this->Form->create(); ?>
	            <form>
				     <h5>Email:</h5>
				   	 <?= $this->Form->input('email', array('label'=>false));  ?>
				   	 <br>
					 <h5>Password:</h5>
					 <?= $this->Form->input('password', array('type' => 'password', 'label'=>false));  ?>
					 <?= $this->Form->submit('Login', array('class' => 'button')); ?>
				 </form>
                <?= $this->Form->end(); ?>
		 </div>
         <br>
		 <div class="col-md-6 login-right">
		    <h2>New Registration</h2>
			  	<br>
				<p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
			<?= $this->Html->link('Register Now', ['controller' => 'users', 'action' => 'register']); ?>
            <br>
            <br>
            <br>
            <h3><?= $this->Html->link('Or checkout as a guest', ['controller' => 'orders', 'action' => 'checkoutguest']);?></h3>
		 </div>


		 <div class="clearfix"></div>


