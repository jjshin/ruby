<div class="products index large-9 medium-8 columns content">
    <h3><?= $cate_title; ?></h3>
    <table cellpadding="0" cellspacing="0">
        <tbody>
            <?php foreach ($products as $product): ?>
            <tr>
                <td><?= $this->Number->format($product->id) ?></td>
                <td><?= h($product->name) ?></td>
                <td><?= h($product->ship) ?></td>
                <td><?= $this->Number->format($product->qty) ?></td>
                <td><?= $this->Number->format($product->price) ?></td>
                <td><?= h($product->image) ?></td>
                <td><?= $product->has('subcategory') ? $this->Html->link($product->subcategory->name, ['controller' => 'Subcategory', 'action' => 'view', $product->subcategory->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $product->id]) ?>
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
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
