<div class="products index large-9 medium-8 columns content">
    <h3><?= __('Restock') ?></h3>
    To replenish/deplete stock, simply enter in the new amount.

    <?= $this->Form->create($product) ?>
        <table cellpadding="0" cellspacing="0">

            <thead>
               <tr>
                   <th class="actions"><?= __('Name') ?></th>
                   <th class="actions"><?= __('Current Qty') ?></th>
               </tr>
            </thead>

            <tbody>
               <tr>
                  <td><?= h($product->name) ?></td>
                  <td><?= $this->Form->input('qty', array('label'=>false,
                                                   'style'=>'width:50px; height:30px;'
                                                    )); ?></td>
               </tr>
            </tbody>
        </table>

    <?= $this->Form->button('Submit', ['type' => 'submit', $product->qty]) ?>
    <?= $this->Form->end() ?>
</div>

