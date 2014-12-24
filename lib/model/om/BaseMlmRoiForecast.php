<?php


abstract class BaseMlmRoiForecast extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $roi_id;


	
	protected $date_year;


	
	protected $date_month;


	
	protected $roi_3k_5k;


	
	protected $roi_10k_15k;


	
	protected $roi_30k_50k;


	
	protected $created_by;


	
	protected $created_on;


	
	protected $updated_by;


	
	protected $updated_on;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getRoiId()
	{

		return $this->roi_id;
	}

	
	public function getDateYear()
	{

		return $this->date_year;
	}

	
	public function getDateMonth()
	{

		return $this->date_month;
	}

	
	public function getRoi3k5k()
	{

		return $this->roi_3k_5k;
	}

	
	public function getRoi10k15k()
	{

		return $this->roi_10k_15k;
	}

	
	public function getRoi30k50k()
	{

		return $this->roi_30k_50k;
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

	
	public function setRoiId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->roi_id !== $v) {
			$this->roi_id = $v;
			$this->modifiedColumns[] = MlmRoiForecastPeer::ROI_ID;
		}

	} 
	
	public function setDateYear($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->date_year !== $v) {
			$this->date_year = $v;
			$this->modifiedColumns[] = MlmRoiForecastPeer::DATE_YEAR;
		}

	} 
	
	public function setDateMonth($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->date_month !== $v) {
			$this->date_month = $v;
			$this->modifiedColumns[] = MlmRoiForecastPeer::DATE_MONTH;
		}

	} 
	
	public function setRoi3k5k($v)
	{

		if ($this->roi_3k_5k !== $v) {
			$this->roi_3k_5k = $v;
			$this->modifiedColumns[] = MlmRoiForecastPeer::ROI_3K_5K;
		}

	} 
	
	public function setRoi10k15k($v)
	{

		if ($this->roi_10k_15k !== $v) {
			$this->roi_10k_15k = $v;
			$this->modifiedColumns[] = MlmRoiForecastPeer::ROI_10K_15K;
		}

	} 
	
	public function setRoi30k50k($v)
	{

		if ($this->roi_30k_50k !== $v) {
			$this->roi_30k_50k = $v;
			$this->modifiedColumns[] = MlmRoiForecastPeer::ROI_30K_50K;
		}

	} 
	
	public function setCreatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = MlmRoiForecastPeer::CREATED_BY;
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
			$this->modifiedColumns[] = MlmRoiForecastPeer::CREATED_ON;
		}

	} 
	
	public function setUpdatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = MlmRoiForecastPeer::UPDATED_BY;
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
			$this->modifiedColumns[] = MlmRoiForecastPeer::UPDATED_ON;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->roi_id = $rs->getInt($startcol + 0);

			$this->date_year = $rs->getInt($startcol + 1);

			$this->date_month = $rs->getInt($startcol + 2);

			$this->roi_3k_5k = $rs->getFloat($startcol + 3);

			$this->roi_10k_15k = $rs->getFloat($startcol + 4);

			$this->roi_30k_50k = $rs->getFloat($startcol + 5);

			$this->created_by = $rs->getInt($startcol + 6);

			$this->created_on = $rs->getTimestamp($startcol + 7, null);

			$this->updated_by = $rs->getInt($startcol + 8);

			$this->updated_on = $rs->getTimestamp($startcol + 9, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 10; 
		} catch (Exception $e) {
			throw new PropelException("Error populating MlmRoiForecast object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MlmRoiForecastPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			MlmRoiForecastPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(MlmRoiForecastPeer::CREATED_ON))
    {
      $this->setCreatedOn(time());
    }

    if ($this->isModified() && !$this->isColumnModified(MlmRoiForecastPeer::UPDATED_ON))
    {
      $this->setUpdatedOn(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MlmRoiForecastPeer::DATABASE_NAME);
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
					$pk = MlmRoiForecastPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setRoiId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += MlmRoiForecastPeer::doUpdate($this, $con);
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


			if (($retval = MlmRoiForecastPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MlmRoiForecastPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRoiId();
				break;
			case 1:
				return $this->getDateYear();
				break;
			case 2:
				return $this->getDateMonth();
				break;
			case 3:
				return $this->getRoi3k5k();
				break;
			case 4:
				return $this->getRoi10k15k();
				break;
			case 5:
				return $this->getRoi30k50k();
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
		$keys = MlmRoiForecastPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRoiId(),
			$keys[1] => $this->getDateYear(),
			$keys[2] => $this->getDateMonth(),
			$keys[3] => $this->getRoi3k5k(),
			$keys[4] => $this->getRoi10k15k(),
			$keys[5] => $this->getRoi30k50k(),
			$keys[6] => $this->getCreatedBy(),
			$keys[7] => $this->getCreatedOn(),
			$keys[8] => $this->getUpdatedBy(),
			$keys[9] => $this->getUpdatedOn(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MlmRoiForecastPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRoiId($value);
				break;
			case 1:
				$this->setDateYear($value);
				break;
			case 2:
				$this->setDateMonth($value);
				break;
			case 3:
				$this->setRoi3k5k($value);
				break;
			case 4:
				$this->setRoi10k15k($value);
				break;
			case 5:
				$this->setRoi30k50k($value);
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
		$keys = MlmRoiForecastPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRoiId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDateYear($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDateMonth($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setRoi3k5k($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setRoi10k15k($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setRoi30k50k($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCreatedBy($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCreatedOn($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setUpdatedBy($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setUpdatedOn($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(MlmRoiForecastPeer::DATABASE_NAME);

		if ($this->isColumnModified(MlmRoiForecastPeer::ROI_ID)) $criteria->add(MlmRoiForecastPeer::ROI_ID, $this->roi_id);
		if ($this->isColumnModified(MlmRoiForecastPeer::DATE_YEAR)) $criteria->add(MlmRoiForecastPeer::DATE_YEAR, $this->date_year);
		if ($this->isColumnModified(MlmRoiForecastPeer::DATE_MONTH)) $criteria->add(MlmRoiForecastPeer::DATE_MONTH, $this->date_month);
		if ($this->isColumnModified(MlmRoiForecastPeer::ROI_3K_5K)) $criteria->add(MlmRoiForecastPeer::ROI_3K_5K, $this->roi_3k_5k);
		if ($this->isColumnModified(MlmRoiForecastPeer::ROI_10K_15K)) $criteria->add(MlmRoiForecastPeer::ROI_10K_15K, $this->roi_10k_15k);
		if ($this->isColumnModified(MlmRoiForecastPeer::ROI_30K_50K)) $criteria->add(MlmRoiForecastPeer::ROI_30K_50K, $this->roi_30k_50k);
		if ($this->isColumnModified(MlmRoiForecastPeer::CREATED_BY)) $criteria->add(MlmRoiForecastPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(MlmRoiForecastPeer::CREATED_ON)) $criteria->add(MlmRoiForecastPeer::CREATED_ON, $this->created_on);
		if ($this->isColumnModified(MlmRoiForecastPeer::UPDATED_BY)) $criteria->add(MlmRoiForecastPeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(MlmRoiForecastPeer::UPDATED_ON)) $criteria->add(MlmRoiForecastPeer::UPDATED_ON, $this->updated_on);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(MlmRoiForecastPeer::DATABASE_NAME);

		$criteria->add(MlmRoiForecastPeer::ROI_ID, $this->roi_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getRoiId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setRoiId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setDateYear($this->date_year);

		$copyObj->setDateMonth($this->date_month);

		$copyObj->setRoi3k5k($this->roi_3k_5k);

		$copyObj->setRoi10k15k($this->roi_10k_15k);

		$copyObj->setRoi30k50k($this->roi_30k_50k);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setCreatedOn($this->created_on);

		$copyObj->setUpdatedBy($this->updated_by);

		$copyObj->setUpdatedOn($this->updated_on);


		$copyObj->setNew(true);

		$copyObj->setRoiId(NULL); 
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
			self::$peer = new MlmRoiForecastPeer();
		}
		return self::$peer;
	}

} 