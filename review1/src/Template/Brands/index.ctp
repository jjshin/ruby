
<div class="brands index large-9 medium-8 columns content">
    <h3><?= __('Brands') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($brands as $brand): ?>
            <tr>
                <td><?= $this->Number->format($brand->id) ?></td>
                <td><?= h($brand->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $brand->id]) ?><br>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $brand->id], ['confirm' => __('Are you sure you want to delete # {0}?', $brand->id)] ) ?>
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
