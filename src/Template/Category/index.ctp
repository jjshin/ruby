<h3>Manage Categories</h3>
<br>
<!-- <h3><?= __('Category') ?></h3> -->
<div class="admin-submenu"><?= $this->Html->link(__('New Category'), ['action' => 'add'], ['class' => 'btn btn-warning']) ?></div>
<br>
<div class="admin-category-body container no-padding">
  <table class="table table-striped categories-table">
    <thead class="thead-default">
      <tr>
        <td class="text-align-center"><h5>Main Categories</h5></td>
        <td class="text-align-center"><h5>Sub Categories</h5></td>
      </tr>
    </thead>
    <tbody>
      <?php foreach($categories as $id=>$cate): ?>
        <tr>
          <td class="main-category-column half-row">
            <div class="flex flex-column">
              <h3 class="flex-el"><?= $cate['name'] ?></h3>
              <div class="link-block flex-column flex">
                <?= $this->Html->link(__('Add Sub Category'), ['controller'=>'Subcategory', 'action' => 'add', $id], ['class' => 'btn btn-xs btn-primary']) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $id], ['class' => 'btn btn-xs btn-primary']) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $id], ['class' => 'flex-el'], ['confirm' => __('Are you sure you want to delete # {0}?', $id)]) ?>
              </div>
            </div>
          </td>
          <td class="sub-category-column half-row">
            <?php if(isset($cate['subcategory'])){?>
              <?php foreach($cate['subcategory'] as $subcate):?>
                <div class="sub-category-row flex">
                  <span><strong><?= $subcate['name']; ?></strong></span>
                  <div class="link-block">
                    <?= $this->Html->link(__('Edit'), ['controller'=>'Subcategory', 'action' => 'edit', $subcate['id']]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller'=>'Subcategory', 'action' => 'delete', $subcate['id']], ['confirm' => __('Are you sure you want to delete # {0}?', $subcate['id'])]) ?>
                  </div>
                </div>
              <?php endforeach; ?>
            <?php }?>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

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
