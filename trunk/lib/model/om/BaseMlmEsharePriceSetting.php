<?php


abstract class BaseMlmEsharePriceSetting extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $setting_id;


	
	protected $share_value = 0;


	
	protected $volume;


	
	protected $status_code;


	
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

	
	public function getShareValue()
	{

		return $this->share_value;
	}

	
	public function getVolume()
	{

		return $this->volume;
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

	
	public function setSettingId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->setting_id !== $v) {
			$this->setting_id = $v;
			$this->modifiedColumns[] = MlmEsharePriceSettingPeer::SETTING_ID;
		}

	} 

	
	public function setShareValue($v)
	{

		if ($this->share_value !== $v || $v === 0) {
			$this->share_value = $v;
			$this->modifiedColumns[] = MlmEsharePriceSettingPeer::SHARE_VALUE;
		}

	} 

	
	public function setVolume($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->volume !== $v) {
			$this->volume = $v;
			$this->modifiedColumns[] = MlmEsharePriceSettingPeer::VOLUME;
		}

	} 

	
	public function setStatusCode($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->status_code !== $v) {
			$this->status_code = $v;
			$this->modifiedColumns[] = MlmEsharePriceSettingPeer::STATUS_CODE;
		}

	} 

	
	public function setCreatedBy($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = MlmEsharePriceSettingPeer::CREATED_BY;
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
			$this->modifiedColumns[] = MlmEsharePriceSettingPeer::CREATED_ON;
		}

	} 

	
	public function setUpdatedBy($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = MlmEsharePriceSettingPeer::UPDATED_BY;
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
			$this->modifiedColumns[] = MlmEsharePriceSettingPeer::UPDATED_ON;
		}

	} 

	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->setting_id = $rs->getInt($startcol + 0);

			$this->share_value = $rs->getFloat($startcol + 1);

			$this->volume = $rs->getInt($startcol + 2);

			$this->status_code = $rs->getString($startcol + 3);

			$this->created_by = $rs->getInt($startcol + 4);

			$this->created_on = $rs->getTimestamp($startcol + 5, null);

			$this->updated_by = $rs->getInt($startcol + 6);

			$this->updated_on = $rs->getTimestamp($startcol + 7, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 8; 
		} catch (Exception $e) {
			throw new PropelException("Error populating MlmEsharePriceSetting object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MlmEsharePriceSettingPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			MlmEsharePriceSettingPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(MlmEsharePriceSettingPeer::CREATED_ON))
    {
      $this->setCreatedOn(time());
    }

    if ($this->isModified() && !$this->isColumnModified(MlmEsharePriceSettingPeer::UPDATED_ON))
    {
      $this->setUpdatedOn(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MlmEsharePriceSettingPeer::DATABASE_NAME);
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
		$affectedRows = 0; 
		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;


			
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = MlmEsharePriceSettingPeer::doInsert($this, $con);
					$affectedRows += 1; 
										 
										 

					$this->setSettingId($pk);  

					$this->setNew(false);
				} else {
					$affectedRows += MlmEsharePriceSettingPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 
			}

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


			if (($retval = MlmEsharePriceSettingPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MlmEsharePriceSettingPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getSettingId();
				break;
			case 1:
				return $this->getShareValue();
				break;
			case 2:
				return $this->getVolume();
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
		$keys = MlmEsharePriceSettingPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getSettingId(),
			$keys[1] => $this->getShareValue(),
			$keys[2] => $this->getVolume(),
			$keys[3] => $this->getStatusCode(),
			$keys[4] => $this->getCreatedBy(),
			$keys[5] => $this->getCreatedOn(),
			$keys[6] => $this->getUpdatedBy(),
			$keys[7] => $this->getUpdatedOn(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MlmEsharePriceSettingPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setSettingId($value);
				break;
			case 1:
				$this->setShareValue($value);
				break;
			case 2:
				$this->setVolume($value);
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
				$this->setUpdatedBy($value);
				break;
			case 7:
				$this->setUpdatedOn($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MlmEsharePriceSettingPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setSettingId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setShareValue($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setVolume($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setStatusCode($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCreatedBy($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCreatedOn($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setUpdatedBy($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setUpdatedOn($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(MlmEsharePriceSettingPeer::DATABASE_NAME);

		if ($this->isColumnModified(MlmEsharePriceSettingPeer::SETTING_ID)) $criteria->add(MlmEsharePriceSettingPeer::SETTING_ID, $this->setting_id);
		if ($this->isColumnModified(MlmEsharePriceSettingPeer::SHARE_VALUE)) $criteria->add(MlmEsharePriceSettingPeer::SHARE_VALUE, $this->share_value);
		if ($this->isColumnModified(MlmEsharePriceSettingPeer::VOLUME)) $criteria->add(MlmEsharePriceSettingPeer::VOLUME, $this->volume);
		if ($this->isColumnModified(MlmEsharePriceSettingPeer::STATUS_CODE)) $criteria->add(MlmEsharePriceSettingPeer::STATUS_CODE, $this->status_code);
		if ($this->isColumnModified(MlmEsharePriceSettingPeer::CREATED_BY)) $criteria->add(MlmEsharePriceSettingPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(MlmEsharePriceSettingPeer::CREATED_ON)) $criteria->add(MlmEsharePriceSettingPeer::CREATED_ON, $this->created_on);
		if ($this->isColumnModified(MlmEsharePriceSettingPeer::UPDATED_BY)) $criteria->add(MlmEsharePriceSettingPeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(MlmEsharePriceSettingPeer::UPDATED_ON)) $criteria->add(MlmEsharePriceSettingPeer::UPDATED_ON, $this->updated_on);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(MlmEsharePriceSettingPeer::DATABASE_NAME);

		$criteria->add(MlmEsharePriceSettingPeer::SETTING_ID, $this->setting_id);

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

		$copyObj->setShareValue($this->share_value);

		$copyObj->setVolume($this->volume);

		$copyObj->setStatusCode($this->status_code);

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
			self::$peer = new MlmEsharePriceSettingPeer();
		}
		return self::$peer;
	}

} 