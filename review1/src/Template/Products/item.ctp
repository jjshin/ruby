<!DOCTYPE html>
<html>
<head>
    <?= $this->element('head') ?>
</head>

<div class="container">

    <br>
    <br>
    <div class="col-md-4">
        <?php echo $this->Html->image('images/' . $product->image, ['class' => 'img-thumbnail img-responsive']); ?>
    </div>


    <div class="col-md-8">
        <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
            <li class="active">
                <a data-toggle="tab" href="#details">Details</a>
            </li>
            <li>
                <a data-toggle="tab" href="#recipes">Recipes</a>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade in active" id="details">
                <br>

                <?php if ($product->outOfStock):?>
                    <span class="label label-danger">Out of stock</span>
                <?php elseif ($product->hasLowStock): ?>
                    <span class="label label-warning">Low stock</span>
                <?php else:?>
                    <span class="label label-success">In stock</span>
                <?php endif; ?>

                <br>
                <br>
                <h3><?= h($product->name); ?></h3>
                <br>
                <h4><?= h($product->brand->name); ?></h4>
                <br>
                <?= h($product->desc); ?>
                <br>
                <br>
                <?= $this->Number->currency(h($product->price)); ?>
                <br>
                <br>
                <br>
                <?php if($product->restricted): ?>
                    <?php if(($restricted->exists(['Restrictedproducts.user_id' => $uid])) && ($restricted->exists(['Restrictedproducts.product_id' => $product->id]))):?>
                        <?= $this->Html->Link(__('Add To Cart'), ['action' => 'addToCart', $product->id], array('class' => 'btn btn-default btn-sm')); ?>
                    <?php else:?>
                        <?= $this->Html->Link(__('Enquire Now'), ['controller' => 'medicinal', 'action' => 'enquire', $product->id], array('class' => 'btn btn-default btn-sm')); ?>
                    <?php endif;?>
                <?php else:?>
                    <?= $this->Html->Link(__('Add To Cart'), ['action' => 'addToCart', $product->id], array('class' => 'btn btn-default btn-sm')); ?>
                <?php endif;?>
            </div>

            <div class="tab-pane fade" id="recipes">
                <br>
                <br>
                <td><?php echo "$product->recipes"; ?></td>
            </div>
            </div>
         </div>
    </div>
</div>
