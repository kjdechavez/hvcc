<?php

class DefaultController extends AbstractPurchaseOrderController
{
	public function actionIndex()
	{
		$model=new PurchaseOrder('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PurchaseOrder']))
			$model->attributes=$_GET['PurchaseOrder'];

		$this->render('index',array(
			'model'=>$model,
		));
	}
}