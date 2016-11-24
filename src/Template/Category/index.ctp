<h3>Manage Categories</h3>
<br>
<!-- <h3><?= __('Category') ?></h3> -->
<div class="admin-submenu"><?= $this->Html->link(__('New Category'), ['action' => 'add'], ['class' => 'btn btn-warning']) ?></div>
<br>
<div class="admin-category-body container no-padding">
  <table class="table table-striped categories-table">
    <thead class="thead-default">
      <tr>
        <th class="text-align-center"><h5>1st Categories</h5></th>
        <th class="text-align-center"><h5>2nd Categories</h5></th>
        <th class="text-align-center"><h5>3rd Categories</h5></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($categories as $id=>$main): ?>
        <tr>
          <td class="col-xs-4">
            <div class="flex flex-column">
              <h3 class="flex-el"><?= $main['name'] ?></h3>
              <div>
                <?= $this->Html->link(__('Add Sub Category'), ['controller'=>'Maincategory', 'action' => 'add', $id], ['class' => 'btn btn-xs btn-primary']) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $id], ['class' => 'btn btn-xs btn-primary']) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $id], ['class' => 'btn btn-xs btn-danger'], ['confirm' => __('Are you sure you want to delete # {0}?', $id)]) ?>
              </div>
            </div>
          </td>
          <td colspan="2" class="col-xs-8">
            <?php if(sizeof($main)>1){?>
              <?php foreach($main['children'] as $cateid=>$cate):?>
                  <table class="table">
                    <td class="col-xs-6">
                      <span><strong><?= $cate['name']; ?></strong></span>
                      <div>
                        <?= $this->Html->link(__('Add Sub Category'), ['controller'=>'Category', 'action' => 'add', $cateid], ['class' => 'btn btn-xs btn-primary']) ?>
                        <?= $this->Html->link(__('Edit'), ['controller'=>'Category', 'action' => 'edit', $cateid], ['class' => 'btn btn-xs btn-primary']) ?>
                        <?= $this->Form->postLink(__('Delete'), ['controller'=>'Category', 'action' => 'delete', $cateid], ['class' => 'btn btn-xs btn-danger'], ['confirm' => __('Are you sure you want to delete # {0}?', $cateid)]) ?>
                      </div>
                  </td>

                    <td class="col-xs-6">
                        <?php if(sizeof($cate)>1){?>
                          <?php foreach($cate['children'] as $sub):?>
                            <div class="sub-category-row flex">
                              <span><strong><?= $sub['name']; ?> </strong></span>
                              <div>
                                <?= $this->Html->link(__('Edit'), ['controller'=>'Subcategory', 'action' => 'edit', $sub['id']], ['class' => 'btn btn-xs btn-primary']) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller'=>'Subcategory', 'action' => 'delete', $sub['id']], ['class' => 'btn btn-xs btn-danger'], ['confirm' => __('Are you sure you want to delete # {0}?', $sub['id'])]) ?>
                              </div>
                            </div>
                          <?php endforeach; ?>
                        <?php }?>
                    </td>
                </table>
                <div class="clearfix"></div>
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
