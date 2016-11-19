
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Total</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="col-sm-8 col-md-6">
                        <div class="media">
                            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="http://icons.iconarchive.com/icons/custom-icon-design/flatastic-2/72/product-icon.png" style="width: 72px; height: 72px;"> </a>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="#">Product name</a></h4>
                                <h5 class="media-heading"> by <a href="#">Brand name</a></h5>
                            </div>
                        </div></td>
                        <td class="col-sm-1 col-md-1" style="text-align: center">
                        <input type="email" class="form-control" id="exampleInputEmail1" value="3">
                        </td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>$4.87</strong></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>$14.61</strong></td>
                        <td class="col-sm-1 col-md-1">
                        <button type="button" class="btn btn-danger">
                            <span class="glyphicon glyphicon-remove"></span> Remove
                        </button></td>
                    </tr>
                    <tr>
                        <td class="col-md-6">
                        <div class="media">
                            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="http://icons.iconarchive.com/icons/custom-icon-design/flatastic-2/72/product-icon.png" style="width: 72px; height: 72px;"> </a>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="#">Product name</a></h4>
                                <h5 class="media-heading"> by <a href="#">Brand name</a></h5>
                                <span>Status: </span><span class="text-warning"><strong>Leaves warehouse in 2 - 3 weeks</strong></span>
                            </div>
                        </div></td>
                        <td class="col-md-1" style="text-align: center">
                        <input type="email" class="form-control" id="exampleInputEmail1" value="2">
                        </td>
                        <td class="col-md-1 text-center"><strong>$4.99</strong></td>
                        <td class="col-md-1 text-center"><strong>$9.98</strong></td>
                        <td class="col-md-1">
                        <button type="button" class="btn btn-danger">
                            <span class="glyphicon glyphicon-remove"></span> Remove
                        </button></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Subtotal</h5></td>
                        <td class="text-right"><h5><strong>$24.59</strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Estimated shipping</h5></td>
                        <td class="text-right"><h5><strong>$6.94</strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h3>Total</h3></td>
                        <td class="text-right"><h3><strong>$31.53</strong></h3></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>
                        <button type="button" class="btn btn-default">
                            <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                        </button></td>
                        <td>
                        <button type="button" class="btn btn-success">
                            Checkout <span class="glyphicon glyphicon-play"></span>
                        </button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- <div class="products index large-9 medium-8 columns content">
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
</script> -->
