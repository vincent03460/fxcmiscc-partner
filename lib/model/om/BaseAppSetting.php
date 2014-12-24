<?php


abstract class BaseAppSetting extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $setting_id;


	
	protected $setting_parameter;


	
	protected $setting_value;


	
	protected $setting_remark;


	
	protected $created_by;


	
	protected $created_on;


	
	protected $updated_by;


	
	protected $updated_on;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getSettingId()
	{

		return $this->setting_id;
	}

	
	public function getSettingParameter()
	{

		return $this->setting_parameter;
	}

	
	public function getSettingValue()
	{

		return $this->setting_value;
	}

	
	public function getSettingRemark()
	{

		return $this->setting_remark;
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

	
	public function setSettingId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->setting_id !== $v) {
			$this->setting_id = $v;
			$this->modifiedColumns[] = AppSettingPeer::SETTING_ID;
		}

	} 
	
	public function setSettingParameter($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->setting_parameter !== $v) {
			$this->setting_parameter = $v;
			$this->modifiedColumns[] = AppSettingPeer::SETTING_PARAMETER;
		}

	} 
	
	public function setSettingValue($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->setting_value !== $v) {
			$this->setting_value = $v;
			$this->modifiedColumns[] = AppSettingPeer::SETTING_VALUE;
		}

	} 
	
	public function setSettingRemark($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->setting_remark !== $v) {
			$this->setting_remark = $v;
			$this->modifiedColumns[] = AppSettingPeer::SETTING_REMARK;
		}

	} 
	
	public function setCreatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = AppSettingPeer::CREATED_BY;
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
			$this->modifiedColumns[] = AppSettingPeer::CREATED_ON;
		}

	} 
	
	public function setUpdatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = AppSettingPeer::UPDATED_BY;
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
			$this->modifiedColumns[] = AppSettingPeer::UPDATED_ON;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->setting_id = $rs->getInt($startcol + 0);

			$this->setting_parameter = $rs->getString($startcol + 1);

			$this->setting_value = $rs->getString($startcol + 2);

			$this->setting_remark = $rs->getString($startcol + 3);

			$this->created_by = $rs->getInt($startcol + 4);

			$this->created_on = $rs->getTimestamp($startcol + 5, null);

			$this->updated_by = $rs->getInt($startcol + 6);

			$this->updated_on = $rs->getTimestamp($startcol + 7, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 8; 
		} catch (Exception $e) {
			throw new PropelException("Error populating AppSetting object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(AppSettingPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			AppSettingPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(AppSettingPeer::CREATED_ON))
    {
      $this->setCreatedOn(time());
    }

    if ($this->isModified() && !$this->isColumnModified(AppSettingPeer::UPDATED_ON))
    {
      $this->setUpdatedOn(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(AppSettingPeer::DATABASE_NAME);
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
					$pk = AppSettingPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setSettingId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += AppSettingPeer::doUpdate($this, $con);
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


			if (($retval = AppSettingPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AppSettingPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getSettingId();
				break;
			case 1:
				return $this->getSettingParameter();
				break;
			case 2:
				return $this->getSettingValue();
				break;
			case 3:
				return $this->getSettingRemark();
				break;
			case 4:
				return $this->getCreatedBy();
				break;
			case 5:
				return $this->getCreatedOn();
				break;
			case 6:
				return $this->getUpdatedBy();
				break;
			case 7:
				return $this->getUpdatedOn();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AppSettingPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getSettingId(),
			$keys[1] => $this->getSettingParameter(),
			$keys[2] => $this->getSettingValue(),
			$keys[3] => $this->getSettingRemark(),
			$keys[4] => $this->getCreatedBy(),
			$keys[5] => $this->getCreatedOn(),
			$keys[6] => $this->getUpdatedBy(),
			$keys[7] => $this->getUpdatedOn(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AppSettingPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setSettingId($value);
				break;
			case 1:
				$this->setSettingParameter($value);
				break;
			case 2:
				$this->setSettingValue($value);
				break;
			case 3:
				$this->setSettingRemark($value);
				break;
			case 4:
				$this->setCreatedBy($value);
				break;
			case 5:
				$this->setCreatedOn($value);
				break;
			case 6:
				$this->setUpdatedBy($value);
				break;
			case 7:
				$this->setUpdatedOn($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AppSettingPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setSettingId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setSettingParameter($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setSettingValue($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setSettingRemark($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCreatedBy($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCreatedOn($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setUpdatedBy($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setUpdatedOn($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(AppSettingPeer::DATABASE_NAME);

		if ($this->isColumnModified(AppSettingPeer::SETTING_ID)) $criteria->add(AppSettingPeer::SETTING_ID, $this->setting_id);
		if ($this->isColumnModified(AppSettingPeer::SETTING_PARAMETER)) $criteria->add(AppSettingPeer::SETTING_PARAMETER, $this->setting_parameter);
		if ($this->isColumnModified(AppSettingPeer::SETTING_VALUE)) $criteria->add(AppSettingPeer::SETTING_VALUE, $this->setting_value);
		if ($this->isColumnModified(AppSettingPeer::SETTING_REMARK)) $criteria->add(AppSettingPeer::SETTING_REMARK, $this->setting_remark);
		if ($this->isColumnModified(AppSettingPeer::CREATED_BY)) $criteria->add(AppSettingPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(AppSettingPeer::CREATED_ON)) $criteria->add(AppSettingPeer::CREATED_ON, $this->created_on);
		if ($this->isColumnModified(AppSettingPeer::UPDATED_BY)) $criteria->add(AppSettingPeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(AppSettingPeer::UPDATED_ON)) $criteria->add(AppSettingPeer::UPDATED_ON, $this->updated_on);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(AppSettingPeer::DATABASE_NAME);

		$criteria->add(AppSettingPeer::SETTING_ID, $this->setting_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getSettingId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setSettingId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setSettingParameter($this->setting_parameter);

		$copyObj->setSettingValue($this->setting_value);

		$copyObj->setSettingRemark($this->setting_remark);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setCreatedOn($this->created_on);

		$copyObj->setUpdatedBy($this->updated_by);

		$copyObj->setUpdatedOn($this->updated_on);


		$copyObj->setNew(true);

		$copyObj->setSettingId(NULL); 
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
			self::$peer = new AppSettingPeer();
		}
		return self::$peer;
	}

} 