<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit category'), ['action' => 'edit', $category->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete category'), ['action' => 'delete', $category->id], ['confirm' => __('Are you sure you want to delete # {0}?', $category->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Category'), ['action' => 'index']) ?> </li>
    </ul>
</nav>
<div class="products view large-9 medium-8 columns content">
    <h3><?= h($category->cate_name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($category->cate_name) ?></td>
        </tr>
       
    </table>
</div>
