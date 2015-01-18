<?php


abstract class BaseMlmRegistrationCountryCode extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $country_id;


	
	protected $country_name;


	
	protected $prefix;


	
	protected $created_by;


	
	protected $created_on;


	
	protected $updated_by;


	
	protected $updated_on;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCountryId()
	{

		return $this->country_id;
	}

	
	public function getCountryName()
	{

		return $this->country_name;
	}

	
	public function getPrefix()
	{

		return $this->prefix;
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

	
	public function setCountryId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->country_id !== $v) {
			$this->country_id = $v;
			$this->modifiedColumns[] = MlmRegistrationCountryCodePeer::COUNTRY_ID;
		}

	} 
	
	public function setCountryName($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->country_name !== $v) {
			$this->country_name = $v;
			$this->modifiedColumns[] = MlmRegistrationCountryCodePeer::COUNTRY_NAME;
		}

	} 
	
	public function setPrefix($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->prefix !== $v) {
			$this->prefix = $v;
			$this->modifiedColumns[] = MlmRegistrationCountryCodePeer::PREFIX;
		}

	} 
	
	public function setCreatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = MlmRegistrationCountryCodePeer::CREATED_BY;
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
			$this->modifiedColumns[] = MlmRegistrationCountryCodePeer::CREATED_ON;
		}

	} 
	
	public function setUpdatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = MlmRegistrationCountryCodePeer::UPDATED_BY;
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
			$this->modifiedColumns[] = MlmRegistrationCountryCodePeer::UPDATED_ON;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->country_id = $rs->getInt($startcol + 0);

			$this->country_name = $rs->getString($startcol + 1);

			$this->prefix = $rs->getString($startcol + 2);

			$this->created_by = $rs->getInt($startcol + 3);

			$this->created_on = $rs->getTimestamp($startcol + 4, null);

			$this->updated_by = $rs->getInt($startcol + 5);

			$this->updated_on = $rs->getTimestamp($startcol + 6, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating MlmRegistrationCountryCode object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MlmRegistrationCountryCodePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			MlmRegistrationCountryCodePeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(MlmRegistrationCountryCodePeer::CREATED_ON))
    {
      $this->setCreatedOn(time());
    }

    if ($this->isModified() && !$this->isColumnModified(MlmRegistrationCountryCodePeer::UPDATED_ON))
    {
      $this->setUpdatedOn(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MlmRegistrationCountryCodePeer::DATABASE_NAME);
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
					$pk = MlmRegistrationCountryCodePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setCountryId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += MlmRegistrationCountryCodePeer::doUpdate($this, $con);
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


			if (($retval = MlmRegistrationCountryCodePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MlmRegistrationCountryCodePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCountryId();
				break;
			case 1:
				return $this->getCountryName();
				break;
			case 2:
				return $this->getPrefix();
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
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MlmRegistrationCountryCodePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCountryId(),
			$keys[1] => $this->getCountryName(),
			$keys[2] => $this->getPrefix(),
			$keys[3] => $this->getCreatedBy(),
			$keys[4] => $this->getCreatedOn(),
			$keys[5] => $this->getUpdatedBy(),
			$keys[6] => $this->getUpdatedOn(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MlmRegistrationCountryCodePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCountryId($value);
				break;
			case 1:
				$this->setCountryName($value);
				break;
			case 2:
				$this->setPrefix($value);
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
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MlmRegistrationCountryCodePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCountryId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCountryName($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPrefix($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCreatedBy($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCreatedOn($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setUpdatedBy($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setUpdatedOn($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(MlmRegistrationCountryCodePeer::DATABASE_NAME);

		if ($this->isColumnModified(MlmRegistrationCountryCodePeer::COUNTRY_ID)) $criteria->add(MlmRegistrationCountryCodePeer::COUNTRY_ID, $this->country_id);
		if ($this->isColumnModified(MlmRegistrationCountryCodePeer::COUNTRY_NAME)) $criteria->add(MlmRegistrationCountryCodePeer::COUNTRY_NAME, $this->country_name);
		if ($this->isColumnModified(MlmRegistrationCountryCodePeer::PREFIX)) $criteria->add(MlmRegistrationCountryCodePeer::PREFIX, $this->prefix);
		if ($this->isColumnModified(MlmRegistrationCountryCodePeer::CREATED_BY)) $criteria->add(MlmRegistrationCountryCodePeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(MlmRegistrationCountryCodePeer::CREATED_ON)) $criteria->add(MlmRegistrationCountryCodePeer::CREATED_ON, $this->created_on);
		if ($this->isColumnModified(MlmRegistrationCountryCodePeer::UPDATED_BY)) $criteria->add(MlmRegistrationCountryCodePeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(MlmRegistrationCountryCodePeer::UPDATED_ON)) $criteria->add(MlmRegistrationCountryCodePeer::UPDATED_ON, $this->updated_on);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(MlmRegistrationCountryCodePeer::DATABASE_NAME);

		$criteria->add(MlmRegistrationCountryCodePeer::COUNTRY_ID, $this->country_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getCountryId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setCountryId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setCountryName($this->country_name);

		$copyObj->setPrefix($this->prefix);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setCreatedOn($this->created_on);

		$copyObj->setUpdatedBy($this->updated_by);

		$copyObj->setUpdatedOn($this->updated_on);


		$copyObj->setNew(true);

		$copyObj->setCountryId(NULL); 
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
			self::$peer = new MlmRegistrationCountryCodePeer();
		}
		return self::$peer;
	}

} 