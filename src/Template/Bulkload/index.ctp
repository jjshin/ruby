
<?php
$this->set('title', 'Add a Provider - Care Advisory');
?>
<div class="container">
    <?= $this->Form->create(null, ['url' => ['controller' => 'Bulkload', 'action' => 'import'], 'type' => 'file']); ?>
    <h3> Choose CSV file </h3>
    <p><?= $this->Form->input('csv', ['type' => 'file', 'label' => '', 'class' => 'form=control']); ?></p>
    <?= $this->Form->button('Submit', ['type' => 'submit']); ?>
    <?= $this->Form->end() ?>
</div>
