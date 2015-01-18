<?php


abstract class BaseTmpMt4Account extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $mt4_id;


	
	protected $fullname;


	
	protected $email;


	
	protected $mt4_username;


	
	protected $mt4_password;


	
	protected $status_code;


	
	protected $created_by;


	
	protected $created_on;


	
	protected $updated_by;


	
	protected $updated_on;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getMt4Id()
	{

		return $this->mt4_id;
	}

	
	public function getFullname()
	{

		return $this->fullname;
	}

	
	public function getEmail()
	{

		return $this->email;
	}

	
	public function getMt4Username()
	{

		return $this->mt4_username;
	}

	
	public function getMt4Password()
	{

		return $this->mt4_password;
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

	
	public function setMt4Id($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->mt4_id !== $v) {
			$this->mt4_id = $v;
			$this->modifiedColumns[] = TmpMt4AccountPeer::MT4_ID;
		}

	} 
	
	public function setFullname($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->fullname !== $v) {
			$this->fullname = $v;
			$this->modifiedColumns[] = TmpMt4AccountPeer::FULLNAME;
		}

	} 
	
	public function setEmail($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->email !== $v) {
			$this->email = $v;
			$this->modifiedColumns[] = TmpMt4AccountPeer::EMAIL;
		}

	} 
	
	public function setMt4Username($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->mt4_username !== $v) {
			$this->mt4_username = $v;
			$this->modifiedColumns[] = TmpMt4AccountPeer::MT4_USERNAME;
		}

	} 
	
	public function setMt4Password($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->mt4_password !== $v) {
			$this->mt4_password = $v;
			$this->modifiedColumns[] = TmpMt4AccountPeer::MT4_PASSWORD;
		}

	} 
	
	public function setStatusCode($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->status_code !== $v) {
			$this->status_code = $v;
			$this->modifiedColumns[] = TmpMt4AccountPeer::STATUS_CODE;
		}

	} 
	
	public function setCreatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = TmpMt4AccountPeer::CREATED_BY;
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
			$this->modifiedColumns[] = TmpMt4AccountPeer::CREATED_ON;
		}

	} 
	
	public function setUpdatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = TmpMt4AccountPeer::UPDATED_BY;
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
			$this->modifiedColumns[] = TmpMt4AccountPeer::UPDATED_ON;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->mt4_id = $rs->getInt($startcol + 0);

			$this->fullname = $rs->getString($startcol + 1);

			$this->email = $rs->getString($startcol + 2);

			$this->mt4_username = $rs->getString($startcol + 3);

			$this->mt4_password = $rs->getString($startcol + 4);

			$this->status_code = $rs->getString($startcol + 5);

			$this->created_by = $rs->getInt($startcol + 6);

			$this->created_on = $rs->getTimestamp($startcol + 7, null);

			$this->updated_by = $rs->getInt($startcol + 8);

			$this->updated_on = $rs->getTimestamp($startcol + 9, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 10; 
		} catch (Exception $e) {
			throw new PropelException("Error populating TmpMt4Account object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(TmpMt4AccountPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			TmpMt4AccountPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(TmpMt4AccountPeer::CREATED_ON))
    {
      $this->setCreatedOn(time());
    }

    if ($this->isModified() && !$this->isColumnModified(TmpMt4AccountPeer::UPDATED_ON))
    {
      $this->setUpdatedOn(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(TmpMt4AccountPeer::DATABASE_NAME);
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
					$pk = TmpMt4AccountPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setMt4Id($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += TmpMt4AccountPeer::doUpdate($this, $con);
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


			if (($retval = TmpMt4AccountPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TmpMt4AccountPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getMt4Id();
				break;
			case 1:
				return $this->getFullname();
				break;
			case 2:
				return $this->getEmail();
				break;
			case 3:
				return $this->getMt4Username();
				break;
			case 4:
				return $this->getMt4Password();
				break;
			case 5:
				return $this->getStatusCode();
				break;
			case 6:
				return $this->getCreatedBy();
				break;
			case 7:
				return $this->getCreatedOn();
				break;
			case 8:
				return $this->getUpdatedBy();
				break;
			case 9:
				return $this->getUpdatedOn();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TmpMt4AccountPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getMt4Id(),
			$keys[1] => $this->getFullname(),
			$keys[2] => $this->getEmail(),
			$keys[3] => $this->getMt4Username(),
			$keys[4] => $this->getMt4Password(),
			$keys[5] => $this->getStatusCode(),
			$keys[6] => $this->getCreatedBy(),
			$keys[7] => $this->getCreatedOn(),
			$keys[8] => $this->getUpdatedBy(),
			$keys[9] => $this->getUpdatedOn(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TmpMt4AccountPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setMt4Id($value);
				break;
			case 1:
				$this->setFullname($value);
				break;
			case 2:
				$this->setEmail($value);
				break;
			case 3:
				$this->setMt4Username($value);
				break;
			case 4:
				$this->setMt4Password($value);
				break;
			case 5:
				$this->setStatusCode($value);
				break;
			case 6:
				$this->setCreatedBy($value);
				break;
			case 7:
				$this->setCreatedOn($value);
				break;
			case 8:
				$this->setUpdatedBy($value);
				break;
			case 9:
				$this->setUpdatedOn($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TmpMt4AccountPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setMt4Id($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFullname($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setEmail($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMt4Username($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMt4Password($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setStatusCode($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCreatedBy($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCreatedOn($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setUpdatedBy($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setUpdatedOn($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(TmpMt4AccountPeer::DATABASE_NAME);

		if ($this->isColumnModified(TmpMt4AccountPeer::MT4_ID)) $criteria->add(TmpMt4AccountPeer::MT4_ID, $this->mt4_id);
		if ($this->isColumnModified(TmpMt4AccountPeer::FULLNAME)) $criteria->add(TmpMt4AccountPeer::FULLNAME, $this->fullname);
		if ($this->isColumnModified(TmpMt4AccountPeer::EMAIL)) $criteria->add(TmpMt4AccountPeer::EMAIL, $this->email);
		if ($this->isColumnModified(TmpMt4AccountPeer::MT4_USERNAME)) $criteria->add(TmpMt4AccountPeer::MT4_USERNAME, $this->mt4_username);
		if ($this->isColumnModified(TmpMt4AccountPeer::MT4_PASSWORD)) $criteria->add(TmpMt4AccountPeer::MT4_PASSWORD, $this->mt4_password);
		if ($this->isColumnModified(TmpMt4AccountPeer::STATUS_CODE)) $criteria->add(TmpMt4AccountPeer::STATUS_CODE, $this->status_code);
		if ($this->isColumnModified(TmpMt4AccountPeer::CREATED_BY)) $criteria->add(TmpMt4AccountPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(TmpMt4AccountPeer::CREATED_ON)) $criteria->add(TmpMt4AccountPeer::CREATED_ON, $this->created_on);
		if ($this->isColumnModified(TmpMt4AccountPeer::UPDATED_BY)) $criteria->add(TmpMt4AccountPeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(TmpMt4AccountPeer::UPDATED_ON)) $criteria->add(TmpMt4AccountPeer::UPDATED_ON, $this->updated_on);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(TmpMt4AccountPeer::DATABASE_NAME);

		$criteria->add(TmpMt4AccountPeer::MT4_ID, $this->mt4_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getMt4Id();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setMt4Id($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setFullname($this->fullname);

		$copyObj->setEmail($this->email);

		$copyObj->setMt4Username($this->mt4_username);

		$copyObj->setMt4Password($this->mt4_password);

		$copyObj->setStatusCode($this->status_code);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setCreatedOn($this->created_on);

		$copyObj->setUpdatedBy($this->updated_by);

		$copyObj->setUpdatedOn($this->updated_on);


		$copyObj->setNew(true);

		$copyObj->setMt4Id(NULL); 
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
			self::$peer = new TmpMt4AccountPeer();
		}
		return self::$peer;
	}

} 