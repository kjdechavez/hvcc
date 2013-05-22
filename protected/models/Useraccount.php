<?php

/**
 * This is the model class for table "useraccount".
 *
 * The followings are the available columns in table 'useraccount':
 * @property integer $useraccount_id
 * @property integer $usertype_id
 * @property string $firstname
 * @property string $lastname
 * @property string $username
 * @property string $password
 * @property string $status
 */
class Useraccount extends BaseModel
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Useraccount the static model class
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
		return 'useraccount';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('usertype_id, firstname, lastname, username, password, status', 'required'),
			array('usertype_id', 'numerical', 'integerOnly'=>true),
			array('firstname, lastname, username, password', 'length', 'max'=>100),
			array('status', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('useraccount_id, usertype_id, firstname, lastname, username, password, status', 'safe', 'on'=>'search'),
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
			'po' => array(self::HAS_MANY, 'PurchaseOrder', 'created_by'),
			'usertype' => array(self::BELONGS_TO, 'Usertype', 'usertype_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'useraccount_id' => 'Useraccount',
			'usertype_id' => 'Account Type',
			'firstname' => 'Firstname',
			'lastname' => 'Lastname',
			'username' => 'Username',
			'password' => 'Password',
			'status' => 'Status',
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

		$criteria->compare('useraccount_id',$this->useraccount_id);
		$criteria->compare('usertype_id',$this->usertype_id);
		$criteria->compare('firstname',$this->firstname,true);
		$criteria->compare('lastname',$this->lastname,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}