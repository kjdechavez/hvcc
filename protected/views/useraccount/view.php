<?php
/* @var $this UseraccountController */
/* @var $model Useraccount */

$this->breadcrumbs=array(
	'Useraccounts'=>array('index'),
	$model->useraccount_id,
);

$this->menu=array(
	array('label'=>'Create Useraccount', 'url'=>array('create')),
	array('label'=>'Update Useraccount', 'url'=>array('update', 'id'=>$model->useraccount_id)),
	array('label'=>'Manage Useraccount', 'url'=>array('admin')),
);
?>

<h1>View Useraccount #<?php echo $model->useraccount_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'firstname',
		'lastname',
		'username',
		'password',
		array(
			'type'=>'raw',
			'value'=>$model->usertype->description,
	        'name'=>'Usertype',
		),
		'status',
	),
)); ?>
