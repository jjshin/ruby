    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <?= $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'); ?>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <?= $this->Html->script('bootstrap.min.js'); ?>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        Medicinal Organics: Welcome.
    </title>

    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->css('megamenu.css'); ?>
    <?= $this->CKEditor->loadJs(); ?>

    <!-- Bootstrap -->
    <?= $this->Html->css('bootstrap.css'); ?>


    <!-- Main style sheet -->
    <?= $this->Html->css('style.css'); ?>


    <!-- Google Font -->
    <?= $this->Html->css('http://fonts.googleapis.com/css?family=Montserrat|Raleway:400,200,300,500,600,700,800,900,100'); ?>
    <?= $this->Html->css('http://fonts.googleapis.com/css?family=Playfair+Display:400,700,900'); ?>
    <?= $this->Html->css('http://fonts.googleapis.com/css?family=Aladin'); ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
