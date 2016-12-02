<!-- Menu that the staff see once logged in -->

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
          <li><?= $this->Html->link('Shopfront', ['controller' => 'pages']); ?></li>
          <li class="dropdown">
            <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Inventory <span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li class="dropdown-header">Inventory Management</li>
                    <li><?= $this->Html->link(__('View All Inventory'), ['controller' => 'products', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('View All Brands'), ['controller' => 'brands', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('View All Categories'), ['controller' => 'categories', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('Add Item'), ['controller' => 'products', 'action' => 'add']) ?></li>
                    <li><?= $this->Html->link(__('Add Brand'), ['controller' => 'brands', 'action' => 'add']) ?></li>
                    <li><?= $this->Html->link(__('Add Category'), ['controller' => 'categories', 'action' => 'add']) ?></li>
                <li role="separator" class="divider"></li>
            </ul>
          </li>
          <li class='dropdown'>
            <a href='' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>Settings <span class='caret'></span></a>
            <ul class='dropdown-menu'>
                <li class='dropdown-header'>User Management</li>
                    <li><?= $this->Html->link(__('Change My Password'), ['controller' => 'users', 'action' => 'changepassword']) ?></li>
            </ul>
          </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
           <li><?= $this->Html->link(__('Account'), ['controller' => 'users', 'action' => 'staff']); ?></li>
           <?php if($loggedIn) : ?>
            <li><?= $this->Html->link('Logout', ['controller' => 'users', 'action' => 'logout']); ?></li>
           <?php else : ?>
            <li><?= $this->Html->link('Register', ['controller' => 'users', 'action' => 'register']); ?></li>
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
