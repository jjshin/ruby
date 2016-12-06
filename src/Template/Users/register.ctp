<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Rubys Gifts | Registration';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('register.css') ?>
    <?= $this->Html->css('fonts.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

	<script type="text/javascript" src="<?php echo  $this->request->webroot;?>js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo  $this->request->webroot;?>js/slick.min.js"></script>
  <script type="text/javascript" src="<?php echo  $this->request->webroot;?>js/dropdown.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css">
    <!-- Latest compiled and minified CSS -->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="<?php echo  $this->request->webroot;?>css/slick.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo  $this->request->webroot;?>css/slick-theme.css"/>
    <?= $this->Html->css('custom.css') ?>
</head>
<body>

<div class="container clearfix ind-common-pad">
	<center>
	<h1>Registration</h1>
</center>
    <div class="row">
      <div class="col-lg-6 about-sec-content pull-right">
        <div class="section_header2 common">
          <h3><center>Contact Details</center></h3>
        </div>
				<div>
					<center>
					<fieldset>
    				<?= $this->Form->create($user, ['class' => 'form-group']) ?>
    				<?php
							echo $this->Form->input('phone', ['class' => 'form-control','style'=> 'width:400px']);
			        echo $this->Form->input('address1', ['class' => 'form-control','style'=> 'width:400px']);
			        echo $this->Form->input('address2', ['class' => 'form-control','style'=> 'width:400px']);
			        echo $this->Form->input('suburb', ['class' => 'form-control','style'=> 'width:400px']);
			        echo $this->Form->input('state', ['class' => 'form-control','style'=> 'width:400px']);
			        echo $this->Form->input('postcode', ['class' => 'form-control','style'=> 'width:400px']);
      			?>
					</center>
				</div>


</div>
<div class="col-lg-6 about-sec-content">
		<div class="section_header2 common">
				<h3><center>Login Details</center></h3>
		</div>
		<div>
			<center>
			<fieldset>
				<?= $this->Form->create($user, ['class' => 'form-group']) ?>
				<?php
					echo $this->Form->input('email', ['class' => 'form-control','style'=> 'width:400px']);
					echo $this->Form->input('password', ['class' => 'form-control','style'=> 'width:400px']);
					echo $this->Form->input('firstname', ['label'=>'First Name','class' => 'form-control','style'=> 'width:400px']);
					echo $this->Form->input('lastname', ['label'=>'Last Name','class' => 'form-control','style'=> 'width:400px']);
					?>
			</center>
	</div>


</div>
<div class="col-lg-6 about-sec-content">
		<div class="section_header2 common">
				<h3><center>Optional Details</center></h3>
		</div>
		<div>
			<center>
			<fieldset>
				<?= $this->Form->create($user, ['class' => 'form-group']) ?>
				<?php
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
					?>
				</center>

		</div>


	</div>
</div>
<center>
<?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info']) ?>
<?= $this->Form->end() ?>
</center>
<br>
