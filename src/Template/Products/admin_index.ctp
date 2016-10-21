<h3>Manage Products</h3>
<br>
<div class="admin-submenu"><?= $this->Html->link(__('New Product'), ['action' => 'add'], ['class' => 'btn btn-warning']) ?></div>
<div>
	<!-- <h3>Category</h3> -->

	<ul class="nav nav-tabs">
	  <li role="presentation"><?= $this->Html->link('All', ['action' => 'adminIndex']) ?></li>

		<?php foreach($category as $id=>$cate): ?>
			<?php if(isset($cate['subcategory'])): ?>
		  <li role="presentation" class="dropdown">
		    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
		      <?= $cate['name']; ?> <span class="caret"></span>
		    </a>
		    <ul class="dropdown-menu">
					<?php foreach($cate['subcategory'] as $subcate):?>
						<li><?= $this->Html->link($subcate['name'], ['action' => 'adminIndex', $id, $subcate['id']]) ?></li>
					<?php endforeach; ?>
		    </ul>
		  </li>
			<?php else:?>
			<li role="presentation">
		    <?= $this->Html->link($cate['name'], ['action' => 'adminIndex', $id]) ?>
			</li>
			<?php endif;?>
		<?php endforeach; ?>
	</ul>
</div>

<div class="products-table">
    <h3><?= __('Products') ?></h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ship') ?></th>
                <th scope="col"><?= $this->Paginator->sort('qty') ?></th>
                <th scope="col"><?= $this->Paginator->sort('price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('image') ?></th>
                <th scope="col"><?= $this->Paginator->sort('subcategory_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
					<?php if($products->count() > 0):?>
            <?php foreach ($products as $product): ?>
            <tr>
                <td><?= $this->Number->format($product->id) ?></td>
                <td><?= h($product->name) ?></td>
                <td><?= h($product->ship) ?></td>
                <td><?= $this->Number->format($product->qty) ?></td>
                <td><?= $this->Number->format($product->price) ?></td>
                <td><?= empty($product->image) ? '' : $this->Html->image($product->image, ['style'=>'max-width:50px;']); ?></td>
                <td><?= $product->subcategory_id; ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'adminView', $product->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $product->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
					<?php else:?>
						<tr>
							<td colspan="8">No Data</td>
						</tr>
					<?php endif;?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
