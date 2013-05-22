<?php
/* @var $this UseraccountController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Useraccounts',
);

$this->menu=array(
	array('label'=>'Create Useraccount', 'url'=>array('create')),
	array('label'=>'Manage Useraccount', 'url'=>array('admin')),
);
?>

<h1>Useraccounts</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
