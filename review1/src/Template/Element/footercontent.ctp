<!-- Details all the links at the bottom of the shopfront -->

 <div class="container">
		 <div class="ftr-grids">
			 <div class="col-md-3 ftr-grid">
				<h4>About Us</h4>
				<ul>
			        <li><?= $this->Html->link('Who we are', ['controller' => 'medicinal', 'action' => 'about']); ?></li>
					<li><a href="http://risewellness.com.au/">Our Blog</a></li>
					<li><?= $this->Html->link('Contact Us', ['controller' => 'medicinal', 'action' => 'contact']); ?></li>
				</ul>
			 </div>
			 <div class="col-md-3 ftr-grid">
				<h4>Customer service</h4>
				<ul>
                    <li><?= $this->Html->link('Shipping and Returns', ['controller' => 'medicinal', 'action' => 'shippingpolicies']); ?></li>
				    <li><?= $this->Html->link('Terms and Conditions', ['controller' => 'medicinal', 'action' => 'termsconditions']); ?></li>
				    <li><?= $this->Html->link('Security and Privacy', ['controller' => 'medicinal', 'action' => 'securityprivacy']); ?></li>
				</ul>
			 </div>
			 <div class="col-md-3 ftr-grid">
				<h4>Your account</h4>
				<ul>
                    <li><?= $this->Html->link('Register', ['controller' => 'users', 'action' => 'register']); ?></li>
                    <li><?= $this->Html->link('Login', ['controller' => 'users', 'action' => 'login']); ?></li>
				</ul>
			 </div>
			 <div class="clearfix"></div>
		 </div>
</div>