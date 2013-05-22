<?php

/**
 * This is the model class for table "reject_reasons_list".
 *
 * The followings are the available columns in table 'reject_reasons_list':
 * @property integer $reject_reasons_list_id
 * @property integer $purchase_order_id
 * @property string $reason
 * @property integer $rejected_by
 * @property string $date_rejected
 */
class RejectReasonsList extends BaseModel
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return RejectReasonsList the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'reject_reasons_list';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('purchase_order_id, reason, rejected_by', 'required'),
			array('purchase_order_id, rejected_by', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('reject_reasons_list_id, purchase_order_id, reason, rejected_by, date_rejected', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'useraccount' => array(self::BELONGS_TO, 'Useraccount', 'rejected_by'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'reject_reasons_list_id' => 'Reject Reasons List',
			'purchase_order_id' => 'Purchase Order',
			'reason' => 'Reason',
			'rejected_by' => 'Rejected By',
			'date_rejected' => 'Date Rejected',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('reject_reasons_list_id',$this->reject_reasons_list_id);
		$criteria->compare('purchase_order_id',$this->purchase_order_id);
		$criteria->compare('reason',$this->reason,true);
		$criteria->compare('rejected_by',$this->rejected_by);
		$criteria->compare('date_rejected',$this->date_rejected,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}