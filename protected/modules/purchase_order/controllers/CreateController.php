<?php

class CreateController extends AbstractPurchaseOrderController
{

	public function actionIndex()
	{

		EmailType::factory()->set_options('forapp_act','accountant')->send_email();
		
		$model=new PurchaseOrder;	

		$this->styles = array('../css/jqueryui/jquery.ui.all.css');

		$this->scripts = array( 
			'jqueryui/jquery.ui.datepicker.js',
	        'datepickercaller.js',
 			'jqueryui/jquery.ui.core.js',
			'jqueryui/jquery.ui.widget.js',
			'eVal.js',
		);

		if(isset($_POST['PurchaseOrder']))
		{
			$model->attributes=$_POST['PurchaseOrder'];
			
			if($model->save()){
				EmailType::factory()->set_options('forapp_act','accountant')->send_email();
			}
				
		}

		$this->render('index',array(
			'model'=>$model,
		));
	}
}