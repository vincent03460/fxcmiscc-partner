<?php


abstract class BaseMlmIbPackage extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $ib_package_id;


	
	protected $package_name;


	
	protected $commission;


	
	protected $created_by;


	
	protected $created_on;


	
	protected $updated_by;


	
	protected $updated_on;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getIbPackageId()
	{

		return $this->ib_package_id;
	}

	
	public function getPackageName()
	{

		return $this->package_name;
	}

	
	public function getCommission()
	{

		return $this->commission;
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

	
	public function setIbPackageId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->ib_package_id !== $v) {
			$this->ib_package_id = $v;
			$this->modifiedColumns[] = MlmIbPackagePeer::IB_PACKAGE_ID;
		}

	} 
	
	public function setPackageName($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->package_name !== $v) {
			$this->package_name = $v;
			$this->modifiedColumns[] = MlmIbPackagePeer::PACKAGE_NAME;
		}

	} 
	
	public function setCommission($v)
	{

		if ($this->commission !== $v) {
			$this->commission = $v;
			$this->modifiedColumns[] = MlmIbPackagePeer::COMMISSION;
		}

	} 
	
	public function setCreatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = MlmIbPackagePeer::CREATED_BY;
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
			$this->modifiedColumns[] = MlmIbPackagePeer::CREATED_ON;
		}

	} 
	
	public function setUpdatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = MlmIbPackagePeer::UPDATED_BY;
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
			$this->modifiedColumns[] = MlmIbPackagePeer::UPDATED_ON;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->ib_package_id = $rs->getInt($startcol + 0);

			$this->package_name = $rs->getString($startcol + 1);

			$this->commission = $rs->getFloat($startcol + 2);

			$this->created_by = $rs->getInt($startcol + 3);

			$this->created_on = $rs->getTimestamp($startcol + 4, null);

			$this->updated_by = $rs->getInt($startcol + 5);

			$this->updated_on = $rs->getTimestamp($startcol + 6, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating MlmIbPackage object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MlmIbPackagePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			MlmIbPackagePeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(MlmIbPackagePeer::CREATED_ON))
    {
      $this->setCreatedOn(time());
    }

    if ($this->isModified() && !$this->isColumnModified(MlmIbPackagePeer::UPDATED_ON))
    {
      $this->setUpdatedOn(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MlmIbPackagePeer::DATABASE_NAME);
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
					$pk = MlmIbPackagePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setIbPackageId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += MlmIbPackagePeer::doUpdate($this, $con);
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


			if (($retval = MlmIbPackagePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MlmIbPackagePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getIbPackageId();
				break;
			case 1:
				return $this->getPackageName();
				break;
			case 2:
				return $this->getCommission();
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
		$keys = MlmIbPackagePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getIbPackageId(),
			$keys[1] => $this->getPackageName(),
			$keys[2] => $this->getCommission(),
			$keys[3] => $this->getCreatedBy(),
			$keys[4] => $this->getCreatedOn(),
			$keys[5] => $this->getUpdatedBy(),
			$keys[6] => $this->getUpdatedOn(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MlmIbPackagePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setIbPackageId($value);
				break;
			case 1:
				$this->setPackageName($value);
				break;
			case 2:
				$this->setCommission($value);
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
		$keys = MlmIbPackagePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setIbPackageId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setPackageName($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCommission($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCreatedBy($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCreatedOn($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setUpdatedBy($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setUpdatedOn($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(MlmIbPackagePeer::DATABASE_NAME);

		if ($this->isColumnModified(MlmIbPackagePeer::IB_PACKAGE_ID)) $criteria->add(MlmIbPackagePeer::IB_PACKAGE_ID, $this->ib_package_id);
		if ($this->isColumnModified(MlmIbPackagePeer::PACKAGE_NAME)) $criteria->add(MlmIbPackagePeer::PACKAGE_NAME, $this->package_name);
		if ($this->isColumnModified(MlmIbPackagePeer::COMMISSION)) $criteria->add(MlmIbPackagePeer::COMMISSION, $this->commission);
		if ($this->isColumnModified(MlmIbPackagePeer::CREATED_BY)) $criteria->add(MlmIbPackagePeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(MlmIbPackagePeer::CREATED_ON)) $criteria->add(MlmIbPackagePeer::CREATED_ON, $this->created_on);
		if ($this->isColumnModified(MlmIbPackagePeer::UPDATED_BY)) $criteria->add(MlmIbPackagePeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(MlmIbPackagePeer::UPDATED_ON)) $criteria->add(MlmIbPackagePeer::UPDATED_ON, $this->updated_on);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(MlmIbPackagePeer::DATABASE_NAME);

		$criteria->add(MlmIbPackagePeer::IB_PACKAGE_ID, $this->ib_package_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getIbPackageId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setIbPackageId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setPackageName($this->package_name);

		$copyObj->setCommission($this->commission);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setCreatedOn($this->created_on);

		$copyObj->setUpdatedBy($this->updated_by);

		$copyObj->setUpdatedOn($this->updated_on);


		$copyObj->setNew(true);

		$copyObj->setIbPackageId(NULL); 
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
			self::$peer = new MlmIbPackagePeer();
		}
		return self::$peer;
	}

} 