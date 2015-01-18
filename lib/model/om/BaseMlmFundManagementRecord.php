<?php


abstract class BaseMlmFundManagementRecord extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $fund_id;


	
	protected $percentage;


	
	protected $created_by;


	
	protected $created_on;


	
	protected $updated_by;


	
	protected $updated_on;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getFundId()
	{

		return $this->fund_id;
	}

	
	public function getPercentage()
	{

		return $this->percentage;
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

	
	public function setFundId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->fund_id !== $v) {
			$this->fund_id = $v;
			$this->modifiedColumns[] = MlmFundManagementRecordPeer::FUND_ID;
		}

	} 
	
	public function setPercentage($v)
	{

		if ($this->percentage !== $v) {
			$this->percentage = $v;
			$this->modifiedColumns[] = MlmFundManagementRecordPeer::PERCENTAGE;
		}

	} 
	
	public function setCreatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = MlmFundManagementRecordPeer::CREATED_BY;
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
			$this->modifiedColumns[] = MlmFundManagementRecordPeer::CREATED_ON;
		}

	} 
	
	public function setUpdatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = MlmFundManagementRecordPeer::UPDATED_BY;
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
			$this->modifiedColumns[] = MlmFundManagementRecordPeer::UPDATED_ON;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->fund_id = $rs->getInt($startcol + 0);

			$this->percentage = $rs->getFloat($startcol + 1);

			$this->created_by = $rs->getInt($startcol + 2);

			$this->created_on = $rs->getTimestamp($startcol + 3, null);

			$this->updated_by = $rs->getInt($startcol + 4);

			$this->updated_on = $rs->getTimestamp($startcol + 5, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating MlmFundManagementRecord object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MlmFundManagementRecordPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			MlmFundManagementRecordPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(MlmFundManagementRecordPeer::CREATED_ON))
    {
      $this->setCreatedOn(time());
    }

    if ($this->isModified() && !$this->isColumnModified(MlmFundManagementRecordPeer::UPDATED_ON))
    {
      $this->setUpdatedOn(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MlmFundManagementRecordPeer::DATABASE_NAME);
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
					$pk = MlmFundManagementRecordPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setFundId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += MlmFundManagementRecordPeer::doUpdate($this, $con);
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


			if (($retval = MlmFundManagementRecordPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MlmFundManagementRecordPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getFundId();
				break;
			case 1:
				return $this->getPercentage();
				break;
			case 2:
				return $this->getCreatedBy();
				break;
			case 3:
				return $this->getCreatedOn();
				break;
			case 4:
				return $this->getUpdatedBy();
				break;
			case 5:
				return $this->getUpdatedOn();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MlmFundManagementRecordPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getFundId(),
			$keys[1] => $this->getPercentage(),
			$keys[2] => $this->getCreatedBy(),
			$keys[3] => $this->getCreatedOn(),
			$keys[4] => $this->getUpdatedBy(),
			$keys[5] => $this->getUpdatedOn(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MlmFundManagementRecordPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setFundId($value);
				break;
			case 1:
				$this->setPercentage($value);
				break;
			case 2:
				$this->setCreatedBy($value);
				break;
			case 3:
				$this->setCreatedOn($value);
				break;
			case 4:
				$this->setUpdatedBy($value);
				break;
			case 5:
				$this->setUpdatedOn($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MlmFundManagementRecordPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setFundId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setPercentage($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCreatedBy($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCreatedOn($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setUpdatedBy($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setUpdatedOn($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(MlmFundManagementRecordPeer::DATABASE_NAME);

		if ($this->isColumnModified(MlmFundManagementRecordPeer::FUND_ID)) $criteria->add(MlmFundManagementRecordPeer::FUND_ID, $this->fund_id);
		if ($this->isColumnModified(MlmFundManagementRecordPeer::PERCENTAGE)) $criteria->add(MlmFundManagementRecordPeer::PERCENTAGE, $this->percentage);
		if ($this->isColumnModified(MlmFundManagementRecordPeer::CREATED_BY)) $criteria->add(MlmFundManagementRecordPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(MlmFundManagementRecordPeer::CREATED_ON)) $criteria->add(MlmFundManagementRecordPeer::CREATED_ON, $this->created_on);
		if ($this->isColumnModified(MlmFundManagementRecordPeer::UPDATED_BY)) $criteria->add(MlmFundManagementRecordPeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(MlmFundManagementRecordPeer::UPDATED_ON)) $criteria->add(MlmFundManagementRecordPeer::UPDATED_ON, $this->updated_on);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(MlmFundManagementRecordPeer::DATABASE_NAME);

		$criteria->add(MlmFundManagementRecordPeer::FUND_ID, $this->fund_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getFundId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setFundId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setPercentage($this->percentage);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setCreatedOn($this->created_on);

		$copyObj->setUpdatedBy($this->updated_by);

		$copyObj->setUpdatedOn($this->updated_on);


		$copyObj->setNew(true);

		$copyObj->setFundId(NULL); 
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
			self::$peer = new MlmFundManagementRecordPeer();
		}
		return self::$peer;
	}

} 