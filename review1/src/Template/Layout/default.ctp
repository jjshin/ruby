<!DOCTYPE HTML>
<html>
    <head>
        <!-- element head contains all css/js that contributes to this layout-->
        <?= $this->element('head'); ?>

        <?php $this->request->session()->write('url', ($this->request->params));
        $url = $this->request->session()->read('url');

        if (!$url['pass']){
          $url['pass']['0'] = '';
        }
        ?>
    </head>

    <body>
      <div id="body_holder" style="display:none">
        <div class="top_bg">
        <div class="container">
            <div class="header_top-sec">
                <div class="top_right">
                    <ul>
                        <li><?= $this->Html->link('Contact Us', ['controller' => 'medicinal', 'action' => 'contact']); ?></li> |
                        <li><?= $this->Html->link('My Account', ['controller' => 'users', 'action' => 'account']); ?></li>
                    </ul>
                </div>

                <div class="social">
                    <ul>
                        <li><a href="https://www.facebook.com/medicinalmelbourne"><i class="facebooktest"></i></a></li>
                        <li><a href="https://www.twitter.com/JRoseWellness"><i class="twittertest"></i></a></li>
                        <li><a href="https://www.instagram.com/medicinal.melbourne"><i class="instagramtest"></i></a></li>
                    </ul>
                </div>

                <div class="top_left">
                     <ul>
                        <li>
                             <?php if($loggedIn) : ?>
                                  <?= $this->Html->link('LOGOUT', ['controller' => 'users', 'action' => 'logout']); ?>
                               <?php else : ?>
                                   <?= $this->Html->link('LOGIN', ['controller' => 'users', 'action' => 'login']); ?>
                                   or
                                   <?= $this->Html->link('REGISTER', ['controller' => 'users', 'action' => 'register']); ?>
                             <?php endif; ?>
                        </li>
                     </ul>
                </div>
            </div>
                    <div class="clearfix"> </div>
            </div>
        </div>


        <div class="header_top">
         <div class="container">
             <div class="logo">
                <center>
                <?php echo $this->Html->image('images/medicinalbanner.png', array('url' => array('controller' => 'pages'))); ?>
                </center>
             </div>
             <div class="header_right">

                 <div class="cart box_1">

                        <h3>
                            <?php
                            echo $this->Html->link('Shopping Cart', ['controller' => 'products', 'action' => 'cart', 'class' => "simpleCart"]);
                            echo ' ';
                            echo $this->Html->link('$',['controller' => 'products', 'action' => 'cart', 'class' => "simpleCart"]);

                            if($this->request->session()->check('cart')){
                                $price = $this->request->session()->read('cart.totalPrice');

                                echo $this->Html->link($price, ['controller' => 'products', 'action' => 'cart', 'class' => "simpleCart"]);
                            }
                            else{
                                echo '0.00';
                            }
                            ?>
                            </span>
                                <?php echo $this->Html->image('images/bag.png', array('url' => array('controller' => 'products', 'action' => 'cart')))?>
                            <span class="badge">
                                <?php if($this->request->session()->check('cart')){
                                        echo $this->request->session()->read('cart.totalQty');
                                }
                                ?>
                        </h3>

                    <div class="clearfix"> </div>
                 </div>
             </div>
              <div class="clearfix"></div>
         </div>
        </div>

      <div class="mega_nav">
         <div class="container">
             <div class="menu_sec">
             <!-- start header menu -->
             <ul class="megamenu skyblue">
                 <li class="grid
                 <?=  (($url['controller']==='Pages')&& ($url['action']=='display') )
                 ||   (($url['controller']==='Medicinal')&& ($url['action']=='about') )
                 ||   (($url['controller']==='Pages')&& ($url['action']=='contact') )?'active' :'' ?>">
                 <?= $this->Html->link('Home', ['controller' => 'pages']); ?>
                    <div class="megapanel">
                        <div class="row">
                            <div class="col1">
                                <div class="h_nav">
                                        <ul>
                                            <li><?= $this->Html->link('Philosophy', ['controller' => 'medicinal', 'action' => 'about']); ?></li>
                                            <li><?= $this->Html->link('Contact', ['controller' => 'medicinal', 'action' => 'contact']); ?></li>
                                            <li><a href="http://risewellness.com.au/">Our Blog</a></li>
                                        </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                 </li>

                 <li class="grid <?= (($url['controller'] === 'Products') && ($url['action'] ==='all'))?'active' :'' ?>">
                   <a class="color1" id="grid"<?= $this->Html->link('All', ['controller' => 'products', 'action'=>'all']); ?>
                 </li>
                 <li class="grid
                   <?=  (($url['pass']['0']=='supplements')
                   ||    ($url['pass']['0']=='metagenics')
                   ||    ($url['pass']['0']=='bioceuticals')
                   ||    ($url['pass']['0']=='floradix')
                   ||    ($url['pass']['0']=='kids')
                   ||    ($url['pass']['0']=='chinese herbal medicine'))?'active' :'' ?>">
                   <a class="color2" id="grid" <?= $this->Html->link('Supplements', ['controller' => 'products', 'action' => 'categories', 'supplements']); ?>
                    <div class="megapanel">
                        <div class="row">
                            <div class="col1">
                                <div class="h_nav">
                                        <ul>
                                            <li><li><?= $this->Html->link('Metagenics', ['controller' => 'products', 'action' => 'categories', 'metagenics']); ?></li></li>
                                            <li><li><?= $this->Html->link('Bioceuticals', ['controller' => 'products', 'action' => 'categories', 'bioceuticals']); ?></li></li>
                                            <li><?= $this->Html->link('Floradix', ['controller' => 'products', 'action' => 'categories', 'floradix']); ?></li>
                                            <li><?= $this->Html->link('Kids', ['controller' => 'products', 'action' => 'categories', 'kids']); ?></li>
                                            <li><?= $this->Html->link('Chinese Herbal Medicine', ['controller' => 'products', 'action' => 'categories', 'chinese herbal medicine']); ?></li>
                                        </ul>
                                </div>
                            </div>
                    </div>
                 </li>
                 <li class="grid
                 <?=  (($url['pass']['0']=='organic market')      ||  ($url['pass']['0']=='herbs and spices')   ||  ($url['pass']['0']=='seeds')   ||  ($url['pass']['0']=='dental')
                 ||    ($url['pass']['0']=='beans and legumes')   ||  ($url['pass']['0']=='nuts')               ||  ($url['pass']['0']=='sugars')
                 ||    ($url['pass']['0']=='butters')             ||  ($url['pass']['0']=='oils')               ||  ($url['pass']['0']=='detox')
                 ||    ($url['pass']['0']=='dried fruits')        ||  ($url['pass']['0']=='powders')            ||  ($url['pass']['0']=='ear candles')
                 ||    ($url['pass']['0']=='flour and baking')    ||  ($url['pass']['0']=='rice')               ||  ($url['pass']['0']=='baby and kids health')
                 ||    ($url['pass']['0']=='grains'))?'active' :'' ?>">
                   <a class="color4" <?= $this->Html->link('Organic Market', ['controller' => 'products', 'action' => 'categories', 'organic market']); ?>
                    <div class="megapanel">
                        <div class="row">
                            <div class="col1">
                                <div class="h_nav">
                                        <ul>
                                            <li><?= $this->Html->link('Beans & Legumes', ['controller' => 'products', 'action' => 'categories', 'beans and legumes']); ?></li>
                                            <li><?= $this->Html->link('Butters', ['controller' => 'products', 'action' => 'categories', 'butters']); ?></li>
                                            <li><?= $this->Html->link('Dried Fruits', ['controller' => 'products', 'action' => 'categories', 'dried fruits']); ?></li>
                                            <li><?= $this->Html->link('Flour & Baking', ['controller' => 'products', 'action' => 'categories', 'flour and baking']); ?></li>
                                            <li><?= $this->Html->link('Grains', ['controller' => 'products', 'action' => 'categories', 'grains']); ?></li>
                                            <li><?= $this->Html->link('Herbs & Spices', ['controller' => 'products', 'action' => 'categories', 'herbs and spices']); ?></li>
                                        </ul>
                                </div>
                            </div>
                            <div class="col1">
                                <div class="h_nav">
                                        <ul>
                                            <li><?= $this->Html->link('Nuts', ['controller' => 'products', 'action' => 'categories', 'nuts']); ?></li>
                                            <li><?= $this->Html->link('Oils', ['controller' => 'products', 'action' => 'categories', 'oils']); ?></li>
                                            <li><?= $this->Html->link('Powders', ['controller' => 'products', 'action' => 'categories', 'powders']); ?></li>
                                            <li><?= $this->Html->link('Rice', ['controller' => 'products', 'action' => 'categories', 'rice']); ?></li>
                                            <li><?= $this->Html->link('Seeds', ['controller' => 'products', 'action' => 'categories', 'seeds']); ?></li>
                                            <li><?= $this->Html->link('Sugars', ['controller' => 'products', 'action' => 'categories', 'sugars']); ?></li>
                                        </ul>
                                </div>
                            </div>
                            <div class="col1">
                                <div class="h_nav">
                                        <ul>
                                            <li><?= $this->Html->link('Detox', ['controller' => 'products', 'action' => 'categories', 'detox']); ?></li>
                                            <li><?= $this->Html->link('Health', ['controller' => 'products', 'action' => 'categories', 'health']); ?></li>
                                            <li><?= $this->Html->link('Dental', ['controller' => 'products', 'action' => 'categories', 'dental']); ?></li>
                                            <li><?= $this->Html->link('Baby & Kids Health', ['controller' => 'products', 'action' => 'categories','baby and kids health']); ?></li>
                                        </ul>
                                </div>
                            </div>
                    </div>
                 </li>
                 <li class="grid <?= (($url['pass']['0']=='tea')      ||  ($url['pass']['0']=='pukka')   ||  ($url['pass']['0']=='looseleaf') )?'active':''?>">
                 <a class="color5" <?= $this->Html->link('Teas', ['controller' => 'products', 'action' => 'categories', 'tea']); ?>
                    <div class="megapanel">
                        <div class="row">
                            <div class="col1">
                                <div class="h_nav">
                                        <ul>
                                            <li><?= $this->Html->link('Pukka', ['controller' => 'products', 'action' => 'categories', 'pukka']); ?></li>
                                            <li><?= $this->Html->link('Loose Leaf', ['controller' => 'products', 'action' => 'categories', 'looseleaf']); ?></li>
                                        </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                  <li class="grid <?= (($url['pass']['0']=='meals and recipes') ||  ($url['pass']['0']=='daily specials') ||  ($url['pass']['0']=='broths')  ||  ($url['pass']['0']=='fermented') )?'active':''?>">
                   <a class="color7" <?= $this->Html->link('Meals & Recipes', ['controller' => 'products', 'action' => 'categories', 'meals and recipes']); ?>
                    <div class="megapanel">
                        <div class="row">
                            <div class="col1">
                                <div class="h_nav">
                                    <ul>
                                        <li><?= $this->Html->link('Daily Special Frozen', ['controller' => 'products', 'action' => 'categories', 'daily specials']); ?></li>
                                        <li><?= $this->Html->link('Medicinal Bone Broth', ['controller' => 'products', 'action' => 'categories', 'broths']); ?></li>
                                        <li><?= $this->Html->link('Fermented Foods', ['controller' => 'products', 'action' => 'categories', 'fermented']); ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                 </li>
             </ul>

             <div class="search">
               <?php echo $this->Form->create(null, array('type' => 'GET', 'url' => array('controller' => 'products', 'action' => 'search'))); ?>

               <?php echo $this->Form->input('search', array('label' => false, 'type' => 'text', 'placeholder' => 'Search...')); ?>
               <?php echo $this->Form->submit('', array('div' => false, 'type' => 'submit')); ?>

               <?php echo $this->Form->end(); ?>

             </div>
                 <div class="clearfix"></div>
             </div>
          </div>
        </div>




        <!-- THIS IS THE SHOP FRONT. CONTENT OF THE PAGES IS 'FETCHED'. The homepage is in Pages/home.ctp -->
        <div class="shopfront">
            <div id="content" class="container">

                 <?php echo $this->Flash->render() ?>
                 <?php echo $this->fetch('content'); ?>
            </div>
         </div>


        <div class="clearfix"/>
        </div>
        <br>
        <br>
        </div>

        <!-- THIS IS THE FOOTER STORED AS ELEMENTS AND 'FETCHED' -->
        <div class="footer-content">
            <?= $this->element('footercontent') ?>
        </div>

        <div class="footer">
            <?= $this->element('footer') ?>
        </div>

    </div>
    </body>

</html>
