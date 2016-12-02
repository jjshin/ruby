<div class="col-md-3"></div>
<div class="col-md-6">
    <?= $this->Form->create($order) ?>
    <fieldset>

        <legend><?= __('Has this order been posted?') ?></legend>
        <br>
        <?php
            echo "Posted? ".$this->Form->checkbox('posted');
        ?>
        <br>

    </fieldset>
    <center>
    <br>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
    </center>
</div>
<div class="col-md-3"></div>