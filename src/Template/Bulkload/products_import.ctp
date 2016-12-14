
<?php
$this->set('title', 'Bulk Load');
?>
<div class="container">
    <?= $this->Form->create(null, ['url' => ['controller' => 'Bulkload', 'action' => 'productsImport'], 'type' => 'file']); ?>
    <h3> Choose CSV file </h3>
    <p><?= $this->Form->input('csv', ['type' => 'file', 'label' => '', 'class' => 'form=control']); ?></p>
    <?= $this->Form->button('Submit', ['type' => 'submit']); ?>
    <?= $this->Form->end() ?>
</div>
