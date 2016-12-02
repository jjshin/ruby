
<div class="col-md-1"></div>
<div class="col-md-10">
    <center>
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add New User') ?></legend>
        <?php
            $this->Form->templates([
                'dateWidget' => '{{day}}{{month}}{{year}}{{hour}}{{minute}}{{second}}{{meridian}}']);
            $this->Form->create($user); ?>
                 <?php
                     echo $this->Form->input('email');
                     echo $this->Form->input('password');
                     echo $this->Form->select('user_type', array('member' => 'member', 'staff' => 'staff'), ['empty' => 'Select the user type'])."<p>";
                     echo $this->Form->input('fname', array('label' => 'First Name'));
                     echo $this->Form->input('lname', array('label' => 'Last Name'));
                     echo $this->Form->input('dob', array( '
                                        label' => 'Date of birth',
                                        'empty' => true,
                                        'dateFormat' => 'DD-MMM-YYYY',
                                        'minYear' => date('Y') - 70,
                                        'maxYear' => date('Y') - 15 ));
                     echo $this->Form->input('address1', array('label' => 'Property Address'));
                     echo $this->Form->input('address2', array('label' => 'Secondary Address'));
                     echo $this->Form->input('suburb', array('label' => 'Suburb'));
                     echo $this->Form->input('state', array('label' => 'State'));
                     echo $this->Form->input('pcode', array('label' => 'Postcode'));
                     echo $this->Form->input('contactno', array('label' => 'Contact Number'));
                     echo $this->Form->input('country_id', ['options' => $countries, 'empty' => true]);
                 ?>
        </fieldset>
        <br>

        <?= $this->Form->submit('Submit', array('class' => 'button')); ?>
        <?= $this->Form->end(); ?>
    </center>
</div>
<div class="col-md-1"></div>
