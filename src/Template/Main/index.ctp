
<div id="page-wrapper">
    <!--
    <div id="slider-section" class="container">
        <div class="main-slider">
            <div><img src="<?php echo  $this->request->webroot;?>img/test2.jpg" alt="" /></div>
            <div><img src="<?php echo  $this->request->webroot;?>img/test3.jpg" alt="" /></div>
            <div><img src="<?php echo  $this->request->webroot;?>img/test4.jpg" alt="" /></div>
        </div>
    </div> -->
    <?php if($sliders->count() > 0):?>
      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <?php foreach($sliders as $key=>$slider): ?>
            <?php if($key==0){ $class='active'; }else{ $class=''; } ?>
            <li data-target="#carousel-example-generic" data-slide-to="<?= $key;?>" class="<?= $class;?>"></li>
          <?php endforeach;?>
        </ol>
        <div class="carousel-inner" role="listbox">
          <?php foreach($sliders as $key=>$slider): ?>
            <?php if($key==0){ $class='active'; }else{ $class=''; } ?>
            <div class="item <?= $class;?>">
              <?= $this->Html->image($slider['img'], ['data-holder-rendered'=>'true']);?>
            </div>
          <?php endforeach;?>
        </div>
        <a class="left carousel-control" href="http://getbootstrap.com/examples/theme/#carousel-example-generic" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="http://getbootstrap.com/examples/theme/#carousel-example-generic" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    <?php endif; ?>

    <div id="featured" class="container">
        <div class="box">
            <div class="title">
                <h2>New Arrivals!</h2>
            </div>
            <p>Pellentesque tristique ante ut risus. Quisque dictum. Integer nisl risus, sagittis convallis, rutrum id, elementum congue, nibh. Suspendisse dictum porta lectus. Donec placerat odio vel elit. Nullam ante orci, pellentesque eget, tempus quis, ultrices in, est. Curabitur sit amet nulla. Nam in massa. Sed vel tellus. Curabitur sem urna, consequat vel, suscipit in, mattis placerat, nulla. Sed ac leo.</p>
        </div>
        <?php
        if($new_arrivals->count() > 0):
          foreach($new_arrivals as $key=>$item):
        ?>
        <div id="box<?=($key+1);?>">
            <?php echo $this->Html->image($item->image, ['style'=>'width:200px; height:200px;', 'url'=>['controller'=>'Products', 'action'=>'view', $item->id]]);?>
            <h2 class="subtitle"><?=$item->name;?></h2>
            <p>$<?php echo $item->sale_price;?></p>
        </div>
        <?php
          endforeach;
        endif;
        ?>
    </div>
    <!-- <div id="page" class="container">
        <div id="content">
            <div class="title">
                <h2>About Ruby's Gifts</h2>
            </div>
            <p><strong>Ruby’s Gifts has an exceptional range of the highest quality homewares, decorator accessories,
                 gifts for all occasions, jewellery, scarves, handbags including Kardashian Kollection.
                 Our unique range of gifts includes: African, Judaica and Australiana products.</strong></p>
            <a href="#" class="button icon icon-arrow-right">Learn More</a>
        </div>
        <div id="sidebar"><a href="#"><img src="/img/map.jpg" width="400" height="250" alt="" /></a></div>
    </div> -->
</div>
