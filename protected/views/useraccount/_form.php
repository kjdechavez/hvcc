<?php
/* @var $this UseraccountController */
/* @var $model Useraccount */
/* @var $form CActiveForm */

$usertype = array('2'=>'pastor','3'=>'accountant','4'=>'enduser');
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'useraccount-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'firstname'); ?>
		<?php echo $form->textField($model,'firstname',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'firstname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lastname'); ?>
		<?php echo $form->textField($model,'lastname',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'lastname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'usertype_id'); ?>
		<input type="text" value="<?php echo ($model->usertype_id) ? $usertype[$model->usertype_id]:'enduser';?>" disabled/>
		<?php echo $form->hiddenField($model,'usertype_id', array('value' => ($model->usertype_id) ? $model->usertype_id:'4'));?>
		<?php echo $form->error($model,'usertype_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->dropDownList($model,'status',  NDB::getList('activeInactive'), array('empty' => 'Select Project'));?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

	<input type="hidden" name="oldpassword" id="oldpassword" value="<?php echo $model->password?>" />
<?php $this->endWidget(); ?>

</div><!-- form -->