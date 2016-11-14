
<div id="page-wrapper">
    <?php if($sliders->count() > 0):?>
      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <?php foreach($sliders as $key=>$slider): ?>
            <?php if($key==0){ $class='active'; }else{ $class=''; } ?>
            <li data-target="#carousel-example-generic" data-slide-to="<?= $key;?>" class="<?= $class;?>"></li>
          <?php endforeach;?>
        </ol>
        <div class="carousel-inner" role="listbox" style="height:300px;">
          <?php foreach($sliders as $key=>$slider): ?>
            <?php if($key==0){ $class='active'; }else{ $class=''; } ?>
            <div class="item <?= $class;?>" style="height:100%;">
              <?= $this->Html->image($slider['img'], ['data-holder-rendered'=>'true', 'style'=>'max-height:100%; margin:0 auto 0 auto;']);?>
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
</div>
