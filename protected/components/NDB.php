<?php

/**
* LIST for non DB items
*
*/
class NDB{
	

	protected static $poQuestions = array('reimbursement'=>'Reimbursement',
											'purchase_order'=>'Purchase Order',
											'to_be_billed'=>'To be Billed',
											'charge_account'=>'Charge Accountr',
											'credit_card'=>'Credit Card',
											'petty_cash'=>'Petty Cash');

	protected static $activeInactive = array('active'=>'active','inactive'=>'inactive');


	public static function getList($type){
		return self::$$type;
	}

	public static function getValue($key,$type)
	{
		$var = self::$$type;

		return $var[$key];
	}
}