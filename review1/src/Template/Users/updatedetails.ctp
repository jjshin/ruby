<div class="col-md-1"></div>
<div class="col-md-10">
    <br>
    <center>
    <?= $this->Form->create($user) ?>
        <fieldset>
            <legend><?= __('Update your contact details') ?></legend>
            <br>
            <?php
                echo $this->Form->input('email', array('label' => 'Email: (updating your email also changes your login email)'));
                echo $this->Form->input('fname', array('label' => 'First Name:'));
                echo $this->Form->input('lname', array('label' => 'Last Name:'));
                echo $this->Form->input('dob', array( 'label' => 'Date of birth:', 'empty'=>true,
                              'dateFormat' => 'DD-MMM-YYYY',
                              'minYear' => date('Y') - 70,
                              'maxYear' => date('Y') - 15 ));
                echo $this->Form->input('address1', array('label' => 'Property Address:'));
                echo $this->Form->input('address2', array('label' => 'Secondary Address: (optional)'));
                echo $this->Form->input('suburb', array('label' => 'Suburb:'));
                echo $this->Form->input('state', array('label' => 'State:'));
                echo $this->Form->input('pcode', array('label' => 'Postcode:'));
                echo $this->Form->input('contactno', array('label' => 'Contact Number:'));
                echo $this->Form->input('country_id',['options' => $countries]);
            ?>
        </fieldset>
    <br>
        <?= $this->Form->button(__('Submit')) ?>
    </center>
</div>
<div class="col-md-1"></div>

