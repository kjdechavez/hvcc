<?php

/**
* Components to send email to diff users
* @author jeremuelraymundo@gmail.com
* @codinystyle FactoryPattern
*/

class EmailType{
	

	protected $viewType;

	protected $senderName;

	protected $_receiver;


	public function __construct(){
		$this->_receiver = 'enduser';
	}


	public static function factory()
	{
		return new EmailType;
	}

	public function set_options($type,$receiver,$id=null)
	{
		$this->viewType = $type;

		if($receiver=='pastor')
		{
			$this->_receiver = Useraccount::model()->findByAttributes(array('usertype_id'=>2));
		}
		else if($receiver=='accountant')
		{
			$this->_receiver = Useraccount::model()->findByAttributes(array('usertype_id'=>3));
		}
		else if($receiver=='enduser')
		{
			$this->_receiver = Useraccount::model()->findByPk($id);
		}
		
		return $this;

	}
	/**
	* Send email
	* @return bool
	*/
	public function send_email()
	{	

		// load mailer extension
		Yii::import('ext.YiiMailer.YiiMailer');

		$mail = new YiiMailer;

		$mail->From = 'noreply@hvcc.com.ph';

		$mail->FromName = 'HVCC';

		$mail->Subject = '[HVCC] New Purchase Order';


		$mail->Body = CController::renderInternal(Yii::app()->basePath . '/views/email/'.$this->viewType.'.php', array('model' => $this->_receiver), true);

		$mail->AddAddress($this->_receiver['username']);

		$mail->IsHTML(true);

		return $mail->Send();

	}


}//end of class