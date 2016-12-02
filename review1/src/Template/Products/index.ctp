
<div class="products index large-9 medium-8 columns content">
    <h3><?= __('Products') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id', 'Id') ?></th>
                <th><?= $this->Paginator->sort('brand_id', 'Brand', ['direction' => 'desc']) ?></th>
                <th><?= $this->Paginator->sort('name', 'Name', ['direction' => 'asc']) ?></th>
                <th><?= $this->Paginator->sort('price', '$') ?></th>
                <th><?= $this->Paginator->sort('qty', 'Qty') ?></th>

                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
            <tr>
                <td><?= $this->Number->format($product->id) ?></td>
                <td><?= h($product->brand->name) ?></td>
                <td><?= h($product->name) ?></td>
                <td><?= $this->Number->currency($product->price) ?></td>
                <td><?= $this->Number->format($product->qty) ?></td>

                <td class="actions">
                    <?php
                     echo $this->Html->link(__('View Details'), ['action' => 'view', $product->id])."<br>";
                     echo $this->Html->link(__('Edit Details'), ['action' => 'edit', $product->id])."<br>";
                     echo $this->Html->link(__('Restock Qty'), ['action' => 'restock', $product->id])."<br>";
                     echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)])."<br>";
                    ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <br>
        <?= $this->Paginator->counter() ?>
    </div>
</div>
