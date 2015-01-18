<?php


abstract class BaseMlmDailyDistMt4Credit extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $credit_id;


	
	protected $dist_id;


	
	protected $mt4_user_name;


	
	protected $mt4_credit;


	
	protected $traded_datetime;


	
	protected $status_code = 'ACTIVE';


	
	protected $remark;


	
	protected $idx = 0;


	
	protected $created_by;


	
	protected $created_on;


	
	protected $updated_by;


	
	protected $updated_on;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCreditId()
	{

		return $this->credit_id;
	}

	
	public function getDistId()
	{

		return $this->dist_id;
	}

	
	public function getMt4UserName()
	{

		return $this->mt4_user_name;
	}

	
	public function getMt4Credit()
	{

		return $this->mt4_credit;
	}

	
	public function getTradedDatetime($format = 'Y-m-d H:i:s')
	{

		if ($this->traded_datetime === null || $this->traded_datetime === '') {
			return null;
		} elseif (!is_int($this->traded_datetime)) {
						$ts = strtotime($this->traded_datetime);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [traded_datetime] as date/time value: " . var_export($this->traded_datetime, true));
			}
		} else {
			$ts = $this->traded_datetime;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getStatusCode()
	{

		return $this->status_code;
	}

	
	public function getRemark()
	{

		return $this->remark;
	}

	
	public function getIdx()
	{

		return $this->idx;
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

	
	public function setCreditId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->credit_id !== $v) {
			$this->credit_id = $v;
			$this->modifiedColumns[] = MlmDailyDistMt4CreditPeer::CREDIT_ID;
		}

	} 
	
	public function setDistId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->dist_id !== $v) {
			$this->dist_id = $v;
			$this->modifiedColumns[] = MlmDailyDistMt4CreditPeer::DIST_ID;
		}

	} 
	
	public function setMt4UserName($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->mt4_user_name !== $v) {
			$this->mt4_user_name = $v;
			$this->modifiedColumns[] = MlmDailyDistMt4CreditPeer::MT4_USER_NAME;
		}

	} 
	
	public function setMt4Credit($v)
	{

		if ($this->mt4_credit !== $v) {
			$this->mt4_credit = $v;
			$this->modifiedColumns[] = MlmDailyDistMt4CreditPeer::MT4_CREDIT;
		}

	} 
	
	public function setTradedDatetime($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [traded_datetime] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->traded_datetime !== $ts) {
			$this->traded_datetime = $ts;
			$this->modifiedColumns[] = MlmDailyDistMt4CreditPeer::TRADED_DATETIME;
		}

	} 
	
	public function setStatusCode($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->status_code !== $v || $v === 'ACTIVE') {
			$this->status_code = $v;
			$this->modifiedColumns[] = MlmDailyDistMt4CreditPeer::STATUS_CODE;
		}

	} 
	
	public function setRemark($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->remark !== $v) {
			$this->remark = $v;
			$this->modifiedColumns[] = MlmDailyDistMt4CreditPeer::REMARK;
		}

	} 
	
	public function setIdx($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->idx !== $v || $v === 0) {
			$this->idx = $v;
			$this->modifiedColumns[] = MlmDailyDistMt4CreditPeer::IDX;
		}

	} 
	
	public function setCreatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = MlmDailyDistMt4CreditPeer::CREATED_BY;
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
			$this->modifiedColumns[] = MlmDailyDistMt4CreditPeer::CREATED_ON;
		}

	} 
	
	public function setUpdatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = MlmDailyDistMt4CreditPeer::UPDATED_BY;
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
			$this->modifiedColumns[] = MlmDailyDistMt4CreditPeer::UPDATED_ON;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->credit_id = $rs->getInt($startcol + 0);

			$this->dist_id = $rs->getInt($startcol + 1);

			$this->mt4_user_name = $rs->getString($startcol + 2);

			$this->mt4_credit = $rs->getFloat($startcol + 3);

			$this->traded_datetime = $rs->getTimestamp($startcol + 4, null);

			$this->status_code = $rs->getString($startcol + 5);

			$this->remark = $rs->getString($startcol + 6);

			$this->idx = $rs->getInt($startcol + 7);

			$this->created_by = $rs->getInt($startcol + 8);

			$this->created_on = $rs->getTimestamp($startcol + 9, null);

			$this->updated_by = $rs->getInt($startcol + 10);

			$this->updated_on = $rs->getTimestamp($startcol + 11, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 12; 
		} catch (Exception $e) {
			throw new PropelException("Error populating MlmDailyDistMt4Credit object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MlmDailyDistMt4CreditPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			MlmDailyDistMt4CreditPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(MlmDailyDistMt4CreditPeer::CREATED_ON))
    {
      $this->setCreatedOn(time());
    }

    if ($this->isModified() && !$this->isColumnModified(MlmDailyDistMt4CreditPeer::UPDATED_ON))
    {
      $this->setUpdatedOn(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MlmDailyDistMt4CreditPeer::DATABASE_NAME);
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
					$pk = MlmDailyDistMt4CreditPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setCreditId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += MlmDailyDistMt4CreditPeer::doUpdate($this, $con);
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


			if (($retval = MlmDailyDistMt4CreditPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MlmDailyDistMt4CreditPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCreditId();
				break;
			case 1:
				return $this->getDistId();
				break;
			case 2:
				return $this->getMt4UserName();
				break;
			case 3:
				return $this->getMt4Credit();
				break;
			case 4:
				return $this->getTradedDatetime();
				break;
			case 5:
				return $this->getStatusCode();
				break;
			case 6:
				return $this->getRemark();
				break;
			case 7:
				return $this->getIdx();
				break;
			case 8:
				return $this->getCreatedBy();
				break;
			case 9:
				return $this->getCreatedOn();
				break;
			case 10:
				return $this->getUpdatedBy();
				break;
			case 11:
				return $this->getUpdatedOn();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MlmDailyDistMt4CreditPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCreditId(),
			$keys[1] => $this->getDistId(),
			$keys[2] => $this->getMt4UserName(),
			$keys[3] => $this->getMt4Credit(),
			$keys[4] => $this->getTradedDatetime(),
			$keys[5] => $this->getStatusCode(),
			$keys[6] => $this->getRemark(),
			$keys[7] => $this->getIdx(),
			$keys[8] => $this->getCreatedBy(),
			$keys[9] => $this->getCreatedOn(),
			$keys[10] => $this->getUpdatedBy(),
			$keys[11] => $this->getUpdatedOn(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MlmDailyDistMt4CreditPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCreditId($value);
				break;
			case 1:
				$this->setDistId($value);
				break;
			case 2:
				$this->setMt4UserName($value);
				break;
			case 3:
				$this->setMt4Credit($value);
				break;
			case 4:
				$this->setTradedDatetime($value);
				break;
			case 5:
				$this->setStatusCode($value);
				break;
			case 6:
				$this->setRemark($value);
				break;
			case 7:
				$this->setIdx($value);
				break;
			case 8:
				$this->setCreatedBy($value);
				break;
			case 9:
				$this->setCreatedOn($value);
				break;
			case 10:
				$this->setUpdatedBy($value);
				break;
			case 11:
				$this->setUpdatedOn($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MlmDailyDistMt4CreditPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCreditId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDistId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMt4UserName($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMt4Credit($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTradedDatetime($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setStatusCode($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setRemark($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setIdx($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCreatedBy($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCreatedOn($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setUpdatedBy($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setUpdatedOn($arr[$keys[11]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(MlmDailyDistMt4CreditPeer::DATABASE_NAME);

		if ($this->isColumnModified(MlmDailyDistMt4CreditPeer::CREDIT_ID)) $criteria->add(MlmDailyDistMt4CreditPeer::CREDIT_ID, $this->credit_id);
		if ($this->isColumnModified(MlmDailyDistMt4CreditPeer::DIST_ID)) $criteria->add(MlmDailyDistMt4CreditPeer::DIST_ID, $this->dist_id);
		if ($this->isColumnModified(MlmDailyDistMt4CreditPeer::MT4_USER_NAME)) $criteria->add(MlmDailyDistMt4CreditPeer::MT4_USER_NAME, $this->mt4_user_name);
		if ($this->isColumnModified(MlmDailyDistMt4CreditPeer::MT4_CREDIT)) $criteria->add(MlmDailyDistMt4CreditPeer::MT4_CREDIT, $this->mt4_credit);
		if ($this->isColumnModified(MlmDailyDistMt4CreditPeer::TRADED_DATETIME)) $criteria->add(MlmDailyDistMt4CreditPeer::TRADED_DATETIME, $this->traded_datetime);
		if ($this->isColumnModified(MlmDailyDistMt4CreditPeer::STATUS_CODE)) $criteria->add(MlmDailyDistMt4CreditPeer::STATUS_CODE, $this->status_code);
		if ($this->isColumnModified(MlmDailyDistMt4CreditPeer::REMARK)) $criteria->add(MlmDailyDistMt4CreditPeer::REMARK, $this->remark);
		if ($this->isColumnModified(MlmDailyDistMt4CreditPeer::IDX)) $criteria->add(MlmDailyDistMt4CreditPeer::IDX, $this->idx);
		if ($this->isColumnModified(MlmDailyDistMt4CreditPeer::CREATED_BY)) $criteria->add(MlmDailyDistMt4CreditPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(MlmDailyDistMt4CreditPeer::CREATED_ON)) $criteria->add(MlmDailyDistMt4CreditPeer::CREATED_ON, $this->created_on);
		if ($this->isColumnModified(MlmDailyDistMt4CreditPeer::UPDATED_BY)) $criteria->add(MlmDailyDistMt4CreditPeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(MlmDailyDistMt4CreditPeer::UPDATED_ON)) $criteria->add(MlmDailyDistMt4CreditPeer::UPDATED_ON, $this->updated_on);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(MlmDailyDistMt4CreditPeer::DATABASE_NAME);

		$criteria->add(MlmDailyDistMt4CreditPeer::CREDIT_ID, $this->credit_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getCreditId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setCreditId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setDistId($this->dist_id);

		$copyObj->setMt4UserName($this->mt4_user_name);

		$copyObj->setMt4Credit($this->mt4_credit);

		$copyObj->setTradedDatetime($this->traded_datetime);

		$copyObj->setStatusCode($this->status_code);

		$copyObj->setRemark($this->remark);

		$copyObj->setIdx($this->idx);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setCreatedOn($this->created_on);

		$copyObj->setUpdatedBy($this->updated_by);

		$copyObj->setUpdatedOn($this->updated_on);


		$copyObj->setNew(true);

		$copyObj->setCreditId(NULL); 
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
			self::$peer = new MlmDailyDistMt4CreditPeer();
		}
		return self::$peer;
	}

} 