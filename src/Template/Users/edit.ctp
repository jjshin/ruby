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
            echo $this->Form->input('firstname', ['label'=>'First Name ']);
            echo $this->Form->input('lastname', ['label'=>'Last Name ']);
            //echo $this->Form->input('username');
            // echo $this->Form->input('password');

            // echo $this->Form->input('email');
        echo $this->Form->input('gender', array('label' => 'Gender', 'type' => 'select',
            'options' => array('Male'=>'Male','Female'=>'Female')));
        echo $this->Form->input('dob',
            array(
                'type' => 'date',
                'label' => 'Date of Birth:',
                'dateFormat' => 'MDY',
                'empty' => array(
                    'month' => 'Month',
                    'day'   => 'Day',
                    'year'  => 'Year'
                ),
                'minYear' => date('Y')-130,
                'maxYear' => date('Y'),
                'options' => array('1','2')
            )
        );
            echo $this->Form->input('phone');
			//  echo $this->Form->select(
			// 	'role',
			// 	array('label'=>'Role', 1=>'Admin', 10=>'User'),
			// 	['empty' => '(choose one)']
			// );


      //  echo $this->Form->input('gender',['class' => 'form-control']);
       // echo $this->Form->input('dob',['class'=>'form-control']);
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
