<?php


abstract class BaseMlmProductPurchaseHistory extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $history_id;


	
	protected $dist_id;


	
	protected $total_amount;


	
	protected $status_code;


	
	protected $approve_reject_datetime;


	
	protected $remarks;


	
	protected $created_by;


	
	protected $created_on;


	
	protected $updated_by;


	
	protected $updated_on;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getHistoryId()
	{

		return $this->history_id;
	}

	
	public function getDistId()
	{

		return $this->dist_id;
	}

	
	public function getTotalAmount()
	{

		return $this->total_amount;
	}

	
	public function getStatusCode()
	{

		return $this->status_code;
	}

	
	public function getApproveRejectDatetime($format = 'Y-m-d H:i:s')
	{

		if ($this->approve_reject_datetime === null || $this->approve_reject_datetime === '') {
			return null;
		} elseif (!is_int($this->approve_reject_datetime)) {
						$ts = strtotime($this->approve_reject_datetime);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [approve_reject_datetime] as date/time value: " . var_export($this->approve_reject_datetime, true));
			}
		} else {
			$ts = $this->approve_reject_datetime;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getRemarks()
	{

		return $this->remarks;
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

	
	public function setHistoryId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->history_id !== $v) {
			$this->history_id = $v;
			$this->modifiedColumns[] = MlmProductPurchaseHistoryPeer::HISTORY_ID;
		}

	} 
	
	public function setDistId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->dist_id !== $v) {
			$this->dist_id = $v;
			$this->modifiedColumns[] = MlmProductPurchaseHistoryPeer::DIST_ID;
		}

	} 
	
	public function setTotalAmount($v)
	{

		if ($this->total_amount !== $v) {
			$this->total_amount = $v;
			$this->modifiedColumns[] = MlmProductPurchaseHistoryPeer::TOTAL_AMOUNT;
		}

	} 
	
	public function setStatusCode($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->status_code !== $v) {
			$this->status_code = $v;
			$this->modifiedColumns[] = MlmProductPurchaseHistoryPeer::STATUS_CODE;
		}

	} 
	
	public function setApproveRejectDatetime($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [approve_reject_datetime] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->approve_reject_datetime !== $ts) {
			$this->approve_reject_datetime = $ts;
			$this->modifiedColumns[] = MlmProductPurchaseHistoryPeer::APPROVE_REJECT_DATETIME;
		}

	} 
	
	public function setRemarks($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->remarks !== $v) {
			$this->remarks = $v;
			$this->modifiedColumns[] = MlmProductPurchaseHistoryPeer::REMARKS;
		}

	} 
	
	public function setCreatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = MlmProductPurchaseHistoryPeer::CREATED_BY;
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
			$this->modifiedColumns[] = MlmProductPurchaseHistoryPeer::CREATED_ON;
		}

	} 
	
	public function setUpdatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = MlmProductPurchaseHistoryPeer::UPDATED_BY;
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
			$this->modifiedColumns[] = MlmProductPurchaseHistoryPeer::UPDATED_ON;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->history_id = $rs->getInt($startcol + 0);

			$this->dist_id = $rs->getInt($startcol + 1);

			$this->total_amount = $rs->getFloat($startcol + 2);

			$this->status_code = $rs->getString($startcol + 3);

			$this->approve_reject_datetime = $rs->getTimestamp($startcol + 4, null);

			$this->remarks = $rs->getString($startcol + 5);

			$this->created_by = $rs->getInt($startcol + 6);

			$this->created_on = $rs->getTimestamp($startcol + 7, null);

			$this->updated_by = $rs->getInt($startcol + 8);

			$this->updated_on = $rs->getTimestamp($startcol + 9, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 10; 
		} catch (Exception $e) {
			throw new PropelException("Error populating MlmProductPurchaseHistory object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MlmProductPurchaseHistoryPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			MlmProductPurchaseHistoryPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(MlmProductPurchaseHistoryPeer::CREATED_ON))
    {
      $this->setCreatedOn(time());
    }

    if ($this->isModified() && !$this->isColumnModified(MlmProductPurchaseHistoryPeer::UPDATED_ON))
    {
      $this->setUpdatedOn(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MlmProductPurchaseHistoryPeer::DATABASE_NAME);
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
					$pk = MlmProductPurchaseHistoryPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setHistoryId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += MlmProductPurchaseHistoryPeer::doUpdate($this, $con);
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


			if (($retval = MlmProductPurchaseHistoryPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MlmProductPurchaseHistoryPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getHistoryId();
				break;
			case 1:
				return $this->getDistId();
				break;
			case 2:
				return $this->getTotalAmount();
				break;
			case 3:
				return $this->getStatusCode();
				break;
			case 4:
				return $this->getApproveRejectDatetime();
				break;
			case 5:
				return $this->getRemarks();
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
		$keys = MlmProductPurchaseHistoryPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getHistoryId(),
			$keys[1] => $this->getDistId(),
			$keys[2] => $this->getTotalAmount(),
			$keys[3] => $this->getStatusCode(),
			$keys[4] => $this->getApproveRejectDatetime(),
			$keys[5] => $this->getRemarks(),
			$keys[6] => $this->getCreatedBy(),
			$keys[7] => $this->getCreatedOn(),
			$keys[8] => $this->getUpdatedBy(),
			$keys[9] => $this->getUpdatedOn(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MlmProductPurchaseHistoryPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setHistoryId($value);
				break;
			case 1:
				$this->setDistId($value);
				break;
			case 2:
				$this->setTotalAmount($value);
				break;
			case 3:
				$this->setStatusCode($value);
				break;
			case 4:
				$this->setApproveRejectDatetime($value);
				break;
			case 5:
				$this->setRemarks($value);
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
		$keys = MlmProductPurchaseHistoryPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setHistoryId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDistId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTotalAmount($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setStatusCode($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setApproveRejectDatetime($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setRemarks($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCreatedBy($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCreatedOn($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setUpdatedBy($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setUpdatedOn($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(MlmProductPurchaseHistoryPeer::DATABASE_NAME);

		if ($this->isColumnModified(MlmProductPurchaseHistoryPeer::HISTORY_ID)) $criteria->add(MlmProductPurchaseHistoryPeer::HISTORY_ID, $this->history_id);
		if ($this->isColumnModified(MlmProductPurchaseHistoryPeer::DIST_ID)) $criteria->add(MlmProductPurchaseHistoryPeer::DIST_ID, $this->dist_id);
		if ($this->isColumnModified(MlmProductPurchaseHistoryPeer::TOTAL_AMOUNT)) $criteria->add(MlmProductPurchaseHistoryPeer::TOTAL_AMOUNT, $this->total_amount);
		if ($this->isColumnModified(MlmProductPurchaseHistoryPeer::STATUS_CODE)) $criteria->add(MlmProductPurchaseHistoryPeer::STATUS_CODE, $this->status_code);
		if ($this->isColumnModified(MlmProductPurchaseHistoryPeer::APPROVE_REJECT_DATETIME)) $criteria->add(MlmProductPurchaseHistoryPeer::APPROVE_REJECT_DATETIME, $this->approve_reject_datetime);
		if ($this->isColumnModified(MlmProductPurchaseHistoryPeer::REMARKS)) $criteria->add(MlmProductPurchaseHistoryPeer::REMARKS, $this->remarks);
		if ($this->isColumnModified(MlmProductPurchaseHistoryPeer::CREATED_BY)) $criteria->add(MlmProductPurchaseHistoryPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(MlmProductPurchaseHistoryPeer::CREATED_ON)) $criteria->add(MlmProductPurchaseHistoryPeer::CREATED_ON, $this->created_on);
		if ($this->isColumnModified(MlmProductPurchaseHistoryPeer::UPDATED_BY)) $criteria->add(MlmProductPurchaseHistoryPeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(MlmProductPurchaseHistoryPeer::UPDATED_ON)) $criteria->add(MlmProductPurchaseHistoryPeer::UPDATED_ON, $this->updated_on);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(MlmProductPurchaseHistoryPeer::DATABASE_NAME);

		$criteria->add(MlmProductPurchaseHistoryPeer::HISTORY_ID, $this->history_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getHistoryId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setHistoryId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setDistId($this->dist_id);

		$copyObj->setTotalAmount($this->total_amount);

		$copyObj->setStatusCode($this->status_code);

		$copyObj->setApproveRejectDatetime($this->approve_reject_datetime);

		$copyObj->setRemarks($this->remarks);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setCreatedOn($this->created_on);

		$copyObj->setUpdatedBy($this->updated_by);

		$copyObj->setUpdatedOn($this->updated_on);


		$copyObj->setNew(true);

		$copyObj->setHistoryId(NULL); 
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
			self::$peer = new MlmProductPurchaseHistoryPeer();
		}
		return self::$peer;
	}

} 