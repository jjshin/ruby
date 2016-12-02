<!-- Details all CSS/JS scripts -->

    <title>
        Medicinal Melbourne
    </title>

    <!-- JQUERY (ALWAYS BEFORE BOOTSTRAP)-->
    <?= $this->Html->script('jquery-3.1.0.min.js'); ?>

    <!-- BOOTSTRAP -->
    <?= $this->Html->css('bootstrap.css'); ?>
    <?= $this->Html->css('bootstrap.min.css'); ?>
    <?= $this->Html->script('bootstrap.min.js'); ?>

    <!-- MAIN THEME -->
    <?= $this->Html->css('style.css'); ?>

    <!-- START MENU -->
    <?= $this->Html->css('megamenu.css'); ?>
        <?= $this->Html->script('megamenu.js'); ?>
        <script>
            $(document).ready(function(){$(".megamenu").megamenu();});
        </script>
        <?= $this->Html->script('menu_jquery.js'); ?>
        <?= $this->Html->script('shop.js'); ?>
        <?= $this->Html->script('simpleCart.min.js') ?>
    <!-- MISC -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <?= $this->Html->meta('Medicinal Organics, Melbourne',
        'Medicinal Melbourne, Organics, Herbs, Healing,
            Healthy, Superfoods, Healing, Chinese Medicine, Vegan, Nutritional Advice'); ?>
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <?= $this->Html->css('http://fonts.googleapis.com/css?family=Montserrat|Raleway:400,200,300,500,600,700,800,900,100'); ?>
    <?= $this->Html->css('http://fonts.googleapis.com/css?family=Playfair+Display:400,700,900'); ?>
    <?= $this->Html->css('http://fonts.googleapis.com/css?family=Aladin'); ?>
