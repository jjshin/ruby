<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
       <li><?php //print_r($product->Category);exit;?> </li>
       <li><?= $this->Html->link(__('List Products'), ['action' => 'index', $product->Category['id'], $product->Subcategory['id']]) ?> </li>
    </ul>
</nav>
<div class="products view large-9 medium-8 columns content">
    <h3><?= h($product->name) ?></h3>
    <?php echo $this->Form->create(null, ['url'=>['controller'=>'Cart', 'action'=>'addCart']]);?>
    <?= $this->Form->hidden('products_id', ['value'=>$product->id]);?>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($product->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image') ?></th>
            <td><?= empty($product->image) ? '' : $this->Html->image($product->image, ['style'=>'max-width:200px;']); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Order Qty') ?></th>
            <td><?= $this->Form->number('qty', ['placeholder'=>'order qty', 'value'=>1, 'min'=>1]);?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Qty') ?></th>
            <td><?= $this->Number->format($product->qty) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= $this->Number->currency($product->price, 'USD') ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ship') ?></th>
            <td><?= $product->ship ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
  <?php
  if ($this->request->session()->read('Auth.User.id')) {
    echo $this->Form->button('Add Cart',  ['class'=>'btn btn-info', 'role'=>'button']);
  }
  ?>
  <?= $this->Form->end(); ?>

    <div class="row">
        <h4><?= __('Descript') ?></h4>
        <?= $this->Text->autoParagraph(h($product->descript)); ?>
    </div>
</div>
