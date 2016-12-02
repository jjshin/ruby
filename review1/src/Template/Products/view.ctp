
<div class="col-md-4">
    <br>
    <br>
    <br>
    <h3><?= h($product->name) ?></h3>
    <br>
    <center><?php echo $this->Html->image('images/' . $product->image); ?></center>
</div>
<div class="col-md-7">
    <br>
    <br>
    <br>
    <br>

    <table class="vertical-table">
      <p>
        <tr>
          <th><?= __('Name') ?></th>
          <td><?= h($product->name) ?></td>
        </tr>
        <tr>
          <th><?= __('Brand') ?></th>
          <td><?= h($product->brand->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($product->desc) ?></td>
        </tr>

        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($product->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Price') ?></th>
            <td><?= $this->Number->currency($product->price) ?></td>
        </tr>
        <tr>
            <th><?= __('Quantity') ?></th>
            <td><?= $this->Number->format($product->qty) ?></td>
        </tr>
        <tr>
            <th><?= __('Weight') ?></th>
            <td><?= $this->Number->format($product->weight) ?></td>
        </tr>
        <tr>
             <th><?= __('Restricted') ?></th>
             <td><?php if ($product->restricted):?>
                    <?= "yes"; ?>
                 <?php else:?>
                    <?= "no"; ?></td>
                 <?php endif;?>
             </td>
        </tr>
        <tr>
            <th><?= __('Recipes') ?></th>
            <td><?= "$product->recipes" ?></td>
        </tr>
    </table>
    <br>

    <div class="related">
        <h4><?= __('Related Categories') ?></h4>
        <?php if (!empty($product->categories)): ?>
        <table cellpadding="0" cellspacing="0">
            <?php foreach ($product->categories as $categories): ?>
            <tr>
                <td><?= h($categories->name) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
