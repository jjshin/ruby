    <br>
    <br>
        
    <br>


    <div class="row">
         <?php
             $i = 0;
             foreach ($products as $product):

             if (($i % 4) == 0) { echo "\n<div class = \"row\">\n\n";}
         ?>

         <div class="col col-sm-3">
             <center>
             <br />
             <?php echo $this->Html->image('images/' . $product->image, array('url' => array('controller' => 'products', 'action' => 'item', $product->id ), 'width' => 150, 'height' => 155 )); ?>
             <br />
             <?= h($product->name) ?>
             <br />
             <?= $this->Number->currency($product->price) ?>
             <br />

             <?php if($product->restricted): ?>
                <?php if(($restricted->exists(['Restrictedproducts.user_id' => $uid])) && ($restricted->exists(['Restrictedproducts.product_id' => $product->id]))):?>
                    <?= $this->Html->Link(__('Add To Cart'), ['action' => 'addToCart', $product->id], array('class' => 'btn btn-default btn-sm')); ?>
                    <?php else:?>
                    <?= $this->Html->Link(__('Enquire Now'), ['controller' => 'medicinal', 'action' => 'enquire', $product->id], array('class' => 'btn btn-default btn-sm')); ?>
                <?php endif;?>
             <?php else:?>
                <?= $this->Html->Link(__('Add To Cart'), ['action' => 'addToCart', $product->id], array('class' => 'btn btn-default btn-sm')); ?>
             <?php endif;?>

             <br />
             </center>
         </div>
          <?php $i++; ?>
         <?php if (($i % 4) == 0) { echo "\n</div>\n\n";}
            endforeach;
         ?>

         <br/>
         <br/>


         </div>

</div>
