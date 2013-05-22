<?php
/* @var $this UseraccountController */
/* @var $model Useraccount */

$this->breadcrumbs=array(
	'Useraccounts'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Useraccount', 'url'=>array('index')),
	array('label'=>'Create Useraccount', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#useraccount-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Useraccounts</h1>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'useraccount-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'firstname',
		'lastname',
		'username',
		'password',
		array(
			'header'=>'User Type',
			'name'=>'usertype_id',
		  	'value' =>'$data->usertype->description',
		),
		
		'status',
		
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
