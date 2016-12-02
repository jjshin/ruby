<!-- Menu that the members see once logged in -->

<!DOCTYPE html>
<html>
<head>
    <?= $this->element('headinternalmenu') ?>
</head>
<body>

  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand">MEDICINAL ORGANICS</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li><?= $this->Html->link('Shop', ['controller' => 'pages']); ?></li>
          <li class='dropdown'>
            <a href='' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>My Account <span class='caret'></span></a>
                <ul class='dropdown-menu'>
                    <li class='dropdown-header'>My Account</li>
                        <li><?= $this->Html->link(__('Home'), ['controller' => 'users', 'action' => 'index']) ?></li>
                        <li><?= $this->Html->link(__('View Current Details'), ['controller' => 'users', 'action' => 'myaccount']) ?></li>
                        <li><?= $this->Html->link(__('Update Details'), ['controller' => 'users', 'action' => 'updatedetails']) ?></li>
                        <li><?= $this->Html->link(__('Change My Password'), ['controller' => 'users', 'action' => 'changepassword']) ?></li>
                </ul>
          </li>
          <li class='dropdown'>
            <a href='' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>My Orders <span class='caret'></span></a>
                <ul class='dropdown-menu'>
                    <li class='dropdown-header'> My Orders</li>
                        <li><?= $this->Html->link('View My Orders', ['controller' => 'orders', 'action' => 'myorders']); ?></li>
                </ul>
          </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
           <li><?= $this->Html->link('Account', ['controller' => 'users', 'action' => 'index']); ?>
                     </li>
          <?php if($loggedIn) : ?>
            <li><?= $this->Html->link('Logout', ['controller' => 'users', 'action' => 'logout']); ?>
            </li>
          <?php else : ?>
            <li><?= $this->Html->link('Register', ['controller' => 'users', 'action' => 'register']); ?>
            </li>
          <?php endif; ?>
        </ul>
      </div><!--/.nav-collapse -->
    </div><!--/.container-fluid -->
  </nav>
    <?= $this->Flash->render() ?>
    <div class="container ">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>