<nav class="container">
    <ul class="side-nav">
       <li><?php //print_r($product->Category);exit;?> </li>
       <!-- <li><?= $this->Html->link(__('List Products'), ['action' => 'index', $product->Category['id'], $product->Subcategory['id']], ['class'=>'btn btn-info']) ?> </li> -->
    </ul>
</nav>


<div class="container">
   
    <?php echo $this->Form->create(null, ['url'=>['controller'=>'Cart', 'action'=>'addCart']]);?>
    <?= $this->Form->hidden('products_id', ['value'=>$product->id]);?>
    <div class="col-md-4">
        <div id="main_img">
        <?= empty($product->image) ? '' : $this->Html->image($product->image, ['style'=>'max-width:100%;', 'data-zoom-image'=>$this->request->webroot.'img/'.$product->image]); ?>
        </div>
        <div class="row" style="margin-top:10px;">
            <div class="col-xs-2 col-xs-offset-1" style="padding:5px;"><?= empty($product->image) ? '' : $this->Html->image($product->image, ['style'=>'max-width:100%;', 'class'=>'sub_img']); ?></div>
            <div class="col-xs-2" style="padding:5px;"><?= empty($product->image2) ? '' : $this->Html->image($product->image2, ['style'=>'max-width:100%;', 'class'=>'sub_img']); ?></div>
            <div class="col-xs-2" style="padding:5px;"><?= empty($product->image3) ? '' : $this->Html->image($product->image3, ['style'=>'max-width:100%;', 'class'=>'sub_img']); ?></div>
            <div class="col-xs-2" style="padding:5px;"><?= empty($product->image4) ? '' : $this->Html->image($product->image4, ['style'=>'max-width:100%;', 'class'=>'sub_img']); ?></div>
            <div class="col-xs-2" style="padding:5px;"><?= empty($product->image5) ? '' : $this->Html->image($product->image5, ['style'=>'max-width:100%;', 'class'=>'sub_img']); ?></div>
        </div>
    </div>
    

    
    
    <div class="col-md-8">
        <h2><?= h($product->name) ?>
        <?= $this->Number->currency($product->sale_price, 'USD') ?>
        <?php if(!empty($product->retail_price) && $product->retail_price > $product->sale_price){?>
        <small><strike><?= $this->Number->currency($product->retail_price, 'USD') ?></strike></small>
        <?php }?></h2>
        
    
        <?php /* <span class="label label-warning">SKU: <?= $product->sku; ?></span> */ ?>
        <div class="col-md-12">
            <h4><?= $this->Text->autoParagraph(h($product->short_desc)); ?></h4>
        </div>

        <div class="col-xs-12">
            <span class="label label-success"><?= $product->Brands['name']; ?></span> 
            <span class="label label-warning"><?= $product->Style['name']; ?></span> 
            <span class="label label-danger"><?= $product->Material['name']; ?></span>
        </div>
        
        <div class="col-xs-6 col-sm-2">
            QUANTITY<?= $this->Form->number('qty', ['class'=>'form-control', 'placeholder'=>'Qty', 'value'=>1, 'min'=>1]);?>
        </div>
        <div class="col-xs-6 col-sm-2">
            <?php
            if ($product->status==1) {
                echo $this->Form->button('<span class="glyphicon glyphicon-shopping-cart
"></span> Add Cart',  ['class'=>'btn btn-info', 'role'=>'button', 'style'=>'margin-top:0;']);
            }elseif($product->status==2) {
                echo $this->Html->link('Enquire', ['controller'=>'Enquires', 'action'=>'add', $product->id], ['class'=>'btn btn-info', 'style'=>'margin-top:0;']);
            }
            ?>
        </div>
        <div class="clearfix"></div>
        <br>



        <div class="col-md-12">
            <h3>Details</h3>
            <?= $this->Text->autoParagraph(h($product->long_desc)); ?>
        </div>


                <!-- <div class="col-md-12">
                    <table class="table">
                        <?php if($product->size):?>
                        <tr>
                            <th><?= __('Size') ?></th>
                            <td><?= h($product->size) ?><?= h($product->sizeunit) ?></td>
                        </tr>
                        <?php endif;?>

                        <?php if($product->weight):?>
                        <tr>
                            <th><?= __('Weight') ?></th>
                            <td><?= h($product->weight) ?><?= h($product->weightunit) ?></td>
                        </tr>
                        <?php endif;?>

                        <?php if($product->height):?>
                        <tr>
                            <th><?= __('Height') ?></th>
                            <td><?= h($product->height) ?><?= h($product->heightunit) ?></td>
                        </tr>
                        <?php endif;?>

                        <?php if($product->width):?>
                        <tr>
                            <th><?= __('Width') ?></th>
                            <td><?= h($product->width) ?><?= h($product->widthunit) ?></td>
                        </tr>
                        <?php endif;?>

                        <?php if($product->length):?>
                        <tr>
                            <th><?= __('Length') ?></th>
                            <td><?= h($product->length) ?><?= h($product->lengthunit) ?></td>
                        </tr>
                        <?php endif;?>
                    </table>
                </div> -->
    </div>
    <div class="clearfix"></div>
    <?= $this->Form->end(); ?>


</div>

<script>
    $(document).ready(function(){
        $('.sub_img').on('click', function(e){
            $('#main_img').html('<img src="' + $(this).attr('src') + '" style="max-width:100%;" data-zoom-image="' + $(this).attr('src') + '">');
            $('#main_img img').elevateZoom();
        });
        
        $('#main_img img').elevateZoom();
    });
</script>
