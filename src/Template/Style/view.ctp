<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Style'), ['action' => 'edit', $style->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Style'), ['action' => 'delete', $style->id], ['confirm' => __('Are you sure you want to delete # {0}?', $style->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Style'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Style'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="style view large-9 medium-8 columns content">
    <h3><?= h($style->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($style->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($style->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Products') ?></h4>
        <?php if (!empty($style->products)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Qty') ?></th>
                <th><?= __('Image') ?></th>
                <th><?= __('Subcategory Id') ?></th>
                <th><?= __('Suppliers Id') ?></th>
                <th><?= __('Brands Id') ?></th>
                <th><?= __('Status') ?></th>
                <th><?= __('Sku') ?></th>
                <th><?= __('Short Desc') ?></th>
                <th><?= __('Long Desc') ?></th>
                <th><?= __('Retail Price') ?></th>
                <th><?= __('Cost Price') ?></th>
                <th><?= __('Sale Price') ?></th>
                <th><?= __('Size') ?></th>
                <th><?= __('Sizeunit') ?></th>
                <th><?= __('Weight') ?></th>
                <th><?= __('Weightunit') ?></th>
                <th><?= __('Height') ?></th>
                <th><?= __('Heightunit') ?></th>
                <th><?= __('Width') ?></th>
                <th><?= __('Widthunit') ?></th>
                <th><?= __('Length') ?></th>
                <th><?= __('Lengthunit') ?></th>
                <th><?= __('Image2') ?></th>
                <th><?= __('Image3') ?></th>
                <th><?= __('Image4') ?></th>
                <th><?= __('Image5') ?></th>
                <th><?= __('Active') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Style Id') ?></th>
                <th><?= __('Material Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($style->products as $products): ?>
            <tr>
                <td><?= h($products->id) ?></td>
                <td><?= h($products->name) ?></td>
                <td><?= h($products->qty) ?></td>
                <td><?= h($products->image) ?></td>
                <td><?= h($products->subcategory_id) ?></td>
                <td><?= h($products->suppliers_id) ?></td>
                <td><?= h($products->brands_id) ?></td>
                <td><?= h($products->status) ?></td>
                <td><?= h($products->sku) ?></td>
                <td><?= h($products->short_desc) ?></td>
                <td><?= h($products->long_desc) ?></td>
                <td><?= h($products->retail_price) ?></td>
                <td><?= h($products->cost_price) ?></td>
                <td><?= h($products->sale_price) ?></td>
                <td><?= h($products->size) ?></td>
                <td><?= h($products->sizeunit) ?></td>
                <td><?= h($products->weight) ?></td>
                <td><?= h($products->weightunit) ?></td>
                <td><?= h($products->height) ?></td>
                <td><?= h($products->heightunit) ?></td>
                <td><?= h($products->width) ?></td>
                <td><?= h($products->widthunit) ?></td>
                <td><?= h($products->length) ?></td>
                <td><?= h($products->lengthunit) ?></td>
                <td><?= h($products->image2) ?></td>
                <td><?= h($products->image3) ?></td>
                <td><?= h($products->image4) ?></td>
                <td><?= h($products->image5) ?></td>
                <td><?= h($products->active) ?></td>
                <td><?= h($products->created) ?></td>
                <td><?= h($products->style_id) ?></td>
                <td><?= h($products->material_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Products', 'action' => 'view', $products->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Products', 'action' => 'edit', $products->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Products', 'action' => 'delete', $products->id], ['confirm' => __('Are you sure you want to delete # {0}?', $products->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
