<?php


abstract class BaseEmailContact extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $email_id;


	
	protected $remark;


	
	protected $send_status;


	
	protected $receiver_name;


	
	protected $receiver_country;


	
	protected $receiver_email;


	
	protected $receiver_contact;


	
	protected $status_code;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getEmailId()
	{

		return $this->email_id;
	}

	
	public function getRemark()
	{

		return $this->remark;
	}

	
	public function getSendStatus()
	{

		return $this->send_status;
	}

	
	public function getReceiverName()
	{

		return $this->receiver_name;
	}

	
	public function getReceiverCountry()
	{

		return $this->receiver_country;
	}

	
	public function getReceiverEmail()
	{

		return $this->receiver_email;
	}

	
	public function getReceiverContact()
	{

		return $this->receiver_contact;
	}

	
	public function getStatusCode()
	{

		return $this->status_code;
	}

	
	public function setEmailId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->email_id !== $v) {
			$this->email_id = $v;
			$this->modifiedColumns[] = EmailContactPeer::EMAIL_ID;
		}

	} 
	
	public function setRemark($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->remark !== $v) {
			$this->remark = $v;
			$this->modifiedColumns[] = EmailContactPeer::REMARK;
		}

	} 
	
	public function setSendStatus($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->send_status !== $v) {
			$this->send_status = $v;
			$this->modifiedColumns[] = EmailContactPeer::SEND_STATUS;
		}

	} 
	
	public function setReceiverName($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->receiver_name !== $v) {
			$this->receiver_name = $v;
			$this->modifiedColumns[] = EmailContactPeer::RECEIVER_NAME;
		}

	} 
	
	public function setReceiverCountry($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->receiver_country !== $v) {
			$this->receiver_country = $v;
			$this->modifiedColumns[] = EmailContactPeer::RECEIVER_COUNTRY;
		}

	} 
	
	public function setReceiverEmail($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->receiver_email !== $v) {
			$this->receiver_email = $v;
			$this->modifiedColumns[] = EmailContactPeer::RECEIVER_EMAIL;
		}

	} 
	
	public function setReceiverContact($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->receiver_contact !== $v) {
			$this->receiver_contact = $v;
			$this->modifiedColumns[] = EmailContactPeer::RECEIVER_CONTACT;
		}

	} 
	
	public function setStatusCode($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->status_code !== $v) {
			$this->status_code = $v;
			$this->modifiedColumns[] = EmailContactPeer::STATUS_CODE;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->email_id = $rs->getInt($startcol + 0);

			$this->remark = $rs->getString($startcol + 1);

			$this->send_status = $rs->getString($startcol + 2);

			$this->receiver_name = $rs->getString($startcol + 3);

			$this->receiver_country = $rs->getString($startcol + 4);

			$this->receiver_email = $rs->getString($startcol + 5);

			$this->receiver_contact = $rs->getString($startcol + 6);

			$this->status_code = $rs->getString($startcol + 7);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 8; 
		} catch (Exception $e) {
			throw new PropelException("Error populating EmailContact object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(EmailContactPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			EmailContactPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(EmailContactPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	protected function doSave($con)
	{
		$affectedRows = 0; 		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = EmailContactPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setEmailId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += EmailContactPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			$this->alreadyInSave = false;
		}
		return $affectedRows;
	} 
	
	protected $validationFailures = array();

	
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


			if (($retval = EmailContactPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = EmailContactPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getEmailId();
				break;
			case 1:
				return $this->getRemark();
				break;
			case 2:
				return $this->getSendStatus();
				break;
			case 3:
				return $this->getReceiverName();
				break;
			case 4:
				return $this->getReceiverCountry();
				break;
			case 5:
				return $this->getReceiverEmail();
				break;
			case 6:
				return $this->getReceiverContact();
				break;
			case 7:
				return $this->getStatusCode();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = EmailContactPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getEmailId(),
			$keys[1] => $this->getRemark(),
			$keys[2] => $this->getSendStatus(),
			$keys[3] => $this->getReceiverName(),
			$keys[4] => $this->getReceiverCountry(),
			$keys[5] => $this->getReceiverEmail(),
			$keys[6] => $this->getReceiverContact(),
			$keys[7] => $this->getStatusCode(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = EmailContactPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setEmailId($value);
				break;
			case 1:
				$this->setRemark($value);
				break;
			case 2:
				$this->setSendStatus($value);
				break;
			case 3:
				$this->setReceiverName($value);
				break;
			case 4:
				$this->setReceiverCountry($value);
				break;
			case 5:
				$this->setReceiverEmail($value);
				break;
			case 6:
				$this->setReceiverContact($value);
				break;
			case 7:
				$this->setStatusCode($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = EmailContactPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setEmailId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setRemark($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setSendStatus($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setReceiverName($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setReceiverCountry($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setReceiverEmail($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setReceiverContact($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setStatusCode($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(EmailContactPeer::DATABASE_NAME);

		if ($this->isColumnModified(EmailContactPeer::EMAIL_ID)) $criteria->add(EmailContactPeer::EMAIL_ID, $this->email_id);
		if ($this->isColumnModified(EmailContactPeer::REMARK)) $criteria->add(EmailContactPeer::REMARK, $this->remark);
		if ($this->isColumnModified(EmailContactPeer::SEND_STATUS)) $criteria->add(EmailContactPeer::SEND_STATUS, $this->send_status);
		if ($this->isColumnModified(EmailContactPeer::RECEIVER_NAME)) $criteria->add(EmailContactPeer::RECEIVER_NAME, $this->receiver_name);
		if ($this->isColumnModified(EmailContactPeer::RECEIVER_COUNTRY)) $criteria->add(EmailContactPeer::RECEIVER_COUNTRY, $this->receiver_country);
		if ($this->isColumnModified(EmailContactPeer::RECEIVER_EMAIL)) $criteria->add(EmailContactPeer::RECEIVER_EMAIL, $this->receiver_email);
		if ($this->isColumnModified(EmailContactPeer::RECEIVER_CONTACT)) $criteria->add(EmailContactPeer::RECEIVER_CONTACT, $this->receiver_contact);
		if ($this->isColumnModified(EmailContactPeer::STATUS_CODE)) $criteria->add(EmailContactPeer::STATUS_CODE, $this->status_code);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(EmailContactPeer::DATABASE_NAME);

		$criteria->add(EmailContactPeer::EMAIL_ID, $this->email_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getEmailId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setEmailId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setRemark($this->remark);

		$copyObj->setSendStatus($this->send_status);

		$copyObj->setReceiverName($this->receiver_name);

		$copyObj->setReceiverCountry($this->receiver_country);

		$copyObj->setReceiverEmail($this->receiver_email);

		$copyObj->setReceiverContact($this->receiver_contact);

		$copyObj->setStatusCode($this->status_code);


		$copyObj->setNew(true);

		$copyObj->setEmailId(NULL); 
	}

	
	public function copy($deepCopy = false)
	{
				$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new EmailContactPeer();
		}
		return self::$peer;
	}

} 