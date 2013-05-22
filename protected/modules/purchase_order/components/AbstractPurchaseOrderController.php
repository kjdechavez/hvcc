<?php

class AbstractPurchaseOrderController extends BaseController{

	public $layout='//layouts/column2';

	public function init()
	{
		$userType = Yii::app()->user->getState('description'); 

		parent::init();
		
		if ($userType == 'superuser')
		{	
			$this->menu = array(
				array('label'=>'Purchase Order', 'url'=>Yii::app()->createUrl('purchase_order/create')),
				array('label'=>'For Approval', 'url'=>array('/purchase_order?t=sup')),	
			);
		}

		if ($userType == 'pastor')
		{	
			$this->menu = array(
				array('label'=>'For Approval', 'url'=>array('/purchase_order?t=ptr')),	
			);
		}

		if ($userType == 'accountant')
		{	
			$this->menu = array(
				array('label'=>'For Approval', 'url'=>array('/purchase_order?t=act')),	
			);
		}

		if ($userType == 'enduser')
		{	
			$this->menu = array(
				array('label'=>'Purchase Order', 'url'=>Yii::app()->createUrl('purchase_order/create')),
				array('label'=>'Approved List', 'url'=>array('/purchase_order?t=a')),	
				array('label'=>'Rejected List', 'url'=>array('/purchase_order?t=r')),	
				array('label'=>'Pending List', 'url'=>array('/purchase_order?t=p')),
			);
		}

	}

}// end of class