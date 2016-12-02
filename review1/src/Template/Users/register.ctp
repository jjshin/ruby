<!DOCTYPE html>
<html>
<head>
    <?= $this->element('head') ?>
</head>

<body>
<br>
<div class="index large-4 medium-4 large-offset-4 medium-offset-4 columns">
  <div class="panel">
    <h2 class="text-center">New User Registration</h2>
    <center>
        <p>Please make sure all fields are filled out.</p>
        <br>
    </center>

    <center>

     <?= $this->Form->create($user) ?>
        <?php
            $this->Form->templates([
                    'dateWidget' => '{{day}}{{month}}{{year}}{{hour}}{{minute}}{{second}}{{meridian}}']);
            $this->Form->create($user); ?>
            <?php
                echo $this->Form->input('email');
                echo $this->Form->input('password');
                echo $this->Form->input('fname', array('label' => 'First Name'));
                echo $this->Form->input('lname', array('label' => 'Last Name'));
                echo $this->Form->input('dob', array( 'label' => 'Date of birth:', 'empty'=>true,
                                              'dateFormat' => 'DD-MMM-YYYY',
                                              'minYear' => date('Y') - 70,
                                              'maxYear' => date('Y') - 15 ));
                echo $this->Form->input('address1', array('label' => 'Main Address'));
                echo $this->Form->input('address2', array('label' => 'Secondary Address'));
                echo $this->Form->input('suburb', array('label' => 'Suburb'));
                echo $this->Form->input('state', array('label' => 'State'));
                echo $this->Form->input('pcode', array('label' => 'Postcode'));
                echo $this->Form->input('contactno', array('label' => 'Contact Number'));
                echo $this->Form->input('country_id', ['options' => $countries, 'empty' => true]);
            ?>
            <br>
        <?= $this->Form->submit('Register Now', array('class' => 'button')); ?>
     <?= $this->Form->end(); ?>
    </center>
  </div>

    </center>
  </div>
</div>
</body>
</html>
