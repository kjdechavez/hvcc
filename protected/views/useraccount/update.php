<?php
/* @var $this UseraccountController */
/* @var $model Useraccount */

$this->breadcrumbs=array(
	'Useraccounts'=>array('index'),
	$model->useraccount_id=>array('view','id'=>$model->useraccount_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Useraccount', 'url'=>array('index')),
	array('label'=>'Create Useraccount', 'url'=>array('create')),
	array('label'=>'View Useraccount', 'url'=>array('view', 'id'=>$model->useraccount_id)),
	array('label'=>'Manage Useraccount', 'url'=>array('admin')),
);
?>

<h1>Update Useraccount <?php echo $model->useraccount_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>