<div class="products index large-9 medium-8 columns content">
  <h2>Cart</h2>
  <ul>
  <?php
  $total=0;
    foreach($cart as $item):
      $total+=($item['qty'] * $item->Products['price']);
  ?>
    <li>
      <?= empty($item->Products['image']) ? '' : $this->Html->image($item->Products['image'], ['style'=>'max-width:100px;']); ?>
      <strong><?= $item->Products['name'];?></strong>
      <?= $this->Form->number('qty', ['value'=>$item['qty'], 'placeholder'=>'order qty', 'min'=>1, 'class'=>'cart_qty', 'data-price'=>$item->Products['price']]);?>
      <span class="price"><?= $this->Number->currency($item->Products['price'], 'USD');?></span>

      <?= $this->Html->link('View', ['controller'=>'Products', 'action'=>'view', $item->Products['id']]);?>
      <?= $this->Html->link('Delete', ['action'=>'delCart', $item['id']]);?>
    </li>
  <?php endforeach;?>
  </ul>

  <div>
    <label><strong>TOTAL</strong></label>
    <span id="cart_total"><?= $this->Number->currency($total, 'USD');?></span>
  </div>
</div>

<script>
  $(document).ready(function(){
    $('.cart_qty').keyup(function(e){
      var total=0;
      $('.cart_qty').each(function(key, item){
        var price=$(this).attr('data-price');
        var qty=$(item).val();
        total += (price * qty);
      });
      total = '$'+total.toLocaleString('en-US', {minimumFractionDigits: 2});
      $('#cart_total').html(total);
    });
  });
</script>
