
<?php
$this->set('title', 'Bulk Load');
?>
<div class="container">
    <?= $this->Form->create(null, ['url' => ['controller' => 'Bulkload', 'action' => 'ImagesImport'], 'type' => 'file']); ?>
    <h3> Choose Images file </h3>
    <fieldset>
<!--        <legend>--><?//= __('Add Image') ?><!--</legend>-->
        <?php

        echo $this->Form->input('Images[]', array('type' => 'file', 'multiple'));
        ?>
    </fieldset>
    <?= $this->Form->button('Submit', ['type' => 'submit']); ?>
    <?= $this->Form->end() ?>
</div>
