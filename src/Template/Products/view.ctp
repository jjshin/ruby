<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
       <li><?php //print_r($product->Category);exit;?> </li>
       <li><?= $this->Html->link(__('List Products'), ['action' => 'index', $product->Category['id'], $product->Subcategory['id']]) ?> </li>
    </ul>
</nav>
<div class="products view large-9 medium-8 columns content">
    <h3><?= h($product->name) ?></h3>
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
            <th scope="row"><?= __('Qty') ?></th>
            <td><?= $this->Number->format($product->qty) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= '$'.$this->Number->format($product->price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ship') ?></th>
            <td><?= $product->ship ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
	
	<?php 
	if ($this->request->session()->read('Auth.User.username')) {
		echo $this->Html->link('Add Cart', ['controller'=>'Orders', 'action'=>'add_cart', $product->id], ['class'=>'btn btn-info', 'role'=>'button']);
	}
	?>
	
    <div class="row">
        <h4><?= __('Descript') ?></h4>
        <?= $this->Text->autoParagraph(h($product->descript)); ?>
    </div>
</div>
