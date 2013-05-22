
<h1>View PurchaseOrder</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'purchase_order_id',
		'department',
		'department_head',
		'date_created',
		'name',
		'description',
		'total',
		array(
			'type'=>'raw',
			'value'=>($model->check_requisition==1) ? 'Yes':'No',
	        'name'=>'Check Requisition',
		),
		'check_needed_by',
		'payable_to',
		'address',
		array(
			'type'=>'raw',
			'value'=>NDB::getValue($model->question,'poQuestions'),
	        'name'=>'Question',
		),
		'petty_cash_amount',
		array(
			'type'=>'raw',
			'value'=>$model->useraccount->username,
	        'name'=>'Created By',
		),

	),
)); ?>


<hr>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'purchase-order-form',
	'enableAjaxValidation'=>false,
)); ?>

<?php if(Yii::app()->user->getState('description') != 'enduser') :?>

	<input type="hidden" value="<?php echo Yii::app()->user->getState('useraccount_id');?>" name="useraccount_id">
	<input type="hidden" value="<?php echo $model->purchase_order_id?>" name="purchase_order_id">

	<?php if(Yii::app()->user->getState('description') == 'pastor') :?>

		<div align="center">
			<input type="submit" id="approve" class="approve" name="approve_ptr" value="Approve"><br />
		</div>

	<?php endif;?>

	<?php if(Yii::app()->user->getState('description') == 'accountant') :?>

		<div align="center">
			<input type="submit" id="approve" class="approve" name="approve_act" value="Approve"><br />
		</div>

	<?php endif;?>

	<input type="checkbox" value="0" class="chk" id="chk"> Reject
	<div style="color:gray" class="label"><b>Reasons:</b>
	</div>

	<textarea align="left" id="reason" class="reason" name="reason" cols="50" rows="7" readonly / ></textarea>
	
	<?php if(Yii::app()->user->getState('description') == 'pastor') :?>

		<div align="left">
			<input type="submit" id="reject" class="reject" name="reject_ptr" value="Reject" disabled />
		</div>

	<?php endif;?>

	<?php if(Yii::app()->user->getState('description') == 'accountant') :?>

		<div align="left">
			<input type="submit" id="reject" class="reject" name="reject_act" value="Reject" disabled />
		</div>

	<?php endif;?>

<?php elseif(Yii::app()->user->getState('description') == 'enduser') :?>

	<?php if($model->status == 'reject') :?>

	<b>Reject Status:</b><br />
	
		<?php foreach($purchase_order_id as $poi) :?>

			<?php $reason = RejectReasonsList::model()->findAllByAttributes(array('purchase_order_id'=>$poi->purchase_order_id))?>
			
			<?php foreach($reason as $r) :?>
				
				By: <?php echo $r->useraccount->firstname . ' ' . $r->useraccount->lastname?> <br />
				Reason: <?php echo nl2br($r->reason);?>

			<?php endforeach;?>

		<?php endforeach;?>

	<?php endif;?>

<?php endif;?>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script>
	$('#chk').click(function(){
		var value = $('#chk').val();
		if(value == 0)
		{
			$('.reason').attr('readonly', false);
			$('.label').removeAttr('style');
			$('#approve').attr('disabled', true);
			$('#reject').removeAttr('disabled');
			$('#chk').val(1);
		}

		if(value == 1)
		{
			$('.reason').attr('readonly', 1);
			$('.reason').val('');
			$('.label').attr('style', true);
			$('#approve').removeAttr('disabled');
			$('#reject').attr('disabled', true);

			$('#chk').val(0);
		}
	});
</script>


