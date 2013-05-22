<style type="text/css">
	div#questions label{display: inline-block;}
</style>

<h2>Purchase Order</h2>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'purchase-order-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'department'); ?>
		<?php echo $form->textField($model,'department',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'department'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'department_head'); ?>
		<?php echo $form->textField($model,'department_head',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'department_head'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_created'); ?>
		<?php echo $form->textField($model,'date_created', array('value'=> date('Y-m-d'), 'class'=>'fordatepicker', 'id'=>'datepicker', 'readonly'=>'readonly')); ?>
		<?php echo $form->error($model,'date_created'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>100,'value'=> Yii::app()->user->getState('firstname').' '.Yii::app()->user->getState('lastname'))); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'total'); ?>
		<?php echo $form->textField($model,'total', array('onkeyup'=>"evalidate(this.id,'NM','C')")); ?>
		<?php echo $form->error($model,'total'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'check_requisition'); ?>
		<?php echo $form->checkBox($model,'check_requisition', array('id'=>'chk','class'=>'CCheckBoxColumn', 'value'=>1)); ?>
		<?php echo $form->error($model,'check_requisition'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'check_needed_by'); ?>
		<?php echo $form->textField($model,'check_needed_by',array('size'=>60,'maxlength'=>100, 'class'=>'fordatepicker', 'id'=>'cnb', 'disabled'=>'disabled')); ?>
		<?php echo $form->error($model,'check_needed_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'payable_to'); ?>
		<?php echo $form->textField($model,'payable_to',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'payable_to'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textArea($model,'address',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'question'); ?>
		<div id="questions"><?php echo $form->radioButtonList($model, 'question', NDB::getList('poQuestions'),array('class'=>'questions')); ?></div>
		<?php echo $form->error($model,'question'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'petty_cash_amount'); ?>
		<?php echo $form->textField($model,'petty_cash_amount', array('disabled'=>'disabled', 'id'=>'petty_cash_amount','onkeyup'=>"evalidate(this.id,'NM','C')")); ?>
		<?php echo $form->error($model,'petty_cash_amount'); ?>
	</div>

	<div class="row">
		<?php echo $form->hiddenField($model,'created_by', array('value'=> Yii::app()->user->getState('useraccount_id'))); ?>
	</div>
	<hr>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script>
	$(function() {

		$( "#datepicker" ).datepicker({
			changeMonth: true,
			changeYear: true,
		});
			
	});

	$('#chk').click(function(){
		
		if(this.checked){
			$('#cnb').val('').removeAttr('disabled');
		}
		else{
			$('#cnb').val('').attr('disabled', 'disabled');
		}
	});

	$('.questions').click(function(){

		if($(this).val() == 'petty_cash'){
			$('#petty_cash_amount').removeAttr('disabled');
		}
		else{
			$('#petty_cash_amount').val('').attr('disabled','disabled');
		}

	});

	$('.disable').click(function(){

		$('.pca').attr('readonly', true);
		$('.pca').val('');

	});
</script>