<div class="products index large-9 medium-8 columns content">
    <h3><?= $cate_title; ?></h3>

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
