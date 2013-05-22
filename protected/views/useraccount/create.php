<?php
/* @var $this UseraccountController */
/* @var $model Useraccount */

$this->breadcrumbs=array(
	'Useraccounts'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Useraccount', 'url'=>array('index')),
	array('label'=>'Manage Useraccount', 'url'=>array('admin')),
);
?>

<h1>Create Useraccount</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>