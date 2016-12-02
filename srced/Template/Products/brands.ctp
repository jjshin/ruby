<div class="products index large-9 medium-8 columns content">
    <h3>Brands > <?= $brand['name'];?></h3>

    <?php if($products->count() > 0):?>
        <?php foreach ($products as $product): ?>
        <div class="col-sm-4 col-md-3">
            <div class="thumbnail">
                <?= $this->Html->image($product->image, ['url'=>['action' => 'view', $product->id]]); ?>
                <div class="caption">
                    <h3><?= h($product->name) ?></h3>
                    <p>
                        <small><strike><?= $this->Number->currency($product->cost_price, 'USD') ?></strike></small>
                        <?= $this->Number->currency($product->sale_price, 'USD') ?>
                </p>
                </div>
            </div>
        </div>
        <?php endforeach;?>
    <?php else: ?>
        <div class="col-md-12 text-center">No items</div>
    <?php endif; ?>
    <div class="clearfix"></div>
    <!-- <table cellpadding="0" cellspacing="0">
        <tbody>
          <?php //echo '<pre>'; print_r($products);?>
          <?php if($products->count() > 0):?>
            <?php foreach ($products as $product): ?>
            <tr>
                <td><?= $this->Number->format($product->id) ?></td>
                <td><?= h($product->name) ?></td>
                <td><?= h($product->ship) ?></td>
                <td><?= $this->Number->format($product->qty) ?></td>
                <td><?= $this->Number->format($product->price) ?></td>
                <td><?= empty($product->image) ? '' : $this->Html->image($product->image, ['style'=>'max-width:50px;']); ?></td>
                <td><?= $product->has('subcategory') ? $this->Html->link($product->subcategory->name, ['controller' => 'Subcategory', 'action' => 'view', $product->subcategory->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $product->id]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td>No items</td>
            </tr>
          <?php endif; ?>
        </tbody>
    </table> -->
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
