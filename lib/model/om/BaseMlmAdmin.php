<?php


abstract class BaseMlmAdmin extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $admin_id;


	
	protected $admin_code;


	
	protected $user_id;


	
	protected $status_code;


	
	protected $admin_role;


	
	protected $created_by;


	
	protected $created_on;


	
	protected $updated_by;


	
	protected $updated_on;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getAdminId()
	{

		return $this->admin_id;
	}

	
	public function getAdminCode()
	{

		return $this->admin_code;
	}

	
	public function getUserId()
	{

		return $this->user_id;
	}

	
	public function getStatusCode()
	{

		return $this->status_code;
	}

	
	public function getAdminRole()
	{

		return $this->admin_role;
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

	
	public function setAdminId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->admin_id !== $v) {
			$this->admin_id = $v;
			$this->modifiedColumns[] = MlmAdminPeer::ADMIN_ID;
		}

	} 
	
	public function setAdminCode($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->admin_code !== $v) {
			$this->admin_code = $v;
			$this->modifiedColumns[] = MlmAdminPeer::ADMIN_CODE;
		}

	} 
	
	public function setUserId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->user_id !== $v) {
			$this->user_id = $v;
			$this->modifiedColumns[] = MlmAdminPeer::USER_ID;
		}

	} 
	
	public function setStatusCode($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->status_code !== $v) {
			$this->status_code = $v;
			$this->modifiedColumns[] = MlmAdminPeer::STATUS_CODE;
		}

	} 
	
	public function setAdminRole($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->admin_role !== $v) {
			$this->admin_role = $v;
			$this->modifiedColumns[] = MlmAdminPeer::ADMIN_ROLE;
		}

	} 
	
	public function setCreatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = MlmAdminPeer::CREATED_BY;
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
			$this->modifiedColumns[] = MlmAdminPeer::CREATED_ON;
		}

	} 
	
	public function setUpdatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = MlmAdminPeer::UPDATED_BY;
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
			$this->modifiedColumns[] = MlmAdminPeer::UPDATED_ON;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->admin_id = $rs->getInt($startcol + 0);

			$this->admin_code = $rs->getString($startcol + 1);

			$this->user_id = $rs->getInt($startcol + 2);

			$this->status_code = $rs->getString($startcol + 3);

			$this->admin_role = $rs->getString($startcol + 4);

			$this->created_by = $rs->getInt($startcol + 5);

			$this->created_on = $rs->getTimestamp($startcol + 6, null);

			$this->updated_by = $rs->getInt($startcol + 7);

			$this->updated_on = $rs->getTimestamp($startcol + 8, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 9; 
		} catch (Exception $e) {
			throw new PropelException("Error populating MlmAdmin object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MlmAdminPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			MlmAdminPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(MlmAdminPeer::CREATED_ON))
    {
      $this->setCreatedOn(time());
    }

    if ($this->isModified() && !$this->isColumnModified(MlmAdminPeer::UPDATED_ON))
    {
      $this->setUpdatedOn(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MlmAdminPeer::DATABASE_NAME);
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
					$pk = MlmAdminPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setAdminId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += MlmAdminPeer::doUpdate($this, $con);
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


			if (($retval = MlmAdminPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MlmAdminPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getAdminId();
				break;
			case 1:
				return $this->getAdminCode();
				break;
			case 2:
				return $this->getUserId();
				break;
			case 3:
				return $this->getStatusCode();
				break;
			case 4:
				return $this->getAdminRole();
				break;
			case 5:
				return $this->getCreatedBy();
				break;
			case 6:
				return $this->getCreatedOn();
				break;
			case 7:
				return $this->getUpdatedBy();
				break;
			case 8:
				return $this->getUpdatedOn();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MlmAdminPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getAdminId(),
			$keys[1] => $this->getAdminCode(),
			$keys[2] => $this->getUserId(),
			$keys[3] => $this->getStatusCode(),
			$keys[4] => $this->getAdminRole(),
			$keys[5] => $this->getCreatedBy(),
			$keys[6] => $this->getCreatedOn(),
			$keys[7] => $this->getUpdatedBy(),
			$keys[8] => $this->getUpdatedOn(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MlmAdminPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setAdminId($value);
				break;
			case 1:
				$this->setAdminCode($value);
				break;
			case 2:
				$this->setUserId($value);
				break;
			case 3:
				$this->setStatusCode($value);
				break;
			case 4:
				$this->setAdminRole($value);
				break;
			case 5:
				$this->setCreatedBy($value);
				break;
			case 6:
				$this->setCreatedOn($value);
				break;
			case 7:
				$this->setUpdatedBy($value);
				break;
			case 8:
				$this->setUpdatedOn($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MlmAdminPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setAdminId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setAdminCode($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setUserId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setStatusCode($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setAdminRole($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCreatedBy($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCreatedOn($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setUpdatedBy($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setUpdatedOn($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(MlmAdminPeer::DATABASE_NAME);

		if ($this->isColumnModified(MlmAdminPeer::ADMIN_ID)) $criteria->add(MlmAdminPeer::ADMIN_ID, $this->admin_id);
		if ($this->isColumnModified(MlmAdminPeer::ADMIN_CODE)) $criteria->add(MlmAdminPeer::ADMIN_CODE, $this->admin_code);
		if ($this->isColumnModified(MlmAdminPeer::USER_ID)) $criteria->add(MlmAdminPeer::USER_ID, $this->user_id);
		if ($this->isColumnModified(MlmAdminPeer::STATUS_CODE)) $criteria->add(MlmAdminPeer::STATUS_CODE, $this->status_code);
		if ($this->isColumnModified(MlmAdminPeer::ADMIN_ROLE)) $criteria->add(MlmAdminPeer::ADMIN_ROLE, $this->admin_role);
		if ($this->isColumnModified(MlmAdminPeer::CREATED_BY)) $criteria->add(MlmAdminPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(MlmAdminPeer::CREATED_ON)) $criteria->add(MlmAdminPeer::CREATED_ON, $this->created_on);
		if ($this->isColumnModified(MlmAdminPeer::UPDATED_BY)) $criteria->add(MlmAdminPeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(MlmAdminPeer::UPDATED_ON)) $criteria->add(MlmAdminPeer::UPDATED_ON, $this->updated_on);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(MlmAdminPeer::DATABASE_NAME);

		$criteria->add(MlmAdminPeer::ADMIN_ID, $this->admin_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getAdminId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setAdminId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setAdminCode($this->admin_code);

		$copyObj->setUserId($this->user_id);

		$copyObj->setStatusCode($this->status_code);

		$copyObj->setAdminRole($this->admin_role);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setCreatedOn($this->created_on);

		$copyObj->setUpdatedBy($this->updated_by);

		$copyObj->setUpdatedOn($this->updated_on);


		$copyObj->setNew(true);

		$copyObj->setAdminId(NULL); 
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
			self::$peer = new MlmAdminPeer();
		}
		return self::$peer;
	}

} 