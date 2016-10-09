<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Category'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="products index large-9 medium-8 columns content">
    <h3><?= __('Category') ?></h3>
    <ul>
  		<?php foreach($categories as $id=>$cate): ?>
  			<li>
  				<strong><?= $this->Html->link($cate['name'], ['action' => 'adminIndex', $id]) ?></strong>
          <?= $this->Html->link(__('Add Sub Category'), ['controller'=>'Subcategory', 'action' => 'add', $id]) ?>
          <?= $this->Html->link(__('Edit'), ['action' => 'edit', $id]) ?>
          <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $id], ['confirm' => __('Are you sure you want to delete # {0}?', $id)]) ?>

  				<?php if(isset($cate['subcategory'])){?>
  					<ul>
  					<?php foreach($cate['subcategory'] as $subcate):?>
  						<li>
                <span><?= $subcate['name']; ?></span>
                <?= $this->Html->link(__('Edit'), ['controller'=>'Subcategory', 'action' => 'edit', $subcate['id']]) ?>
                <?= $this->Form->postLink(__('Delete'), ['controller'=>'Subcategory', 'action' => 'delete', $subcate['id']], ['confirm' => __('Are you sure you want to delete # {0}?', $subcate['id'])]) ?>
              </li>
  					<?php endforeach; ?>
  					</ul>
  				<?php }?>
  			</li>
  		<?php endforeach; ?>
  	</ul>
    <?php /*
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('cate_name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($category as $item): ?>
            <tr>
                <td><?= h($item->cate_name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Sub Category'), ['controller'=>'Subcategory', 'action' => 'index', $item->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $item->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $item->id], ['confirm' => __('Are you sure you want to delete # {0}?', $item->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
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
     */?>
</div>
