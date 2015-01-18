<?php


abstract class BaseMlmPackagePurchase extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $bankslip_id;


	
	protected $dist_id;


	
	protected $rank_id;


	
	protected $rank_code;


	
	protected $amount = 0;


	
	protected $transaction_type;


	
	protected $image_src;


	
	protected $status_code;


	
	protected $remarks;


	
	protected $approve_reject_datetime;


	
	protected $approved_by_userid;


	
	protected $created_by;


	
	protected $created_on;


	
	protected $updated_by;


	
	protected $updated_on;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getBankslipId()
	{

		return $this->bankslip_id;
	}

	
	public function getDistId()
	{

		return $this->dist_id;
	}

	
	public function getRankId()
	{

		return $this->rank_id;
	}

	
	public function getRankCode()
	{

		return $this->rank_code;
	}

	
	public function getAmount()
	{

		return $this->amount;
	}

	
	public function getTransactionType()
	{

		return $this->transaction_type;
	}

	
	public function getImageSrc()
	{

		return $this->image_src;
	}

	
	public function getStatusCode()
	{

		return $this->status_code;
	}

	
	public function getRemarks()
	{

		return $this->remarks;
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

	
	public function getApprovedByUserid()
	{

		return $this->approved_by_userid;
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

	
	public function setBankslipId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->bankslip_id !== $v) {
			$this->bankslip_id = $v;
			$this->modifiedColumns[] = MlmPackagePurchasePeer::BANKSLIP_ID;
		}

	} 

	
	public function setDistId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->dist_id !== $v) {
			$this->dist_id = $v;
			$this->modifiedColumns[] = MlmPackagePurchasePeer::DIST_ID;
		}

	} 

	
	public function setRankId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->rank_id !== $v) {
			$this->rank_id = $v;
			$this->modifiedColumns[] = MlmPackagePurchasePeer::RANK_ID;
		}

	} 

	
	public function setRankCode($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->rank_code !== $v) {
			$this->rank_code = $v;
			$this->modifiedColumns[] = MlmPackagePurchasePeer::RANK_CODE;
		}

	} 

	
	public function setAmount($v)
	{

		if ($this->amount !== $v || $v === 0) {
			$this->amount = $v;
			$this->modifiedColumns[] = MlmPackagePurchasePeer::AMOUNT;
		}

	} 

	
	public function setTransactionType($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->transaction_type !== $v) {
			$this->transaction_type = $v;
			$this->modifiedColumns[] = MlmPackagePurchasePeer::TRANSACTION_TYPE;
		}

	} 

	
	public function setImageSrc($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->image_src !== $v) {
			$this->image_src = $v;
			$this->modifiedColumns[] = MlmPackagePurchasePeer::IMAGE_SRC;
		}

	} 

	
	public function setStatusCode($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->status_code !== $v) {
			$this->status_code = $v;
			$this->modifiedColumns[] = MlmPackagePurchasePeer::STATUS_CODE;
		}

	} 

	
	public function setRemarks($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->remarks !== $v) {
			$this->remarks = $v;
			$this->modifiedColumns[] = MlmPackagePurchasePeer::REMARKS;
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
			$this->modifiedColumns[] = MlmPackagePurchasePeer::APPROVE_REJECT_DATETIME;
		}

	} 

	
	public function setApprovedByUserid($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->approved_by_userid !== $v) {
			$this->approved_by_userid = $v;
			$this->modifiedColumns[] = MlmPackagePurchasePeer::APPROVED_BY_USERID;
		}

	} 

	
	public function setCreatedBy($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = MlmPackagePurchasePeer::CREATED_BY;
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
			$this->modifiedColumns[] = MlmPackagePurchasePeer::CREATED_ON;
		}

	} 

	
	public function setUpdatedBy($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = MlmPackagePurchasePeer::UPDATED_BY;
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
			$this->modifiedColumns[] = MlmPackagePurchasePeer::UPDATED_ON;
		}

	} 

	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->bankslip_id = $rs->getInt($startcol + 0);

			$this->dist_id = $rs->getInt($startcol + 1);

			$this->rank_id = $rs->getInt($startcol + 2);

			$this->rank_code = $rs->getString($startcol + 3);

			$this->amount = $rs->getFloat($startcol + 4);

			$this->transaction_type = $rs->getString($startcol + 5);

			$this->image_src = $rs->getString($startcol + 6);

			$this->status_code = $rs->getString($startcol + 7);

			$this->remarks = $rs->getString($startcol + 8);

			$this->approve_reject_datetime = $rs->getTimestamp($startcol + 9, null);

			$this->approved_by_userid = $rs->getInt($startcol + 10);

			$this->created_by = $rs->getInt($startcol + 11);

			$this->created_on = $rs->getTimestamp($startcol + 12, null);

			$this->updated_by = $rs->getInt($startcol + 13);

			$this->updated_on = $rs->getTimestamp($startcol + 14, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 15; 
		} catch (Exception $e) {
			throw new PropelException("Error populating MlmPackagePurchase object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MlmPackagePurchasePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			MlmPackagePurchasePeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(MlmPackagePurchasePeer::CREATED_ON))
    {
      $this->setCreatedOn(time());
    }

    if ($this->isModified() && !$this->isColumnModified(MlmPackagePurchasePeer::UPDATED_ON))
    {
      $this->setUpdatedOn(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MlmPackagePurchasePeer::DATABASE_NAME);
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
					$pk = MlmPackagePurchasePeer::doInsert($this, $con);
					$affectedRows += 1; 
										 
										 

					$this->setBankslipId($pk);  

					$this->setNew(false);
				} else {
					$affectedRows += MlmPackagePurchasePeer::doUpdate($this, $con);
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


			if (($retval = MlmPackagePurchasePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MlmPackagePurchasePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getBankslipId();
				break;
			case 1:
				return $this->getDistId();
				break;
			case 2:
				return $this->getRankId();
				break;
			case 3:
				return $this->getRankCode();
				break;
			case 4:
				return $this->getAmount();
				break;
			case 5:
				return $this->getTransactionType();
				break;
			case 6:
				return $this->getImageSrc();
				break;
			case 7:
				return $this->getStatusCode();
				break;
			case 8:
				return $this->getRemarks();
				break;
			case 9:
				return $this->getApproveRejectDatetime();
				break;
			case 10:
				return $this->getApprovedByUserid();
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
		$keys = MlmPackagePurchasePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getBankslipId(),
			$keys[1] => $this->getDistId(),
			$keys[2] => $this->getRankId(),
			$keys[3] => $this->getRankCode(),
			$keys[4] => $this->getAmount(),
			$keys[5] => $this->getTransactionType(),
			$keys[6] => $this->getImageSrc(),
			$keys[7] => $this->getStatusCode(),
			$keys[8] => $this->getRemarks(),
			$keys[9] => $this->getApproveRejectDatetime(),
			$keys[10] => $this->getApprovedByUserid(),
			$keys[11] => $this->getCreatedBy(),
			$keys[12] => $this->getCreatedOn(),
			$keys[13] => $this->getUpdatedBy(),
			$keys[14] => $this->getUpdatedOn(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MlmPackagePurchasePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setBankslipId($value);
				break;
			case 1:
				$this->setDistId($value);
				break;
			case 2:
				$this->setRankId($value);
				break;
			case 3:
				$this->setRankCode($value);
				break;
			case 4:
				$this->setAmount($value);
				break;
			case 5:
				$this->setTransactionType($value);
				break;
			case 6:
				$this->setImageSrc($value);
				break;
			case 7:
				$this->setStatusCode($value);
				break;
			case 8:
				$this->setRemarks($value);
				break;
			case 9:
				$this->setApproveRejectDatetime($value);
				break;
			case 10:
				$this->setApprovedByUserid($value);
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
		$keys = MlmPackagePurchasePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setBankslipId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDistId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setRankId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setRankCode($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setAmount($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTransactionType($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setImageSrc($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setStatusCode($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setRemarks($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setApproveRejectDatetime($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setApprovedByUserid($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCreatedBy($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setCreatedOn($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setUpdatedBy($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setUpdatedOn($arr[$keys[14]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(MlmPackagePurchasePeer::DATABASE_NAME);

		if ($this->isColumnModified(MlmPackagePurchasePeer::BANKSLIP_ID)) $criteria->add(MlmPackagePurchasePeer::BANKSLIP_ID, $this->bankslip_id);
		if ($this->isColumnModified(MlmPackagePurchasePeer::DIST_ID)) $criteria->add(MlmPackagePurchasePeer::DIST_ID, $this->dist_id);
		if ($this->isColumnModified(MlmPackagePurchasePeer::RANK_ID)) $criteria->add(MlmPackagePurchasePeer::RANK_ID, $this->rank_id);
		if ($this->isColumnModified(MlmPackagePurchasePeer::RANK_CODE)) $criteria->add(MlmPackagePurchasePeer::RANK_CODE, $this->rank_code);
		if ($this->isColumnModified(MlmPackagePurchasePeer::AMOUNT)) $criteria->add(MlmPackagePurchasePeer::AMOUNT, $this->amount);
		if ($this->isColumnModified(MlmPackagePurchasePeer::TRANSACTION_TYPE)) $criteria->add(MlmPackagePurchasePeer::TRANSACTION_TYPE, $this->transaction_type);
		if ($this->isColumnModified(MlmPackagePurchasePeer::IMAGE_SRC)) $criteria->add(MlmPackagePurchasePeer::IMAGE_SRC, $this->image_src);
		if ($this->isColumnModified(MlmPackagePurchasePeer::STATUS_CODE)) $criteria->add(MlmPackagePurchasePeer::STATUS_CODE, $this->status_code);
		if ($this->isColumnModified(MlmPackagePurchasePeer::REMARKS)) $criteria->add(MlmPackagePurchasePeer::REMARKS, $this->remarks);
		if ($this->isColumnModified(MlmPackagePurchasePeer::APPROVE_REJECT_DATETIME)) $criteria->add(MlmPackagePurchasePeer::APPROVE_REJECT_DATETIME, $this->approve_reject_datetime);
		if ($this->isColumnModified(MlmPackagePurchasePeer::APPROVED_BY_USERID)) $criteria->add(MlmPackagePurchasePeer::APPROVED_BY_USERID, $this->approved_by_userid);
		if ($this->isColumnModified(MlmPackagePurchasePeer::CREATED_BY)) $criteria->add(MlmPackagePurchasePeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(MlmPackagePurchasePeer::CREATED_ON)) $criteria->add(MlmPackagePurchasePeer::CREATED_ON, $this->created_on);
		if ($this->isColumnModified(MlmPackagePurchasePeer::UPDATED_BY)) $criteria->add(MlmPackagePurchasePeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(MlmPackagePurchasePeer::UPDATED_ON)) $criteria->add(MlmPackagePurchasePeer::UPDATED_ON, $this->updated_on);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(MlmPackagePurchasePeer::DATABASE_NAME);

		$criteria->add(MlmPackagePurchasePeer::BANKSLIP_ID, $this->bankslip_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getBankslipId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setBankslipId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setDistId($this->dist_id);

		$copyObj->setRankId($this->rank_id);

		$copyObj->setRankCode($this->rank_code);

		$copyObj->setAmount($this->amount);

		$copyObj->setTransactionType($this->transaction_type);

		$copyObj->setImageSrc($this->image_src);

		$copyObj->setStatusCode($this->status_code);

		$copyObj->setRemarks($this->remarks);

		$copyObj->setApproveRejectDatetime($this->approve_reject_datetime);

		$copyObj->setApprovedByUserid($this->approved_by_userid);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setCreatedOn($this->created_on);

		$copyObj->setUpdatedBy($this->updated_by);

		$copyObj->setUpdatedOn($this->updated_on);


		$copyObj->setNew(true);

		$copyObj->setBankslipId(NULL); 

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
			self::$peer = new MlmPackagePurchasePeer();
		}
		return self::$peer;
	}

} 