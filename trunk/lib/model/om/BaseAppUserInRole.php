<?php


abstract class BaseAppUserInRole extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $user_role_id;


	
	protected $user_id;


	
	protected $role_id;


	
	protected $created_on;


	
	protected $updated_on;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getUserRoleId()
	{

		return $this->user_role_id;
	}

	
	public function getUserId()
	{

		return $this->user_id;
	}

	
	public function getRoleId()
	{

		return $this->role_id;
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

	
	public function setUserRoleId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->user_role_id !== $v) {
			$this->user_role_id = $v;
			$this->modifiedColumns[] = AppUserInRolePeer::USER_ROLE_ID;
		}

	} 
	
	public function setUserId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->user_id !== $v) {
			$this->user_id = $v;
			$this->modifiedColumns[] = AppUserInRolePeer::USER_ID;
		}

	} 
	
	public function setRoleId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->role_id !== $v) {
			$this->role_id = $v;
			$this->modifiedColumns[] = AppUserInRolePeer::ROLE_ID;
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
			$this->modifiedColumns[] = AppUserInRolePeer::CREATED_ON;
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
			$this->modifiedColumns[] = AppUserInRolePeer::UPDATED_ON;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->user_role_id = $rs->getInt($startcol + 0);

			$this->user_id = $rs->getInt($startcol + 1);

			$this->role_id = $rs->getInt($startcol + 2);

			$this->created_on = $rs->getTimestamp($startcol + 3, null);

			$this->updated_on = $rs->getTimestamp($startcol + 4, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 5; 
		} catch (Exception $e) {
			throw new PropelException("Error populating AppUserInRole object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(AppUserInRolePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			AppUserInRolePeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(AppUserInRolePeer::CREATED_ON))
    {
      $this->setCreatedOn(time());
    }

    if ($this->isModified() && !$this->isColumnModified(AppUserInRolePeer::UPDATED_ON))
    {
      $this->setUpdatedOn(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(AppUserInRolePeer::DATABASE_NAME);
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
					$pk = AppUserInRolePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setUserRoleId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += AppUserInRolePeer::doUpdate($this, $con);
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


			if (($retval = AppUserInRolePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AppUserInRolePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getUserRoleId();
				break;
			case 1:
				return $this->getUserId();
				break;
			case 2:
				return $this->getRoleId();
				break;
			case 3:
				return $this->getCreatedOn();
				break;
			case 4:
				return $this->getUpdatedOn();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AppUserInRolePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getUserRoleId(),
			$keys[1] => $this->getUserId(),
			$keys[2] => $this->getRoleId(),
			$keys[3] => $this->getCreatedOn(),
			$keys[4] => $this->getUpdatedOn(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AppUserInRolePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setUserRoleId($value);
				break;
			case 1:
				$this->setUserId($value);
				break;
			case 2:
				$this->setRoleId($value);
				break;
			case 3:
				$this->setCreatedOn($value);
				break;
			case 4:
				$this->setUpdatedOn($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AppUserInRolePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setUserRoleId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setUserId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setRoleId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCreatedOn($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setUpdatedOn($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(AppUserInRolePeer::DATABASE_NAME);

		if ($this->isColumnModified(AppUserInRolePeer::USER_ROLE_ID)) $criteria->add(AppUserInRolePeer::USER_ROLE_ID, $this->user_role_id);
		if ($this->isColumnModified(AppUserInRolePeer::USER_ID)) $criteria->add(AppUserInRolePeer::USER_ID, $this->user_id);
		if ($this->isColumnModified(AppUserInRolePeer::ROLE_ID)) $criteria->add(AppUserInRolePeer::ROLE_ID, $this->role_id);
		if ($this->isColumnModified(AppUserInRolePeer::CREATED_ON)) $criteria->add(AppUserInRolePeer::CREATED_ON, $this->created_on);
		if ($this->isColumnModified(AppUserInRolePeer::UPDATED_ON)) $criteria->add(AppUserInRolePeer::UPDATED_ON, $this->updated_on);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(AppUserInRolePeer::DATABASE_NAME);

		$criteria->add(AppUserInRolePeer::USER_ROLE_ID, $this->user_role_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getUserRoleId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setUserRoleId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setUserId($this->user_id);

		$copyObj->setRoleId($this->role_id);

		$copyObj->setCreatedOn($this->created_on);

		$copyObj->setUpdatedOn($this->updated_on);


		$copyObj->setNew(true);

		$copyObj->setUserRoleId(NULL); 
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
			self::$peer = new AppUserInRolePeer();
		}
		return self::$peer;
	}

} 