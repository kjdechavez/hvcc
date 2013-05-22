<?php

class RejectList extends RejectReasonsList
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PurchaseOrder the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function insert_reason($post)
	{
		$this->isNewRecord = true;

		$this->reject_reasons_list_id = null;

		$this->purchase_order_id = $post['purchase_order_id'];

		$this->reason = $post['reason'];

		$this->rejected_by = Yii::app()->user->getState('useraccount_id');
		
		return $this->save();

	}
}