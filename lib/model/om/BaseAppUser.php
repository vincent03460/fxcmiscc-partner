<?php


abstract class BaseAppUser extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $user_id;


	
	protected $username;


	
	protected $keep_password;


	
	protected $userpassword;


	
	protected $keep_password2;


	
	protected $userpassword2;


	
	protected $user_role;


	
	protected $status_code;


	
	protected $last_login_datetime;


	
	protected $created_by;


	
	protected $created_on;


	
	protected $updated_by;


	
	protected $updated_on;


	
	protected $access_ip;


	
	protected $remark;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getUserId()
	{

		return $this->user_id;
	}

	
	public function getUsername()
	{

		return $this->username;
	}

	
	public function getKeepPassword()
	{

		return $this->keep_password;
	}

	
	public function getUserpassword()
	{

		return $this->userpassword;
	}

	
	public function getKeepPassword2()
	{

		return $this->keep_password2;
	}

	
	public function getUserpassword2()
	{

		return $this->userpassword2;
	}

	
	public function getUserRole()
	{

		return $this->user_role;
	}

	
	public function getStatusCode()
	{

		return $this->status_code;
	}

	
	public function getLastLoginDatetime($format = 'Y-m-d H:i:s')
	{

		if ($this->last_login_datetime === null || $this->last_login_datetime === '') {
			return null;
		} elseif (!is_int($this->last_login_datetime)) {
						$ts = strtotime($this->last_login_datetime);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [last_login_datetime] as date/time value: " . var_export($this->last_login_datetime, true));
			}
		} else {
			$ts = $this->last_login_datetime;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
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

	
	public function getAccessIp()
	{

		return $this->access_ip;
	}

	
	public function getRemark()
	{

		return $this->remark;
	}

	
	public function setUserId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->user_id !== $v) {
			$this->user_id = $v;
			$this->modifiedColumns[] = AppUserPeer::USER_ID;
		}

	} 
	
	public function setUsername($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->username !== $v) {
			$this->username = $v;
			$this->modifiedColumns[] = AppUserPeer::USERNAME;
		}

	} 
	
	public function setKeepPassword($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->keep_password !== $v) {
			$this->keep_password = $v;
			$this->modifiedColumns[] = AppUserPeer::KEEP_PASSWORD;
		}

	} 
	
	public function setUserpassword($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->userpassword !== $v) {
			$this->userpassword = $v;
			$this->modifiedColumns[] = AppUserPeer::USERPASSWORD;
		}

	} 
	
	public function setKeepPassword2($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->keep_password2 !== $v) {
			$this->keep_password2 = $v;
			$this->modifiedColumns[] = AppUserPeer::KEEP_PASSWORD2;
		}

	} 
	
	public function setUserpassword2($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->userpassword2 !== $v) {
			$this->userpassword2 = $v;
			$this->modifiedColumns[] = AppUserPeer::USERPASSWORD2;
		}

	} 
	
	public function setUserRole($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->user_role !== $v) {
			$this->user_role = $v;
			$this->modifiedColumns[] = AppUserPeer::USER_ROLE;
		}

	} 
	
	public function setStatusCode($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->status_code !== $v) {
			$this->status_code = $v;
			$this->modifiedColumns[] = AppUserPeer::STATUS_CODE;
		}

	} 
	
	public function setLastLoginDatetime($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [last_login_datetime] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->last_login_datetime !== $ts) {
			$this->last_login_datetime = $ts;
			$this->modifiedColumns[] = AppUserPeer::LAST_LOGIN_DATETIME;
		}

	} 
	
	public function setCreatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = AppUserPeer::CREATED_BY;
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
			$this->modifiedColumns[] = AppUserPeer::CREATED_ON;
		}

	} 
	
	public function setUpdatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = AppUserPeer::UPDATED_BY;
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
			$this->modifiedColumns[] = AppUserPeer::UPDATED_ON;
		}

	} 
	
	public function setAccessIp($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->access_ip !== $v) {
			$this->access_ip = $v;
			$this->modifiedColumns[] = AppUserPeer::ACCESS_IP;
		}

	} 
	
	public function setRemark($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->remark !== $v) {
			$this->remark = $v;
			$this->modifiedColumns[] = AppUserPeer::REMARK;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->user_id = $rs->getInt($startcol + 0);

			$this->username = $rs->getString($startcol + 1);

			$this->keep_password = $rs->getString($startcol + 2);

			$this->userpassword = $rs->getString($startcol + 3);

			$this->keep_password2 = $rs->getString($startcol + 4);

			$this->userpassword2 = $rs->getString($startcol + 5);

			$this->user_role = $rs->getString($startcol + 6);

			$this->status_code = $rs->getString($startcol + 7);

			$this->last_login_datetime = $rs->getTimestamp($startcol + 8, null);

			$this->created_by = $rs->getInt($startcol + 9);

			$this->created_on = $rs->getTimestamp($startcol + 10, null);

			$this->updated_by = $rs->getInt($startcol + 11);

			$this->updated_on = $rs->getTimestamp($startcol + 12, null);

			$this->access_ip = $rs->getString($startcol + 13);

			$this->remark = $rs->getString($startcol + 14);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 15; 
		} catch (Exception $e) {
			throw new PropelException("Error populating AppUser object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(AppUserPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			AppUserPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(AppUserPeer::CREATED_ON))
    {
      $this->setCreatedOn(time());
    }

    if ($this->isModified() && !$this->isColumnModified(AppUserPeer::UPDATED_ON))
    {
      $this->setUpdatedOn(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(AppUserPeer::DATABASE_NAME);
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
					$pk = AppUserPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setUserId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += AppUserPeer::doUpdate($this, $con);
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


			if (($retval = AppUserPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AppUserPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getUserId();
				break;
			case 1:
				return $this->getUsername();
				break;
			case 2:
				return $this->getKeepPassword();
				break;
			case 3:
				return $this->getUserpassword();
				break;
			case 4:
				return $this->getKeepPassword2();
				break;
			case 5:
				return $this->getUserpassword2();
				break;
			case 6:
				return $this->getUserRole();
				break;
			case 7:
				return $this->getStatusCode();
				break;
			case 8:
				return $this->getLastLoginDatetime();
				break;
			case 9:
				return $this->getCreatedBy();
				break;
			case 10:
				return $this->getCreatedOn();
				break;
			case 11:
				return $this->getUpdatedBy();
				break;
			case 12:
				return $this->getUpdatedOn();
				break;
			case 13:
				return $this->getAccessIp();
				break;
			case 14:
				return $this->getRemark();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AppUserPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getUserId(),
			$keys[1] => $this->getUsername(),
			$keys[2] => $this->getKeepPassword(),
			$keys[3] => $this->getUserpassword(),
			$keys[4] => $this->getKeepPassword2(),
			$keys[5] => $this->getUserpassword2(),
			$keys[6] => $this->getUserRole(),
			$keys[7] => $this->getStatusCode(),
			$keys[8] => $this->getLastLoginDatetime(),
			$keys[9] => $this->getCreatedBy(),
			$keys[10] => $this->getCreatedOn(),
			$keys[11] => $this->getUpdatedBy(),
			$keys[12] => $this->getUpdatedOn(),
			$keys[13] => $this->getAccessIp(),
			$keys[14] => $this->getRemark(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AppUserPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setUserId($value);
				break;
			case 1:
				$this->setUsername($value);
				break;
			case 2:
				$this->setKeepPassword($value);
				break;
			case 3:
				$this->setUserpassword($value);
				break;
			case 4:
				$this->setKeepPassword2($value);
				break;
			case 5:
				$this->setUserpassword2($value);
				break;
			case 6:
				$this->setUserRole($value);
				break;
			case 7:
				$this->setStatusCode($value);
				break;
			case 8:
				$this->setLastLoginDatetime($value);
				break;
			case 9:
				$this->setCreatedBy($value);
				break;
			case 10:
				$this->setCreatedOn($value);
				break;
			case 11:
				$this->setUpdatedBy($value);
				break;
			case 12:
				$this->setUpdatedOn($value);
				break;
			case 13:
				$this->setAccessIp($value);
				break;
			case 14:
				$this->setRemark($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AppUserPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setUserId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setUsername($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setKeepPassword($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setUserpassword($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setKeepPassword2($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setUserpassword2($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setUserRole($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setStatusCode($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setLastLoginDatetime($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCreatedBy($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCreatedOn($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setUpdatedBy($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setUpdatedOn($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setAccessIp($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setRemark($arr[$keys[14]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(AppUserPeer::DATABASE_NAME);

		if ($this->isColumnModified(AppUserPeer::USER_ID)) $criteria->add(AppUserPeer::USER_ID, $this->user_id);
		if ($this->isColumnModified(AppUserPeer::USERNAME)) $criteria->add(AppUserPeer::USERNAME, $this->username);
		if ($this->isColumnModified(AppUserPeer::KEEP_PASSWORD)) $criteria->add(AppUserPeer::KEEP_PASSWORD, $this->keep_password);
		if ($this->isColumnModified(AppUserPeer::USERPASSWORD)) $criteria->add(AppUserPeer::USERPASSWORD, $this->userpassword);
		if ($this->isColumnModified(AppUserPeer::KEEP_PASSWORD2)) $criteria->add(AppUserPeer::KEEP_PASSWORD2, $this->keep_password2);
		if ($this->isColumnModified(AppUserPeer::USERPASSWORD2)) $criteria->add(AppUserPeer::USERPASSWORD2, $this->userpassword2);
		if ($this->isColumnModified(AppUserPeer::USER_ROLE)) $criteria->add(AppUserPeer::USER_ROLE, $this->user_role);
		if ($this->isColumnModified(AppUserPeer::STATUS_CODE)) $criteria->add(AppUserPeer::STATUS_CODE, $this->status_code);
		if ($this->isColumnModified(AppUserPeer::LAST_LOGIN_DATETIME)) $criteria->add(AppUserPeer::LAST_LOGIN_DATETIME, $this->last_login_datetime);
		if ($this->isColumnModified(AppUserPeer::CREATED_BY)) $criteria->add(AppUserPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(AppUserPeer::CREATED_ON)) $criteria->add(AppUserPeer::CREATED_ON, $this->created_on);
		if ($this->isColumnModified(AppUserPeer::UPDATED_BY)) $criteria->add(AppUserPeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(AppUserPeer::UPDATED_ON)) $criteria->add(AppUserPeer::UPDATED_ON, $this->updated_on);
		if ($this->isColumnModified(AppUserPeer::ACCESS_IP)) $criteria->add(AppUserPeer::ACCESS_IP, $this->access_ip);
		if ($this->isColumnModified(AppUserPeer::REMARK)) $criteria->add(AppUserPeer::REMARK, $this->remark);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(AppUserPeer::DATABASE_NAME);

		$criteria->add(AppUserPeer::USER_ID, $this->user_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getUserId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setUserId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setUsername($this->username);

		$copyObj->setKeepPassword($this->keep_password);

		$copyObj->setUserpassword($this->userpassword);

		$copyObj->setKeepPassword2($this->keep_password2);

		$copyObj->setUserpassword2($this->userpassword2);

		$copyObj->setUserRole($this->user_role);

		$copyObj->setStatusCode($this->status_code);

		$copyObj->setLastLoginDatetime($this->last_login_datetime);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setCreatedOn($this->created_on);

		$copyObj->setUpdatedBy($this->updated_by);

		$copyObj->setUpdatedOn($this->updated_on);

		$copyObj->setAccessIp($this->access_ip);

		$copyObj->setRemark($this->remark);


		$copyObj->setNew(true);

		$copyObj->setUserId(NULL); 
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
			self::$peer = new AppUserPeer();
		}
		return self::$peer;
	}

} 