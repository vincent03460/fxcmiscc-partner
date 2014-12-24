<?php


abstract class BaseAppUserRole extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $role_id;


	
	protected $role_code;


	
	protected $role_desc;


	
	protected $status_code;


	
	protected $created_by;


	
	protected $created_on;


	
	protected $updated_on;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getRoleId()
	{

		return $this->role_id;
	}

	
	public function getRoleCode()
	{

		return $this->role_code;
	}

	
	public function getRoleDesc()
	{

		return $this->role_desc;
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

	
	public function setRoleId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->role_id !== $v) {
			$this->role_id = $v;
			$this->modifiedColumns[] = AppUserRolePeer::ROLE_ID;
		}

	} 
	
	public function setRoleCode($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->role_code !== $v) {
			$this->role_code = $v;
			$this->modifiedColumns[] = AppUserRolePeer::ROLE_CODE;
		}

	} 
	
	public function setRoleDesc($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->role_desc !== $v) {
			$this->role_desc = $v;
			$this->modifiedColumns[] = AppUserRolePeer::ROLE_DESC;
		}

	} 
	
	public function setStatusCode($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->status_code !== $v) {
			$this->status_code = $v;
			$this->modifiedColumns[] = AppUserRolePeer::STATUS_CODE;
		}

	} 
	
	public function setCreatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = AppUserRolePeer::CREATED_BY;
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
			$this->modifiedColumns[] = AppUserRolePeer::CREATED_ON;
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
			$this->modifiedColumns[] = AppUserRolePeer::UPDATED_ON;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->role_id = $rs->getInt($startcol + 0);

			$this->role_code = $rs->getString($startcol + 1);

			$this->role_desc = $rs->getString($startcol + 2);

			$this->status_code = $rs->getString($startcol + 3);

			$this->created_by = $rs->getInt($startcol + 4);

			$this->created_on = $rs->getTimestamp($startcol + 5, null);

			$this->updated_on = $rs->getTimestamp($startcol + 6, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating AppUserRole object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(AppUserRolePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			AppUserRolePeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(AppUserRolePeer::CREATED_ON))
    {
      $this->setCreatedOn(time());
    }

    if ($this->isModified() && !$this->isColumnModified(AppUserRolePeer::UPDATED_ON))
    {
      $this->setUpdatedOn(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(AppUserRolePeer::DATABASE_NAME);
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
					$pk = AppUserRolePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setRoleId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += AppUserRolePeer::doUpdate($this, $con);
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


			if (($retval = AppUserRolePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AppUserRolePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRoleId();
				break;
			case 1:
				return $this->getRoleCode();
				break;
			case 2:
				return $this->getRoleDesc();
				break;
			case 3:
				return $this->getStatusCode();
				break;
			case 4:
				return $this->getCreatedBy();
				break;
			case 5:
				return $this->getCreatedOn();
				break;
			case 6:
				return $this->getUpdatedOn();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AppUserRolePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRoleId(),
			$keys[1] => $this->getRoleCode(),
			$keys[2] => $this->getRoleDesc(),
			$keys[3] => $this->getStatusCode(),
			$keys[4] => $this->getCreatedBy(),
			$keys[5] => $this->getCreatedOn(),
			$keys[6] => $this->getUpdatedOn(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AppUserRolePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRoleId($value);
				break;
			case 1:
				$this->setRoleCode($value);
				break;
			case 2:
				$this->setRoleDesc($value);
				break;
			case 3:
				$this->setStatusCode($value);
				break;
			case 4:
				$this->setCreatedBy($value);
				break;
			case 5:
				$this->setCreatedOn($value);
				break;
			case 6:
				$this->setUpdatedOn($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AppUserRolePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRoleId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setRoleCode($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setRoleDesc($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setStatusCode($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCreatedBy($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCreatedOn($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setUpdatedOn($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(AppUserRolePeer::DATABASE_NAME);

		if ($this->isColumnModified(AppUserRolePeer::ROLE_ID)) $criteria->add(AppUserRolePeer::ROLE_ID, $this->role_id);
		if ($this->isColumnModified(AppUserRolePeer::ROLE_CODE)) $criteria->add(AppUserRolePeer::ROLE_CODE, $this->role_code);
		if ($this->isColumnModified(AppUserRolePeer::ROLE_DESC)) $criteria->add(AppUserRolePeer::ROLE_DESC, $this->role_desc);
		if ($this->isColumnModified(AppUserRolePeer::STATUS_CODE)) $criteria->add(AppUserRolePeer::STATUS_CODE, $this->status_code);
		if ($this->isColumnModified(AppUserRolePeer::CREATED_BY)) $criteria->add(AppUserRolePeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(AppUserRolePeer::CREATED_ON)) $criteria->add(AppUserRolePeer::CREATED_ON, $this->created_on);
		if ($this->isColumnModified(AppUserRolePeer::UPDATED_ON)) $criteria->add(AppUserRolePeer::UPDATED_ON, $this->updated_on);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(AppUserRolePeer::DATABASE_NAME);

		$criteria->add(AppUserRolePeer::ROLE_ID, $this->role_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getRoleId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setRoleId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setRoleCode($this->role_code);

		$copyObj->setRoleDesc($this->role_desc);

		$copyObj->setStatusCode($this->status_code);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setCreatedOn($this->created_on);

		$copyObj->setUpdatedOn($this->updated_on);


		$copyObj->setNew(true);

		$copyObj->setRoleId(NULL); 
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
			self::$peer = new AppUserRolePeer();
		}
		return self::$peer;
	}

} 