<?php

/**
 * This is the model class for table "purchase_order".
 *
 * The followings are the available columns in table 'purchase_order':
 * @property integer $purchase_order_id
 * @property string $purchase_order_no
 * @property string $department
 * @property string $department_head
 * @property string $date_created
 * @property string $name
 * @property string $description
 * @property double $total
 * @property integer $check_requisition
 * @property string $check_needed_by
 * @property string $payable_to
 * @property string $address
 * @property string $question
 * @property double $petty_cash_amount
 * @property integer $created_by
 */
class PurchaseOrder extends BaseModel
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

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'purchase_order';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('department, department_head, date_created, name, total,  payable_to, address, question, created_by, description', 'required'),
			array('check_requisition, created_by', 'numerical', 'integerOnly'=>true),
			array('total, petty_cash_amount', 'numerical'),
			array('purchase_order_no, payable_to', 'length', 'max'=>250),
			array('department', 'length', 'max'=>150),
			array('department_head, name, check_needed_by, question', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('purchase_order_id, purchase_order_no, department, department_head, date_created, name, description, total, check_requisition, check_needed_by, payable_to, address, question, petty_cash_amount, created_by, accounting_rejected_by, pastor_rejected_by', 'safe', 'on'=>'search'),
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
			'useraccount' => array(self::BELONGS_TO, 'Useraccount', 'created_by'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'purchase_order_id' => 'Purchase Order',
			'purchase_order_no' => 'Purchase Order No',
			'department' => 'Department',
			'department_head' => 'Department Head',
			'date_created' => 'Date Created',
			'name' => 'Name',
			'description' => 'Description',
			'total' => 'Total',
			'check_requisition' => 'Check Requisition',
			'check_needed_by' => 'Check Needed By',
			'payable_to' => 'Payable To',
			'address' => 'Address',
			'question' => 'Question',
			'petty_cash_amount' => 'Petty Cash Amount',
			'created_by' => 'Created By',
			'accounting_rejected_by' => 'Accounting Rejected By',
			'pastor_rejected_by' => 'Pastor Rejected By',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search($type)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('purchase_order_id',$this->purchase_order_id);
		$criteria->compare('purchase_order_no',$this->purchase_order_no,true);
		$criteria->compare('department',$this->department,true);
		$criteria->compare('department_head',$this->department_head,true);
		$criteria->compare('date_created',$this->date_created,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('total',$this->total);
		$criteria->compare('check_requisition',$this->check_requisition);
		$criteria->compare('check_needed_by',$this->check_needed_by,true);
		$criteria->compare('payable_to',$this->payable_to,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('question',$this->question,true);
		$criteria->compare('petty_cash_amount',$this->petty_cash_amount);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('accounting_rejected_by',$this->accounting_rejected_by);
		$criteria->compare('pastor_rejected_by',$this->pastor_rejected_by);
		

		if($type == 'a')
		{
			$criteria->compare('status','approved');
		}

		else if($type == 'r')
		{
			$criteria->compare('status','reject');
		}

		else if($type == 'p')
		{
			$criteria->compare('status',array('accounting','pastor'));
		}

		else if($type == 'ptr')
		{
			$criteria->compare('status','pastor');
		}

		else if($type == 'act')
		{
			$criteria->compare('status','accounting');
		}


		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}