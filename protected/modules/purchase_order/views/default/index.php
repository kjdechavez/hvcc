<?php

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#purchase-order-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'purchase-order-grid',
	'dataProvider'=>$model->search($_GET['t']),
	'filter'=>$model,
	'columns'=>array(
		
		'department',
		'department_head',
		'name',
		'date_created',
		
		//'description',
		
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}',
			'header'=>'View',
			'buttons'=>array(
				'view'=>array(
					'label'=>'View Form',
					'url'=>'Yii::app()->createUrl("purchase_order/read/view/id/$data->purchase_order_id")',
				)),
		),

	),
		'template'=>'{items}{summary}{pager}',
)); ?>
