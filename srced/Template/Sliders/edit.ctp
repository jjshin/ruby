<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Sliders'), ['action' => 'index'], ['class'=>'btn btn-warning']) ?></li>
    </ul>
</nav>
<div class="sliders form large-9 medium-8 columns content">
    <?= $this->Form->create($slider, ['type'=>'file']) ?>
    <fieldset>
        <legend><?= __('Edit Slider') ?></legend>
        <?php
            echo $this->Form->input('title', ['class'=>'form-control']);
            echo $this->Form->file('img', ['class'=>'form-control']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class'=>'btn btn-info']) ?>
    <?= $this->Form->end() ?>
</div>
