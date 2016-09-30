<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('default.css') ?>
    <?= $this->Html->css('fonts.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <?= $this->Html->css('custom.css') ?>
</head>
<body>
    <div id="logo" class="container">
        <a href="#"><img src="/img/logo.png"></a>
        <div class="login">
            <a class="btn btn-info" href="/users/login" role="button">Login</a>
        </div>
    </div>
    <div id="header">
        <div id="menu" class="container">
            <ul class="dropdown">
                <li><a class="direct-link">Home</a></li>
                <li>
                    <a type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">For Her <span class="caret"></span></a>
                        <ul class="dropdown-menu" aria-labelledby="dLabel">
                            <li><a href="#">Accessorites</a></li>
                            <li><a href="#">Body Products</a></li>
                            <li><a href="#">Handbags</a></li>
                            <li><a href="#">Jewellery</a></li>
                            <li><a href="#">Key rings</a></li>
                            <li><a href="#">Scarves</a></li>
                            <li><a href="#">Travel</a></li>
                            <li><a href="#">Wallets</a></li>
                        </ul>
                </li>
                <li>
                    <a type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">For Him <span class="caret"></span></a>
                    <ul class="dropdown-menu" aria-labelledby="dLabel">
                        <li><a href="#">Accessories</a></li>
                        <li><a href="#">Cuff Links</a></li>
                        <li><a href="#">Key rings</a></li>
                        <li><a href="#">Travel</a></li>
                        <li><a href="#">Wallets</a></li>
                    </ul>
                </li>
                <li>
                    <a type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">For Home <span class="caret"></span></a>
                    <ul class="dropdown-menu" aria-labelledby="dLabel">
                        <li><a href="#">Candles</a></li>
                        <li><a href="#">African</a></li>
                        <li><a href="#">Clocks</a></li>
                        <li><a href="#">Diffusers</a></li>
                        <li><a href="#">Jewellery Boxes</a></li>
                        <li><a href="#">Mirrors</a></li>
                        <li><a href="#">Ornaments</a></li>
                        <li><a href="#">Photo Frames</a></li>
                        <li><a href="#">Tableware</a></li>
                        <li><a href="#">Wall Art</a></li>
                    </ul>
                </li>
                <li>
                    <a type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Special Occasions <span class="caret"></span></a>
                    <ul class="dropdown-menu" aria-labelledby="dLabel">
                        <li><a href="#">Judaica</a></li>
                        <li><a href="#">New Born</a></li>
                        <li><a href="#">Xmas</a></li>
                    </ul>
                </li>
                <li>
                    <a type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Brands <span class="caret"></span></a>
                    <ul class="dropdown-menu" aria-labelledby="dLabel">
                        <li><a href="#">Allen Design</a></li>
                        <li><a href="#">Bianc</a></li>
                        <li><a href="#">Carrol Boyes</a></li>
                        <li><a href="#">Cenzoni</a></li>
                        <li><a href="#">Cocco</a></li>
                        <li><a href="#">Cote Noir</a></li>
                        <li><a href="#">Ecoya</a></li>
                        <li><a href="#">Glasshouse</a></li>
                        <li><a href="#">Jennifer</a></li>
                        <li><a href="#">Dumet</a></li>
                        <li><a href="#">Laguiole</a></li>
                        <li><a href="#">Chateau</a></li>
                        <li><a href="#">Liberte</a></li>
                        <li><a href="#">Mukul Goyal</a></li>
                        <li><a href="#">Nicole</a></li>
                        <li><a href="#">Fendel</a></li>
                        <li><a href="#">Pasticle</a></li>
                    </ul>
                </li>
                <li><a class="direct-link">Sale</a></li>
                <li>
                    <a type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Contact Us <span class="caret"></span></a>
                    <ul class="dropdown-menu" aria-labelledby="dLabel">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Gift Vouchers</a></li>
                        <li><a href="#">FAQ</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>

    <?= $this->fetch ('content'); ?>

    <div id="footer-wrapper">
        <div id="footer" class="container">
            <div id="fbox1">
                <h2>Maecenas luctus</h2>
                <p>Nullam non wisi a sem semper eleifend. Donec mattis libero eget urna. Duis pretium velit ac mauris. Proin eu wisi suscipit nulla suscipit interdum.</p>
                <a href="#" class="button icon icon-arrow-right">Learn More</a> </div>
            <div id="fbox2">
                <h2>Integer gravida</h2>
                <p>Proin eu wisi suscipit nulla suscipit interdum. Nullam non wisi a sem semper eleifend. Donec mattis libero eget urna. Duis pretium velit ac mauris.</p>
                <a href="#" class="button icon icon-arrow-right">Learn More</a> </div>
            <div id="fbox3">
                <h2>Praesent scelerisque</h2>
                <p>Donec mattis libero eget urna. Duis pretium velit ac mauris. Proin eu wisi suscipit nulla suscipit interdum. Nullam non wisi a sem semper eleifend.</p>
                <a href="#" class="button icon icon-arrow-right">Learn More</a> </div>
            <div id="fbox4">
                <h2>Etiam rhoncus volutpat</h2>
                <p>Donec mattis libero eget urna. Duis pretium velit ac mauris. Proin eu wisi suscipit nulla suscipit interdum. Nullam non wisi a sem semper eleifend.</p>
                <a href="#" class="button icon icon-arrow-right">Learn More</a> </div>
        </div>
    </div>

    <div id="copyright">
        <p>&copy; Untitled. All rights reserved. | Photos by <a href="http://fotogrph.com/">Fotogrph</a> | Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.</p>
    </div>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
