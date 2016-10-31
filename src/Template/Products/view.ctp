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
            <th><?= __('Image2') ?></th>
            <td><?= empty($product->image2) ? '' : $this->Html->image($product->image2, ['style'=>'max-width:200px;']); ?></td>
        </tr>
        <tr>
            <th><?= __('Image3') ?></th>
            <td><?= empty($product->image3) ? '' : $this->Html->image($product->image3, ['style'=>'max-width:200px;']); ?></td>
        </tr>
        <tr>
            <th><?= __('Image4') ?></th>
            <td><?= empty($product->image4) ? '' : $this->Html->image($product->image4, ['style'=>'max-width:200px;']); ?></td>
        </tr>
        <tr>
            <th><?= __('Image5') ?></th>
            <td><?= empty($product->image5) ? '' : $this->Html->image($product->image5, ['style'=>'max-width:200px;']); ?></td>
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
  if ($this->request->session()->read('Auth.User.id') && $product->status==1) {
    echo $this->Form->button('Add Cart',  ['class'=>'btn btn-info', 'role'=>'button']);
  }elseif ($this->request->session()->read('Auth.User.id') && $product->status==2) {
    echo $this->Html->link('Enquire', ['controller'=>'Enquires', 'action'=>'add', $product->id], ['class'=>'btn btn-info']);
  }else{
    echo $this->Html->link('Login', ['controller'=>'Users', 'action'=>'login'], ['class'=>'btn btn-info', 'role'=>'button']);
  }
  ?>
  <?= $this->Form->end(); ?>
    <table class="vertical-table">
        <tr>
            <th><?= __('Supplier') ?></th>
            <td><?= $product->Suppliers['name']; ?></td>
        </tr>
        <tr>
            <th><?= __('Brand') ?></th>
            <td><?= $product->Brands['name']; ?></td>
        </tr>
        <tr>
            <th><?= __('Size') ?></th>
            <td><?= h($product->size) ?></td>
        </tr>
        <tr>
            <th><?= __('Sizeunit') ?></th>
            <td><?= h($product->sizeunit) ?></td>
        </tr>
        <tr>
            <th><?= __('Weight') ?></th>
            <td><?= h($product->weight) ?></td>
        </tr>
        <tr>
            <th><?= __('Weightunit') ?></th>
            <td><?= h($product->weightunit) ?></td>
        </tr>
        <tr>
            <th><?= __('Height') ?></th>
            <td><?= h($product->height) ?></td>
        </tr>
        <tr>
            <th><?= __('Heightunit') ?></th>
            <td><?= h($product->heightunit) ?></td>
        </tr>
        <tr>
            <th><?= __('Width') ?></th>
            <td><?= h($product->width) ?></td>
        </tr>
        <tr>
            <th><?= __('Widthunit') ?></th>
            <td><?= h($product->widthunit) ?></td>
        </tr>
        <tr>
            <th><?= __('Length') ?></th>
            <td><?= h($product->length) ?></td>
        </tr>
        <tr>
            <th><?= __('Lengthunit') ?></th>
            <td><?= h($product->lengthunit) ?></td>
        </tr>

        <tr>
            <th><?= __('Status') ?></th>
            <td><?= $this->Number->format($product->status) ?></td>
        </tr>
        <tr>
            <th><?= __('Sku') ?></th>
            <td><?= $this->Number->format($product->sku) ?></td>
        </tr>
        <tr>
            <th><?= __('Retail Price') ?></th>
            <td><?= $this->Number->format($product->retail_price) ?></td>
        </tr>
        <tr>
            <th><?= __('Cost Price') ?></th>
            <td><?= $this->Number->format($product->cost_price) ?></td>
        </tr>
        <tr>
            <th><?= __('Sale Price') ?></th>
            <td><?= $this->Number->format($product->sale_price) ?></td>
        </tr>

    </table>
    <div class="row">
        <h4><?= __('Descript') ?></h4>
        <?= $this->Text->autoParagraph(h($product->descript)); ?>
    </div>
    <div class="row">
        <h4><?= __('Short Desc') ?></h4>
        <?= $this->Text->autoParagraph(h($product->short_desc)); ?>
    </div>
    <div class="row">
        <h4><?= __('Long Desc') ?></h4>
        <?= $this->Text->autoParagraph(h($product->long_desc)); ?>
    </div>
</div>
