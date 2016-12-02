<div class="medicinal index large-9 medium-8 columns content">
    <h3><?= __('Site Management') ?></h3>
    <table cellpadding="3" cellspacing="3">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($medicinal as $medicinal): ?>
            <center>
            <tr>
                <td><?= h($medicinal->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $medicinal->id])."<br>" ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $medicinal->id])."<br>" ?>
                </td>
            </tr>
            <?php endforeach; ?>
            </center>
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