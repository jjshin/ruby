<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <?php echo $this->Form->create(null, ['url'=>['controller'=>'Orders', 'action'=>'index']]);?>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th colspan="2">Product</th>
                        <th>Quantity</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Total</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total=0;
                      //echo '<pre>'; print_r($cart); exit;
                      foreach($cart as $item):
                        $total+=($item['qty'] * $item->Products['sale_price']);
                    ?>
                    <tr>
                        <td class="col-sm-1 col-md-1">
                            <?= $this->Form->hidden('product_id[]', ['value'=>$item->Products['id']]);?>
                            <?= $this->Form->hidden('cart_id[]', ['value'=>$item['id']]);?>
                            <?= empty($item->Products['image']) ? '' : $this->Html->image($item->Products['image'], ['style'=>'width:72px; height:72px;', 'class'=>'media-object', 'url'=>['controller'=>'Products', 'action'=>'view', $item->Products['id']]]); ?>
                        </td>
                        <td class="col-sm-7 col-md-7">
                            <h4 class="media-heading"><?= $this->Html->link($item->Products['name'], ['controller'=>'Products', 'action'=>'view', $item->Products['id']]);?></h4>
                            <h5 class="media-heading"> by <?= $this->Html->link($item->Brands['name'], ['controller'=>'Products', 'action'=>'brands', $item->Brands['id']]);?></h5>
                        </td>
                        <td class="col-sm-1 col-md-1" style="text-align: center">
                            <?= $this->Form->number('qty[]', ['value'=>$item['qty'], 'placeholder'=>'order qty', 'min'=>1, 'class'=>'form-control cart_qty', 'data-price'=>$item->Products['sale_price']]);?>
                        </td>
                        <td class="col-sm-1 col-md-1 text-center">
                            <strong class="price"><?= $this->Number->currency($item->Products['sale_price'], 'USD');?></strong>
                        </td>
                        <td class="col-sm-1 col-md-1 text-center">
                            <strong class="sub_total"><?= $this->Number->currency($item->Products['sale_price']*$item['qty'], 'USD');?></strong>
                        </td>
                        <td class="col-sm-1 col-md-1">
                            <?= $this->Html->link('Remove', ['action'=>'delCart', $item['id']], ['class'=>'btn btn-danger']);?>
                        </td>
                    </tr>
                    <?php endforeach;?>

                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Total</h5></td>
                        <td class="text-right"><h5><strong id="cart_total"><?= $this->Number->currency($total, 'USD');?></strong></h5></td>
                    </tr>

                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>
                        <!-- <button type="button" class="btn btn-default">
                            <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                        </button></td> -->
                        <td>
                            <?php
                                if ( $cart->count() > 0 ) {
                                    echo $this->FOrm->button('Checkout', ['class'=>'btn btn-success']);
                                } else {
                                    echo $this->Form->button('Checkout', ['class'=>'btn btn-success disabled']);
                                }
                             ?>
                        </td>
                    </tr>
                </tbody>
            </table>
            <?php echo $this->Form->end();?>
        </div>
    </div>
</div>


<script>
  $(document).ready(function(){
    $('.cart_qty').bind('keyup blur', function(e){
      var total=0;
      $('.cart_qty').each(function(key, item){
        var price=$(this).attr('data-price');
        var qty=$(item).val();
        var sub_total=(price*qty);
        $(this).parent().parent().children().children('.sub_total').html('$'+sub_total.toLocaleString('en-US', {minimumFractionDigits: 2}));
        total += sub_total;
      });
      total = '$'+total.toLocaleString('en-US', {minimumFractionDigits: 2});
      $('#cart_total').html(total);
    });
  });
</script>
