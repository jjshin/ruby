<center><h3>Manage Products</h3></center>
<br>
<center><div class="admin-submenu"><?= $this->Html->link(__('New Product'), ['action' => 'add'], ['class' => 'btn btn-warning']) ?></div></center>

<div class="collapse navbar-collapse">
	<ul class="nav navbar-nav">
		<li><a class="direct-link" href="<?php echo  $this->request->webroot;?>">Home</a></li>
		<?php foreach($categories as $id=>$main): ?>
		<li>
			<?php if(sizeof($main)>1){?>
				<a type="button" class="dropdown-toggle" data-toggle="dropdown"><?= $main['name'];?> <span class="caret"></span></a>
				<ul class="dropdown-menu multi-level">
				<?php foreach($main['children'] as $cateid=>$cate):?>
					<?php if(sizeof($cate)>1){?>
						<li class="dropdown-submenu">
							<a type="button" class="dropdown-toggle" data-toggle="dropdown"><?= $cate['name'];?></a>
							<ul class="dropdown-menu">
							<?php foreach($cate['children'] as $sub):?>
								<li>
									<?php echo $this->Html->link($sub['name'], ['action' => 'adminIndex', $id, $cateid, $sub['id']], ['class'=>'direct-link']) ?>
								</li>
							<?php endforeach; ?>
							</ul>
						</li>
					<?php }else{ ?>
						<li>
							<?= $this->Html->link($cate['name'], ['action' => 'adminIndex', $id, $cateid], ['class'=>'direct-link']) ?>
						</li>
					<?php } ?>
				<?php endforeach; ?>
				</ul>
			<?php }else{ ?>
				<?= $this->Html->link($main['name'], ['action' => 'adminIndex', $id], ['class'=>'direct-link']) ?>
			<?php } ?>
		</li>
		<?php endforeach; ?>
	</ul>
</div>

<div class="products-table">
    <h3><?= __('Products') ?></h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('qty') ?></th>
                <th scope="col"><?= $this->Paginator->sort('image') ?></th>
                <th scope="col"><?= $this->Paginator->sort('subcategory_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
					<?php if($products->count() > 0):?>
            <?php foreach ($products as $product): ?>
            <tr>
                <td><?= ($product->active==1)?'Yes':'No'; ?></td>
                <td><?= $this->Number->format($product->id) ?></td>
                <td><?= h($product->name) ?></td>
                <td><?= $this->Number->format($product->qty) ?></td>
                <td><?= empty($product->image) ? '' : $this->Html->image($product->image, ['style'=>'max-width:50px;']); ?></td>
                <td><?= $product->subcategory_id; ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'adminView', $product->id]) ?> |
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $product->id]) ?>
                    <!-- <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]) ?> -->
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
