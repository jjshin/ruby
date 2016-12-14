<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Slider'), ['action' => 'edit', $slider->id], ['class'=>'btn btn-warning']) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Slider'), ['action' => 'delete', $slider->id], ['confirm' => __('Are you sure you want to delete # {0}?', $slider->id), 'class'=>'btn btn-warning']) ?> </li>
        <li><?= $this->Html->link(__('List Sliders'), ['action' => 'index'], ['class'=>'btn btn-warning']) ?> </li>
        <li><?= $this->Html->link(__('New Slider'), ['action' => 'add'], ['class'=>'btn btn-warning']) ?> </li>
    </ul>
</nav>
<div class="sliders view large-9 medium-8 columns content">
    <h3><?= h($slider->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($slider->title) ?></td>
        </tr>
        <tr>
            <th><?= __('URL') ?></th>
            <td><?= h($slider->url) ?></td>
        </tr>
        <tr>
            <th><?= __('Img') ?></th>
            <td><?= $this->Html->image($slider->img, ['style'=>'max-width:800px;']) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($slider->created) ?></td>
        </tr>
    </table>
</div>
