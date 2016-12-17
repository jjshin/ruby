<div class="products index large-9 medium-8 columns content">
    <h3><?= $cate_title; ?></h3>
    
    <div class="col-md-2">
        <?php echo $this->Form->create();?>
        <div>
            <p>
              <label for="amount">Price range:</label>
              <input type="text" name="price" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
            </p>
            <div id="slider-range"></div>
        </div>
        <br>
        
        <div>
            <strong>Brands</strong>
            <?php echo $this->Form->select('brands', $brands, ['multiple'=>'checkbox']);?>
        </div>
        
        <div>
            <strong>Styles</strong>
            <?php echo $this->Form->select('styles', $styles, ['multiple'=>'checkbox']);?>
           
        </div>
        
        <div>
            <strong>Materials</strong>
            <?php echo $this->Form->select('materials', $materials, ['multiple'=>'checkbox']);?>
            
        </div>
        
        <button type="submit" id="btn_filter" class="btn btn-primary">Filter</button>
        <?php echo $this->Form->end();?>
    </div>

    <div class="col-md-10">
        <?php if($products->count() > 0):?>
            <?php foreach ($products as $product): ?>
            <div class="col-sm-4 col-md-3">
                <div class="thumbnail">
                    <?= $this->Html->image($product->image, ['url'=>['action' => 'view', $product->id]]); ?>
                    <div class="caption">
                        <h3><?= h($product->name) ?></h3>
                        <p>

                            <?= $this->Number->currency($product->sale_price, 'USD') ?>

                            <?php if(!empty($product->retail_price) && $product->retail_price > $product->sale_price){?>
            <small><strike><?= $this->Number->currency($product->retail_price, 'USD') ?></strike></small>
            <?php }?>


                        </p>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
        <?php else: ?>
            <div class="col-md-12 text-center">No items</div>
        <?php endif; ?>
        <div class="clearfix"></div>

        <div class="paginator">
            <ul class="pagination">
                <?= $this->Paginator->prev('< ' . __('previous')) ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next(__('next') . ' >') ?>
            </ul>
            <p><?= $this->Paginator->counter() ?></p>
        </div>
    </div>
</div>

<script>
  $( function() {
    $( "#slider-range" ).slider({
      range: true,
      min: 0,
      max: <?= $max_price;?>,
      values: [ <?=$param_min_price?$param_min_price:0; ?>, <?=$param_max_price?$param_max_price:$max_price;?> ],
      slide: function( event, ui ) {
        $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
      }
    });
    $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
      " - $" + $( "#slider-range" ).slider( "values", 1 ) );
  } );
  </script>
