<br>
<br>
<h3>Shopping Cart</h3>
<br>
<div class = "row">
  <div class = "col-md-8">
    <div class>
    <table class "table" cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product) : ?>
                <tr>
                    <td><?= $this->Html->link($product['item']['name'], array('controller' => 'products', 'action' => 'item', $product['item']['id'] )) ?></td>
                    <td><?= $product['qty'] ?></td>
                    <td>$ <?= $product['price'] ?></td>
                    <td>
                        <button type="button" class="btn btn-default btn-sm">
                        <?= $this->Html->link('', ['action' => 'addToCart', $product['item']['id']], array ('class' => 'glyphicon glyphicon-plus lg')) ?>
                        </button>
                        <button type="button" class="btn btn-default btn-sm">
                        <?= $this->Html->link('', ['action' => 'getReduceByOne', $product['item']['id']], array ('class' => 'glyphicon glyphicon-minus')) ?>
                        </button>
                        <button type="button" class="btn btn-default btn-sm">
                        <?= $this->Html->link('', ['action' => 'removeItem', $product['item']['id']], array ('class' => 'glyphicon glyphicon-trash')) ?>
                        </button>

                    </td>
                </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
        <?= $this->Html->link('Empty cart', ['action' => 'clearCart']) ?>
      </div>
  </div>
  <div class = "col-md-4">
    <h3>Price Details</h3>
    <br>
    <div>


	    <div class="price-details">

			<span>Sub Total</span>
                <span class="total">$ <?= $totalPrice ?></span>
			<span>Delivery Charges</span>
			    <span class="total">$ <?= $shippingCost ?></span>
		    <div class="clearfix"></div>
		</div>
		<h4 class="last-price">GRAND TOTAL</h4>
			<span class="total final">$
          <?= $totalPrice + $shippingCost ?>
			</span>
        <?= $this->Html->Link('Checkout', array('controller' => 'users', 'action' => 'checkout'), array('class' => 'btn btn-default'));?>
			<div class="clearfix"></div>
  </div>
</div>
