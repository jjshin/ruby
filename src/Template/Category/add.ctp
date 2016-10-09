<h3>Submenu</h3>
<div class="admin-submenu"><?= $this->Html->link(__('List Category'), ['action' => 'index'], ['class' => 'btn btn-warning']) ?></div>
<h3 class="form-title"><?= __('Add Category') ?></h3>
<div class="products-form half-row">
    <?= $this->Form->create($category, ['class' => 'form-group']) ?>
    <fieldset>
        <?php
            echo $this->Form->input('cate_name', ['class' => 'form-control']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info']) ?>
    <?= $this->Form->end() ?>
</div>
