<?php
/* @var $this UseraccountController */
/* @var $data Useraccount */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('useraccount_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->useraccount_id), array('view', 'id'=>$data->useraccount_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('firstname')); ?>:</b>
	<?php echo CHtml::encode($data->firstname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lastname')); ?>:</b>
	<?php echo CHtml::encode($data->lastname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::encode($data->username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usertype_id')); ?>:</b>
	<?php echo CHtml::encode($data->usertype_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />


</div>