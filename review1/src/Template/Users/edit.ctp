<div class="col-md-1"></div>
<div class="col-md-10">
    <?= $this->Form->create($user) ?>
    <center>
    <fieldset>
        <legend><?= __('Edit User') ?></legend>
        <?php
                    echo $this->Form->input('email');
                    echo $this->Form->input('password');
                    echo $this->Form->input('fname', array('label' => 'First Name'));
                    echo $this->Form->input('lname', array('label' => 'Last Name'));
                    echo $this->Form->input('dob', array( 'label' => 'Date of birth', 'empty'=>true,
                                'dateFormat' => 'DD-MMM-YYYY',
                                'minYear' => date('Y') - 70,
                                'maxYear' => date('Y') - 15 ));
                    echo $this->Form->input('address1', array('label' => 'Property Address'));
                    echo $this->Form->input('address2', array('label' => 'Secondary Address'));
                    echo $this->Form->input('suburb', array('label' => 'Suburb'));
                    echo $this->Form->input('state', array('label' => 'State'));
                    echo $this->Form->input('pcode', array('label' => 'Postcode'));
                    echo $this->Form->input('contactno', array('label' => 'Contact Number'));
                    echo $this->Form->input('country_id',['options' => $countries]);

                    echo $this->Form->input('products._ids', array('label' => 'Allowed Restricted Products. (Hold ctrl/command to select multiple)'), ['options' => $products]);

                    if (($user->user_type == 'member') || ($user->user_type == 'staff')) {
                        $arrCategory=array("member"=>"member","staff"=>"staff");
                        echo $this->Form->input('user_type', array('options'=>$arrCategory,
                                                'label'=> 'Member Role',
                                                'empty'=>' '));
                    }
                ?>
    </fieldset>
    <br>

    <?= $this->Form->button(__('Submit')) ?>
    </center>
</div>

<div class="col-md-1"></div>