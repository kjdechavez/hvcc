<?php 

class ReadController extends AbstractPurchaseOrderController {

	public function actionView($id)
	{

		$model=$this->loadModel($id);

		$userType = Yii::app()->user->getState('description');

		$findReason = RejectReasonsList::model()->findAll();

		$findPurchaseId = PurchaseOrder::model()->findAllBySql("SELECT purchase_order_id FROM purchase_order WHERE status = 'reject' ");

		$purchase_order_id = PurchaseOrder::model()->findAllByAttributes(array('purchase_order_id'=>$id));

		
		if(isset($_POST['reject_act']))
		{
			$model = PurchaseOrder::model()->findByPk($_POST['purchase_order_id']);

			$model->status = "reject";

			if($model->save(false))
			{	
				EmailType::factory()->set_options('reject_act','enduser',$model->created_by)->send_email();

				$result = RejectList::model()->insert_reason($_POST);

				$this->redirect(Yii::app()->request->baseUrl.'/index.php/purchase_order?t=act');	
			}
		}

		if(isset($_POST['approve_act']))
		{	
			$model = PurchaseOrder::model()->findByPk($_POST['purchase_order_id']);

			$model->status = "pastor";

			if($model->save(false))
			{
				EmailType::factory()->set_options('forapp_ptr','pastor')->send_email();
	
				$this->redirect(Yii::app()->request->baseUrl.'/index.php/purchase_order?t=act');	
				
			}
		}


		if(isset($_POST['reject_ptr']))
		{	
			$model = PurchaseOrder::model()->findByPk($_POST['purchase_order_id']);

			$model->status = "reject";

			if($model->save(false))
			{	
				
				EmailType::factory()->set_options('reject_ptr','enduser',$model->created_by)->send_email();

				$result = RejectList::model()->insert_reason($_POST);

				$this->redirect(Yii::app()->request->baseUrl.'/index.php/purchase_order?t=ptr');	
			}
		}

		if(isset($_POST['approve_ptr']))
		{
			$model = PurchaseOrder::model()->findByPk($_POST['purchase_order_id']);

			$model->status = "approved";

			if($model->save(false))
			{
				$this->redirect(Yii::app()->request->baseUrl.'/index.php/purchase_order?t=ptr');	
			}
		}

		

		$this->render('view',array(
			'model'=>$model,
			'findReason'=>$findReason,
			'findPurchaseId'=>$findPurchaseId,
			'purchase_order_id'=>$purchase_order_id,
		));
	}

	public function loadModel($id)
	{
		$model=PurchaseOrder::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}


} //end of class