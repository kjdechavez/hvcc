<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		
		$record=Useraccount::model()->find(array(
		  'select'=>'t.useraccount_id, t.usertype_id,t.username,t.lastname,t.firstname',
		  'condition'=>'t.username=:username AND t.password=:password',
		  'params'=>array(':username'=>$this->username,':password'=>SecurityHelper::ecrypt(($this->password))),
		));
		
		if($record)
		{
			$result = Usertype::model()->findBySql("SELECT description FROM usertype WHERE usertype_id = '$record->usertype_id' ");

			$this->setState('useraccount_id', $record->useraccount_id);
			$this->setState('username', $record->username);
			$this->setState('lastname', $record->lastname);
			$this->setState('firstname', $record->firstname);
			$this->setState('usertype_id', $record->usertype_id);
			$this->setState('description', $result->description);

			$this->errorCode = self::ERROR_NONE;
			
		}
		else
		{
			$this->errorCode = self::ERROR_PASSWORD_INVALID;
			$this->errorCode = self::ERROR_USERNAME_INVALID;
			$this->errorMessage = 'Incorrect username or password.';
		}

		return ! $this->errorCode;
	}
}