<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Edit User') ?></legend>
        <?php
            echo $this->Form->input('firstname');
            echo $this->Form->input('lastname');
            //echo $this->Form->input('username');
            echo $this->Form->input('password');
            echo $this->Form->input('email');
            echo $this->Form->input('phone');
			 echo $this->Form->select(
				'role',
				array(1=>'Admin', 10=>'User'),
				['empty' => '(choose one)']
			);

      echo $this->Form->input('address1', ['class' => 'form-control']);
      echo $this->Form->input('address2', ['class' => 'form-control']);
      echo $this->Form->input('suburb', ['class' => 'form-control']);
      echo $this->Form->input('state', ['class' => 'form-control']);
      echo $this->Form->input('postcode', ['class' => 'form-control']);

//      echo $this->Form->input('subscribe', ['type'=>'checkbox', 'value'=>1, 'label'=>'I would like to receive emails about special promos and offers from Ruby\'s Gifts.']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
