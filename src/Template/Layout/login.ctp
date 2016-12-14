<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ruby's Gifts </title>
    <!-- Core CSS - Include with every page -->
    <?= $this->Html->css('/assets/plugins/bootstrap/bootstrap.css') ?>
    <?= $this->Html->css('/assets/font-awesome/css/font-awesome.css') ?>
    <?= $this->Html->css('/assets/plugins/pace/pace-theme-big-counter.css') ?>
    <?= $this->Html->css('/assets/css/style.css') ?>
    <?= $this->Html->css('/assets/css/main-style.css') ?>
    <?= $this->Html->css('/assets/css/mystyle.css') ?>

    <?= $this->Html->script('/assets/plugins/jquery-1.10.2.js'); ?>

    <?= $this->Html->meta('icon') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>

</head>

<body class="body-Login-back">

<div class="container">

    <div class="row">

        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Check</h3>
                </div>
                <div class="panel-body">
                    <?= $this->fetch('content') ?>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- end wrapper -->
<?= $this->fetch('script') ?>
<!-- Core Scripts - Include with every page -->

<?= $this->Html->script('/assets/plugins/bootstrap/bootstrap.min.js') ?>
<?= $this->Html->script('/assets/plugins/metisMenu/jquery.metisMenu.js') ?>

</body>

</html>
