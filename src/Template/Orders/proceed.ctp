<div>
  <h2>Order</h2>
  <p>Order completed</p>
  <?= $this->Html->link('Back to Main', ['controller'=>'Main', 'action'=>'index'], ['class'=>'btn btn-info']);?>
  <?= $this->Html->link('Check my order', ['controller'=>'Myshop', 'action'=>'order'], ['class'=>'btn btn-success']);?>
</div>
