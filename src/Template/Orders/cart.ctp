<div class="products index large-9 medium-8 columns content">
  <h2>Cart</h2>
  <ul>
  <?php foreach($cart as $item):?>
    <li>
      <?= empty($item->Products['image']) ? '' : $this->Html->image($item->Products['image'], ['style'=>'max-width:100px;']); ?>
      <strong><?= $item->Products['name'];?></strong>
      <?= $this->Html->link('Delete', ['action'=>'delCart', $item['id']]);?>
    </li>
  <?php endforeach;?>
  </ul>
</div>
