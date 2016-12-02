<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Slider'), ['action' => 'add'], ['class'=>'btn btn-warning']) ?></li>
    </ul>
</nav>
<div class="sliders index large-9 medium-8 columns content">
    <h3><?= __('Sliders') ?></h3>
    <table cellpadding="0" cellspacing="0" class="table">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('title') ?></th>
                <th><?= $this->Paginator->sort('img') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sliders as $slider): ?>
            <tr>
                <td><?= $this->Number->format($slider->id) ?></td>
                <td><?= h($slider->title) ?></td>
                <td><?= $this->Html->image($slider->img, ['width'=>80]) ?></td>
                <td><?= h($slider->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $slider->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $slider->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $slider->id], ['confirm' => __('Are you sure you want to delete # {0}?', $slider->id)]) ?>
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
