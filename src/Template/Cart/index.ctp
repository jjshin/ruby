<div class="products index large-9 medium-8 columns content">
  <h2>Cart</h2>
  <?php echo $this->Form->create(null, ['url'=>['controller'=>'Orders', 'action'=>'index']]);?>
  <ul>
  <?php
  $total=0;
    //echo '<pre>'; print_r($cart); exit;
    foreach($cart as $item):
      $total+=($item['qty'] * $item->Products['sale_price']);
  ?>
    <li>
      <?= empty($item->Products['image']) ? '' : $this->Html->image($item->Products['image'], ['style'=>'max-width:100px;']); ?>
      <strong><?= $item->Products['name'];?></strong>
      <?= $this->Form->hidden('product_id[]', ['value'=>$item->Products['id']]);?>
      <?= $this->Form->hidden('cart_id[]', ['value'=>$item['id']]);?>
      <?= $this->Form->number('qty[]', ['value'=>$item['qty'], 'placeholder'=>'order qty', 'min'=>1, 'class'=>'cart_qty', 'data-price'=>$item->Products['sale_price']]);?>
      <span class="price"><?= $this->Number->currency($item->Products['sale_price'], 'USD');?></span>
      <span class="sub_total"><?= $this->Number->currency($item->Products['sale_price']*$item['qty'], 'USD');?></span>

      <?= $this->Html->link('View', ['controller'=>'Products', 'action'=>'view', $item->Products['id']]);?>
      <?= $this->Html->link('Delete', ['action'=>'delCart', $item['id']]);?>
    </li>
  <?php endforeach;?>
  </ul>

  <div>
    <label><strong>TOTAL</strong></label>
    <span id="cart_total"><?= $this->Number->currency($total, 'USD');?></span>
  </div>

  <div>
    <?php
        if ( $cart->count() > 0 ) {
            echo $this->FOrm->button('Check out', ['class'=>'btn btn-success']);
        } else {
            echo $this->Form->button('Check out', ['class'=>'btn btn-success disabled']);
        }
        echo $this->Form->end();
     ?>
</div>

<script>
  $(document).ready(function(){
    $('.cart_qty').bind('keyup blur', function(e){
      var total=0;
      $('.cart_qty').each(function(key, item){
        var price=$(this).attr('data-price');
        var qty=$(item).val();
        var sub_total=(price*qty);
        $(this).parent().children('.sub_total').html('$'+sub_total.toLocaleString('en-US', {minimumFractionDigits: 2}));
        total += sub_total;
      });
      total = '$'+total.toLocaleString('en-US', {minimumFractionDigits: 2});
      $('#cart_total').html(total);
    });
  });
</script>
