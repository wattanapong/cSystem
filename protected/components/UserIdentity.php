<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	
	const ERROR_USERNAME_NOT_ACTIVE = 3;
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	
	private $_id;
	
public function authenticate()
	{
		$record=Member::model()->findByAttributes(array('username'=>$this->username));
		if($record===null || $record->password!==md5($this->password))
			//$this->errorCode=self::ERROR_USERNAME_INVALID;
			//$this->errorCode=self::ERROR_PASSWORD_INVALID;
		$this->errorCode=self::ERROR_USERNAME_INVALID.self::ERROR_PASSWORD_INVALID;
		else
		{
			if ($record->status == 0 ) $this->errorCode = self::ERROR_USERNAME_NOT_ACTIVE;//"";
			else{
			$this->_id=$record->id;
			$this->setState('id', $record->id);
			$this->setState('title', $record->name);
			//$this->setState('role', $record->username);
			$this->errorCode=self::ERROR_NONE;
			}
			//$_rule = Privilege::model()->findByAttributes(array('id'=>$this->_id));
		}
		return !$this->errorCode;
	}
}