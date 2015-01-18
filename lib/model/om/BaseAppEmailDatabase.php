<?php


abstract class BaseAppEmailDatabase extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $email_id;


	
	protected $email;


	
	protected $status_code;


	
	protected $created_by;


	
	protected $created_on;


	
	protected $updated_by;


	
	protected $updated_on;


	
	protected $remark;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getEmailId()
	{

		return $this->email_id;
	}

	
	public function getEmail()
	{

		return $this->email;
	}

	
	public function getStatusCode()
	{

		return $this->status_code;
	}

	
	public function getCreatedBy()
	{

		return $this->created_by;
	}

	
	public function getCreatedOn($format = 'Y-m-d H:i:s')
	{

		if ($this->created_on === null || $this->created_on === '') {
			return null;
		} elseif (!is_int($this->created_on)) {
						$ts = strtotime($this->created_on);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [created_on] as date/time value: " . var_export($this->created_on, true));
			}
		} else {
			$ts = $this->created_on;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getUpdatedBy()
	{

		return $this->updated_by;
	}

	
	public function getUpdatedOn($format = 'Y-m-d H:i:s')
	{

		if ($this->updated_on === null || $this->updated_on === '') {
			return null;
		} elseif (!is_int($this->updated_on)) {
						$ts = strtotime($this->updated_on);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [updated_on] as date/time value: " . var_export($this->updated_on, true));
			}
		} else {
			$ts = $this->updated_on;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getRemark()
	{

		return $this->remark;
	}

	
	public function setEmailId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->email_id !== $v) {
			$this->email_id = $v;
			$this->modifiedColumns[] = AppEmailDatabasePeer::EMAIL_ID;
		}

	} 
	
	public function setEmail($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->email !== $v) {
			$this->email = $v;
			$this->modifiedColumns[] = AppEmailDatabasePeer::EMAIL;
		}

	} 
	
	public function setStatusCode($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->status_code !== $v) {
			$this->status_code = $v;
			$this->modifiedColumns[] = AppEmailDatabasePeer::STATUS_CODE;
		}

	} 
	
	public function setCreatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = AppEmailDatabasePeer::CREATED_BY;
		}

	} 
	
	public function setCreatedOn($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [created_on] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->created_on !== $ts) {
			$this->created_on = $ts;
			$this->modifiedColumns[] = AppEmailDatabasePeer::CREATED_ON;
		}

	} 
	
	public function setUpdatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = AppEmailDatabasePeer::UPDATED_BY;
		}

	} 
	
	public function setUpdatedOn($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [updated_on] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->updated_on !== $ts) {
			$this->updated_on = $ts;
			$this->modifiedColumns[] = AppEmailDatabasePeer::UPDATED_ON;
		}

	} 
	
	public function setRemark($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->remark !== $v) {
			$this->remark = $v;
			$this->modifiedColumns[] = AppEmailDatabasePeer::REMARK;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->email_id = $rs->getInt($startcol + 0);

			$this->email = $rs->getString($startcol + 1);

			$this->status_code = $rs->getString($startcol + 2);

			$this->created_by = $rs->getInt($startcol + 3);

			$this->created_on = $rs->getTimestamp($startcol + 4, null);

			$this->updated_by = $rs->getInt($startcol + 5);

			$this->updated_on = $rs->getTimestamp($startcol + 6, null);

			$this->remark = $rs->getString($startcol + 7);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 8; 
		} catch (Exception $e) {
			throw new PropelException("Error populating AppEmailDatabase object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(AppEmailDatabasePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			AppEmailDatabasePeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(AppEmailDatabasePeer::CREATED_ON))
    {
      $this->setCreatedOn(time());
    }

    if ($this->isModified() && !$this->isColumnModified(AppEmailDatabasePeer::UPDATED_ON))
    {
      $this->setUpdatedOn(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(AppEmailDatabasePeer::DATABASE_NAME);
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
					$pk = AppEmailDatabasePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setEmailId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += AppEmailDatabasePeer::doUpdate($this, $con);
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


			if (($retval = AppEmailDatabasePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AppEmailDatabasePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getEmailId();
				break;
			case 1:
				return $this->getEmail();
				break;
			case 2:
				return $this->getStatusCode();
				break;
			case 3:
				return $this->getCreatedBy();
				break;
			case 4:
				return $this->getCreatedOn();
				break;
			case 5:
				return $this->getUpdatedBy();
				break;
			case 6:
				return $this->getUpdatedOn();
				break;
			case 7:
				return $this->getRemark();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AppEmailDatabasePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getEmailId(),
			$keys[1] => $this->getEmail(),
			$keys[2] => $this->getStatusCode(),
			$keys[3] => $this->getCreatedBy(),
			$keys[4] => $this->getCreatedOn(),
			$keys[5] => $this->getUpdatedBy(),
			$keys[6] => $this->getUpdatedOn(),
			$keys[7] => $this->getRemark(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AppEmailDatabasePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setEmailId($value);
				break;
			case 1:
				$this->setEmail($value);
				break;
			case 2:
				$this->setStatusCode($value);
				break;
			case 3:
				$this->setCreatedBy($value);
				break;
			case 4:
				$this->setCreatedOn($value);
				break;
			case 5:
				$this->setUpdatedBy($value);
				break;
			case 6:
				$this->setUpdatedOn($value);
				break;
			case 7:
				$this->setRemark($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AppEmailDatabasePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setEmailId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setEmail($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setStatusCode($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCreatedBy($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCreatedOn($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setUpdatedBy($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setUpdatedOn($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setRemark($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(AppEmailDatabasePeer::DATABASE_NAME);

		if ($this->isColumnModified(AppEmailDatabasePeer::EMAIL_ID)) $criteria->add(AppEmailDatabasePeer::EMAIL_ID, $this->email_id);
		if ($this->isColumnModified(AppEmailDatabasePeer::EMAIL)) $criteria->add(AppEmailDatabasePeer::EMAIL, $this->email);
		if ($this->isColumnModified(AppEmailDatabasePeer::STATUS_CODE)) $criteria->add(AppEmailDatabasePeer::STATUS_CODE, $this->status_code);
		if ($this->isColumnModified(AppEmailDatabasePeer::CREATED_BY)) $criteria->add(AppEmailDatabasePeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(AppEmailDatabasePeer::CREATED_ON)) $criteria->add(AppEmailDatabasePeer::CREATED_ON, $this->created_on);
		if ($this->isColumnModified(AppEmailDatabasePeer::UPDATED_BY)) $criteria->add(AppEmailDatabasePeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(AppEmailDatabasePeer::UPDATED_ON)) $criteria->add(AppEmailDatabasePeer::UPDATED_ON, $this->updated_on);
		if ($this->isColumnModified(AppEmailDatabasePeer::REMARK)) $criteria->add(AppEmailDatabasePeer::REMARK, $this->remark);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(AppEmailDatabasePeer::DATABASE_NAME);

		$criteria->add(AppEmailDatabasePeer::EMAIL_ID, $this->email_id);

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

		$copyObj->setEmail($this->email);

		$copyObj->setStatusCode($this->status_code);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setCreatedOn($this->created_on);

		$copyObj->setUpdatedBy($this->updated_by);

		$copyObj->setUpdatedOn($this->updated_on);

		$copyObj->setRemark($this->remark);


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
			self::$peer = new AppEmailDatabasePeer();
		}
		return self::$peer;
	}

} 