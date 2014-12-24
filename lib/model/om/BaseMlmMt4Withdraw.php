<?php


abstract class BaseMlmMt4Withdraw extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $withdraw_id;


	
	protected $dist_id;


	
	protected $mt4_user_name;


	
	protected $amount_requested = 0;


	
	protected $handling_fee;


	
	protected $grand_amount;


	
	protected $currency_code;


	
	protected $payment_type;


	
	protected $status_code;


	
	protected $approve_reject_datetime;


	
	protected $remarks;


	
	protected $created_by;


	
	protected $created_on;


	
	protected $updated_by;


	
	protected $updated_on;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getWithdrawId()
	{

		return $this->withdraw_id;
	}

	
	public function getDistId()
	{

		return $this->dist_id;
	}

	
	public function getMt4UserName()
	{

		return $this->mt4_user_name;
	}

	
	public function getAmountRequested()
	{

		return $this->amount_requested;
	}

	
	public function getHandlingFee()
	{

		return $this->handling_fee;
	}

	
	public function getGrandAmount()
	{

		return $this->grand_amount;
	}

	
	public function getCurrencyCode()
	{

		return $this->currency_code;
	}

	
	public function getPaymentType()
	{

		return $this->payment_type;
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

	
	public function setWithdrawId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->withdraw_id !== $v) {
			$this->withdraw_id = $v;
			$this->modifiedColumns[] = MlmMt4WithdrawPeer::WITHDRAW_ID;
		}

	} 
	
	public function setDistId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->dist_id !== $v) {
			$this->dist_id = $v;
			$this->modifiedColumns[] = MlmMt4WithdrawPeer::DIST_ID;
		}

	} 
	
	public function setMt4UserName($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->mt4_user_name !== $v) {
			$this->mt4_user_name = $v;
			$this->modifiedColumns[] = MlmMt4WithdrawPeer::MT4_USER_NAME;
		}

	} 
	
	public function setAmountRequested($v)
	{

		if ($this->amount_requested !== $v || $v === 0) {
			$this->amount_requested = $v;
			$this->modifiedColumns[] = MlmMt4WithdrawPeer::AMOUNT_REQUESTED;
		}

	} 
	
	public function setHandlingFee($v)
	{

		if ($this->handling_fee !== $v) {
			$this->handling_fee = $v;
			$this->modifiedColumns[] = MlmMt4WithdrawPeer::HANDLING_FEE;
		}

	} 
	
	public function setGrandAmount($v)
	{

		if ($this->grand_amount !== $v) {
			$this->grand_amount = $v;
			$this->modifiedColumns[] = MlmMt4WithdrawPeer::GRAND_AMOUNT;
		}

	} 
	
	public function setCurrencyCode($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->currency_code !== $v) {
			$this->currency_code = $v;
			$this->modifiedColumns[] = MlmMt4WithdrawPeer::CURRENCY_CODE;
		}

	} 
	
	public function setPaymentType($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->payment_type !== $v) {
			$this->payment_type = $v;
			$this->modifiedColumns[] = MlmMt4WithdrawPeer::PAYMENT_TYPE;
		}

	} 
	
	public function setStatusCode($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->status_code !== $v) {
			$this->status_code = $v;
			$this->modifiedColumns[] = MlmMt4WithdrawPeer::STATUS_CODE;
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
			$this->modifiedColumns[] = MlmMt4WithdrawPeer::APPROVE_REJECT_DATETIME;
		}

	} 
	
	public function setRemarks($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->remarks !== $v) {
			$this->remarks = $v;
			$this->modifiedColumns[] = MlmMt4WithdrawPeer::REMARKS;
		}

	} 
	
	public function setCreatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = MlmMt4WithdrawPeer::CREATED_BY;
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
			$this->modifiedColumns[] = MlmMt4WithdrawPeer::CREATED_ON;
		}

	} 
	
	public function setUpdatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = MlmMt4WithdrawPeer::UPDATED_BY;
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
			$this->modifiedColumns[] = MlmMt4WithdrawPeer::UPDATED_ON;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->withdraw_id = $rs->getInt($startcol + 0);

			$this->dist_id = $rs->getInt($startcol + 1);

			$this->mt4_user_name = $rs->getString($startcol + 2);

			$this->amount_requested = $rs->getFloat($startcol + 3);

			$this->handling_fee = $rs->getFloat($startcol + 4);

			$this->grand_amount = $rs->getFloat($startcol + 5);

			$this->currency_code = $rs->getString($startcol + 6);

			$this->payment_type = $rs->getString($startcol + 7);

			$this->status_code = $rs->getString($startcol + 8);

			$this->approve_reject_datetime = $rs->getTimestamp($startcol + 9, null);

			$this->remarks = $rs->getString($startcol + 10);

			$this->created_by = $rs->getInt($startcol + 11);

			$this->created_on = $rs->getTimestamp($startcol + 12, null);

			$this->updated_by = $rs->getInt($startcol + 13);

			$this->updated_on = $rs->getTimestamp($startcol + 14, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 15; 
		} catch (Exception $e) {
			throw new PropelException("Error populating MlmMt4Withdraw object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MlmMt4WithdrawPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			MlmMt4WithdrawPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(MlmMt4WithdrawPeer::CREATED_ON))
    {
      $this->setCreatedOn(time());
    }

    if ($this->isModified() && !$this->isColumnModified(MlmMt4WithdrawPeer::UPDATED_ON))
    {
      $this->setUpdatedOn(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MlmMt4WithdrawPeer::DATABASE_NAME);
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
					$pk = MlmMt4WithdrawPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setWithdrawId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += MlmMt4WithdrawPeer::doUpdate($this, $con);
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


			if (($retval = MlmMt4WithdrawPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MlmMt4WithdrawPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getWithdrawId();
				break;
			case 1:
				return $this->getDistId();
				break;
			case 2:
				return $this->getMt4UserName();
				break;
			case 3:
				return $this->getAmountRequested();
				break;
			case 4:
				return $this->getHandlingFee();
				break;
			case 5:
				return $this->getGrandAmount();
				break;
			case 6:
				return $this->getCurrencyCode();
				break;
			case 7:
				return $this->getPaymentType();
				break;
			case 8:
				return $this->getStatusCode();
				break;
			case 9:
				return $this->getApproveRejectDatetime();
				break;
			case 10:
				return $this->getRemarks();
				break;
			case 11:
				return $this->getCreatedBy();
				break;
			case 12:
				return $this->getCreatedOn();
				break;
			case 13:
				return $this->getUpdatedBy();
				break;
			case 14:
				return $this->getUpdatedOn();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MlmMt4WithdrawPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getWithdrawId(),
			$keys[1] => $this->getDistId(),
			$keys[2] => $this->getMt4UserName(),
			$keys[3] => $this->getAmountRequested(),
			$keys[4] => $this->getHandlingFee(),
			$keys[5] => $this->getGrandAmount(),
			$keys[6] => $this->getCurrencyCode(),
			$keys[7] => $this->getPaymentType(),
			$keys[8] => $this->getStatusCode(),
			$keys[9] => $this->getApproveRejectDatetime(),
			$keys[10] => $this->getRemarks(),
			$keys[11] => $this->getCreatedBy(),
			$keys[12] => $this->getCreatedOn(),
			$keys[13] => $this->getUpdatedBy(),
			$keys[14] => $this->getUpdatedOn(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MlmMt4WithdrawPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setWithdrawId($value);
				break;
			case 1:
				$this->setDistId($value);
				break;
			case 2:
				$this->setMt4UserName($value);
				break;
			case 3:
				$this->setAmountRequested($value);
				break;
			case 4:
				$this->setHandlingFee($value);
				break;
			case 5:
				$this->setGrandAmount($value);
				break;
			case 6:
				$this->setCurrencyCode($value);
				break;
			case 7:
				$this->setPaymentType($value);
				break;
			case 8:
				$this->setStatusCode($value);
				break;
			case 9:
				$this->setApproveRejectDatetime($value);
				break;
			case 10:
				$this->setRemarks($value);
				break;
			case 11:
				$this->setCreatedBy($value);
				break;
			case 12:
				$this->setCreatedOn($value);
				break;
			case 13:
				$this->setUpdatedBy($value);
				break;
			case 14:
				$this->setUpdatedOn($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MlmMt4WithdrawPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setWithdrawId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDistId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMt4UserName($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setAmountRequested($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setHandlingFee($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setGrandAmount($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCurrencyCode($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setPaymentType($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setStatusCode($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setApproveRejectDatetime($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setRemarks($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCreatedBy($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setCreatedOn($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setUpdatedBy($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setUpdatedOn($arr[$keys[14]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(MlmMt4WithdrawPeer::DATABASE_NAME);

		if ($this->isColumnModified(MlmMt4WithdrawPeer::WITHDRAW_ID)) $criteria->add(MlmMt4WithdrawPeer::WITHDRAW_ID, $this->withdraw_id);
		if ($this->isColumnModified(MlmMt4WithdrawPeer::DIST_ID)) $criteria->add(MlmMt4WithdrawPeer::DIST_ID, $this->dist_id);
		if ($this->isColumnModified(MlmMt4WithdrawPeer::MT4_USER_NAME)) $criteria->add(MlmMt4WithdrawPeer::MT4_USER_NAME, $this->mt4_user_name);
		if ($this->isColumnModified(MlmMt4WithdrawPeer::AMOUNT_REQUESTED)) $criteria->add(MlmMt4WithdrawPeer::AMOUNT_REQUESTED, $this->amount_requested);
		if ($this->isColumnModified(MlmMt4WithdrawPeer::HANDLING_FEE)) $criteria->add(MlmMt4WithdrawPeer::HANDLING_FEE, $this->handling_fee);
		if ($this->isColumnModified(MlmMt4WithdrawPeer::GRAND_AMOUNT)) $criteria->add(MlmMt4WithdrawPeer::GRAND_AMOUNT, $this->grand_amount);
		if ($this->isColumnModified(MlmMt4WithdrawPeer::CURRENCY_CODE)) $criteria->add(MlmMt4WithdrawPeer::CURRENCY_CODE, $this->currency_code);
		if ($this->isColumnModified(MlmMt4WithdrawPeer::PAYMENT_TYPE)) $criteria->add(MlmMt4WithdrawPeer::PAYMENT_TYPE, $this->payment_type);
		if ($this->isColumnModified(MlmMt4WithdrawPeer::STATUS_CODE)) $criteria->add(MlmMt4WithdrawPeer::STATUS_CODE, $this->status_code);
		if ($this->isColumnModified(MlmMt4WithdrawPeer::APPROVE_REJECT_DATETIME)) $criteria->add(MlmMt4WithdrawPeer::APPROVE_REJECT_DATETIME, $this->approve_reject_datetime);
		if ($this->isColumnModified(MlmMt4WithdrawPeer::REMARKS)) $criteria->add(MlmMt4WithdrawPeer::REMARKS, $this->remarks);
		if ($this->isColumnModified(MlmMt4WithdrawPeer::CREATED_BY)) $criteria->add(MlmMt4WithdrawPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(MlmMt4WithdrawPeer::CREATED_ON)) $criteria->add(MlmMt4WithdrawPeer::CREATED_ON, $this->created_on);
		if ($this->isColumnModified(MlmMt4WithdrawPeer::UPDATED_BY)) $criteria->add(MlmMt4WithdrawPeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(MlmMt4WithdrawPeer::UPDATED_ON)) $criteria->add(MlmMt4WithdrawPeer::UPDATED_ON, $this->updated_on);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(MlmMt4WithdrawPeer::DATABASE_NAME);

		$criteria->add(MlmMt4WithdrawPeer::WITHDRAW_ID, $this->withdraw_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getWithdrawId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setWithdrawId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setDistId($this->dist_id);

		$copyObj->setMt4UserName($this->mt4_user_name);

		$copyObj->setAmountRequested($this->amount_requested);

		$copyObj->setHandlingFee($this->handling_fee);

		$copyObj->setGrandAmount($this->grand_amount);

		$copyObj->setCurrencyCode($this->currency_code);

		$copyObj->setPaymentType($this->payment_type);

		$copyObj->setStatusCode($this->status_code);

		$copyObj->setApproveRejectDatetime($this->approve_reject_datetime);

		$copyObj->setRemarks($this->remarks);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setCreatedOn($this->created_on);

		$copyObj->setUpdatedBy($this->updated_by);

		$copyObj->setUpdatedOn($this->updated_on);


		$copyObj->setNew(true);

		$copyObj->setWithdrawId(NULL); 
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
			self::$peer = new MlmMt4WithdrawPeer();
		}
		return self::$peer;
	}

} 