<?php


abstract class BaseLogAccountLedger extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $log_id;


	
	protected $account_id;


	
	protected $dist_id;


	
	protected $account_type;


	
	protected $transaction_type;


	
	protected $rolling_point = '';


	
	protected $credit = 0;


	
	protected $debit = 0;


	
	protected $balance = 0;


	
	protected $remark;


	
	protected $internal_remark;


	
	protected $referer_id;


	
	protected $referer_type;


	
	protected $access_ip;


	
	protected $created_by;


	
	protected $created_on;


	
	protected $updated_by;


	
	protected $updated_on;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getLogId()
	{

		return $this->log_id;
	}

	
	public function getAccountId()
	{

		return $this->account_id;
	}

	
	public function getDistId()
	{

		return $this->dist_id;
	}

	
	public function getAccountType()
	{

		return $this->account_type;
	}

	
	public function getTransactionType()
	{

		return $this->transaction_type;
	}

	
	public function getRollingPoint()
	{

		return $this->rolling_point;
	}

	
	public function getCredit()
	{

		return $this->credit;
	}

	
	public function getDebit()
	{

		return $this->debit;
	}

	
	public function getBalance()
	{

		return $this->balance;
	}

	
	public function getRemark()
	{

		return $this->remark;
	}

	
	public function getInternalRemark()
	{

		return $this->internal_remark;
	}

	
	public function getRefererId()
	{

		return $this->referer_id;
	}

	
	public function getRefererType()
	{

		return $this->referer_type;
	}

	
	public function getAccessIp()
	{

		return $this->access_ip;
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

	
	public function setLogId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->log_id !== $v) {
			$this->log_id = $v;
			$this->modifiedColumns[] = LogAccountLedgerPeer::LOG_ID;
		}

	} 
	
	public function setAccountId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->account_id !== $v) {
			$this->account_id = $v;
			$this->modifiedColumns[] = LogAccountLedgerPeer::ACCOUNT_ID;
		}

	} 
	
	public function setDistId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->dist_id !== $v) {
			$this->dist_id = $v;
			$this->modifiedColumns[] = LogAccountLedgerPeer::DIST_ID;
		}

	} 
	
	public function setAccountType($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->account_type !== $v) {
			$this->account_type = $v;
			$this->modifiedColumns[] = LogAccountLedgerPeer::ACCOUNT_TYPE;
		}

	} 
	
	public function setTransactionType($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->transaction_type !== $v) {
			$this->transaction_type = $v;
			$this->modifiedColumns[] = LogAccountLedgerPeer::TRANSACTION_TYPE;
		}

	} 
	
	public function setRollingPoint($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->rolling_point !== $v || $v === '') {
			$this->rolling_point = $v;
			$this->modifiedColumns[] = LogAccountLedgerPeer::ROLLING_POINT;
		}

	} 
	
	public function setCredit($v)
	{

		if ($this->credit !== $v || $v === 0) {
			$this->credit = $v;
			$this->modifiedColumns[] = LogAccountLedgerPeer::CREDIT;
		}

	} 
	
	public function setDebit($v)
	{

		if ($this->debit !== $v || $v === 0) {
			$this->debit = $v;
			$this->modifiedColumns[] = LogAccountLedgerPeer::DEBIT;
		}

	} 
	
	public function setBalance($v)
	{

		if ($this->balance !== $v || $v === 0) {
			$this->balance = $v;
			$this->modifiedColumns[] = LogAccountLedgerPeer::BALANCE;
		}

	} 
	
	public function setRemark($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->remark !== $v) {
			$this->remark = $v;
			$this->modifiedColumns[] = LogAccountLedgerPeer::REMARK;
		}

	} 
	
	public function setInternalRemark($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->internal_remark !== $v) {
			$this->internal_remark = $v;
			$this->modifiedColumns[] = LogAccountLedgerPeer::INTERNAL_REMARK;
		}

	} 
	
	public function setRefererId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->referer_id !== $v) {
			$this->referer_id = $v;
			$this->modifiedColumns[] = LogAccountLedgerPeer::REFERER_ID;
		}

	} 
	
	public function setRefererType($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->referer_type !== $v) {
			$this->referer_type = $v;
			$this->modifiedColumns[] = LogAccountLedgerPeer::REFERER_TYPE;
		}

	} 
	
	public function setAccessIp($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->access_ip !== $v) {
			$this->access_ip = $v;
			$this->modifiedColumns[] = LogAccountLedgerPeer::ACCESS_IP;
		}

	} 
	
	public function setCreatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = LogAccountLedgerPeer::CREATED_BY;
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
			$this->modifiedColumns[] = LogAccountLedgerPeer::CREATED_ON;
		}

	} 
	
	public function setUpdatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = LogAccountLedgerPeer::UPDATED_BY;
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
			$this->modifiedColumns[] = LogAccountLedgerPeer::UPDATED_ON;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->log_id = $rs->getInt($startcol + 0);

			$this->account_id = $rs->getInt($startcol + 1);

			$this->dist_id = $rs->getInt($startcol + 2);

			$this->account_type = $rs->getString($startcol + 3);

			$this->transaction_type = $rs->getString($startcol + 4);

			$this->rolling_point = $rs->getString($startcol + 5);

			$this->credit = $rs->getFloat($startcol + 6);

			$this->debit = $rs->getFloat($startcol + 7);

			$this->balance = $rs->getFloat($startcol + 8);

			$this->remark = $rs->getString($startcol + 9);

			$this->internal_remark = $rs->getString($startcol + 10);

			$this->referer_id = $rs->getInt($startcol + 11);

			$this->referer_type = $rs->getString($startcol + 12);

			$this->access_ip = $rs->getString($startcol + 13);

			$this->created_by = $rs->getInt($startcol + 14);

			$this->created_on = $rs->getTimestamp($startcol + 15, null);

			$this->updated_by = $rs->getInt($startcol + 16);

			$this->updated_on = $rs->getTimestamp($startcol + 17, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 18; 
		} catch (Exception $e) {
			throw new PropelException("Error populating LogAccountLedger object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(LogAccountLedgerPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LogAccountLedgerPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(LogAccountLedgerPeer::CREATED_ON))
    {
      $this->setCreatedOn(time());
    }

    if ($this->isModified() && !$this->isColumnModified(LogAccountLedgerPeer::UPDATED_ON))
    {
      $this->setUpdatedOn(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(LogAccountLedgerPeer::DATABASE_NAME);
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
					$pk = LogAccountLedgerPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setLogId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LogAccountLedgerPeer::doUpdate($this, $con);
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


			if (($retval = LogAccountLedgerPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LogAccountLedgerPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getLogId();
				break;
			case 1:
				return $this->getAccountId();
				break;
			case 2:
				return $this->getDistId();
				break;
			case 3:
				return $this->getAccountType();
				break;
			case 4:
				return $this->getTransactionType();
				break;
			case 5:
				return $this->getRollingPoint();
				break;
			case 6:
				return $this->getCredit();
				break;
			case 7:
				return $this->getDebit();
				break;
			case 8:
				return $this->getBalance();
				break;
			case 9:
				return $this->getRemark();
				break;
			case 10:
				return $this->getInternalRemark();
				break;
			case 11:
				return $this->getRefererId();
				break;
			case 12:
				return $this->getRefererType();
				break;
			case 13:
				return $this->getAccessIp();
				break;
			case 14:
				return $this->getCreatedBy();
				break;
			case 15:
				return $this->getCreatedOn();
				break;
			case 16:
				return $this->getUpdatedBy();
				break;
			case 17:
				return $this->getUpdatedOn();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LogAccountLedgerPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getLogId(),
			$keys[1] => $this->getAccountId(),
			$keys[2] => $this->getDistId(),
			$keys[3] => $this->getAccountType(),
			$keys[4] => $this->getTransactionType(),
			$keys[5] => $this->getRollingPoint(),
			$keys[6] => $this->getCredit(),
			$keys[7] => $this->getDebit(),
			$keys[8] => $this->getBalance(),
			$keys[9] => $this->getRemark(),
			$keys[10] => $this->getInternalRemark(),
			$keys[11] => $this->getRefererId(),
			$keys[12] => $this->getRefererType(),
			$keys[13] => $this->getAccessIp(),
			$keys[14] => $this->getCreatedBy(),
			$keys[15] => $this->getCreatedOn(),
			$keys[16] => $this->getUpdatedBy(),
			$keys[17] => $this->getUpdatedOn(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LogAccountLedgerPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setLogId($value);
				break;
			case 1:
				$this->setAccountId($value);
				break;
			case 2:
				$this->setDistId($value);
				break;
			case 3:
				$this->setAccountType($value);
				break;
			case 4:
				$this->setTransactionType($value);
				break;
			case 5:
				$this->setRollingPoint($value);
				break;
			case 6:
				$this->setCredit($value);
				break;
			case 7:
				$this->setDebit($value);
				break;
			case 8:
				$this->setBalance($value);
				break;
			case 9:
				$this->setRemark($value);
				break;
			case 10:
				$this->setInternalRemark($value);
				break;
			case 11:
				$this->setRefererId($value);
				break;
			case 12:
				$this->setRefererType($value);
				break;
			case 13:
				$this->setAccessIp($value);
				break;
			case 14:
				$this->setCreatedBy($value);
				break;
			case 15:
				$this->setCreatedOn($value);
				break;
			case 16:
				$this->setUpdatedBy($value);
				break;
			case 17:
				$this->setUpdatedOn($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LogAccountLedgerPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setLogId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setAccountId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDistId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setAccountType($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTransactionType($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setRollingPoint($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCredit($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setDebit($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setBalance($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setRemark($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setInternalRemark($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setRefererId($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setRefererType($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setAccessIp($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setCreatedBy($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setCreatedOn($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setUpdatedBy($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setUpdatedOn($arr[$keys[17]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LogAccountLedgerPeer::DATABASE_NAME);

		if ($this->isColumnModified(LogAccountLedgerPeer::LOG_ID)) $criteria->add(LogAccountLedgerPeer::LOG_ID, $this->log_id);
		if ($this->isColumnModified(LogAccountLedgerPeer::ACCOUNT_ID)) $criteria->add(LogAccountLedgerPeer::ACCOUNT_ID, $this->account_id);
		if ($this->isColumnModified(LogAccountLedgerPeer::DIST_ID)) $criteria->add(LogAccountLedgerPeer::DIST_ID, $this->dist_id);
		if ($this->isColumnModified(LogAccountLedgerPeer::ACCOUNT_TYPE)) $criteria->add(LogAccountLedgerPeer::ACCOUNT_TYPE, $this->account_type);
		if ($this->isColumnModified(LogAccountLedgerPeer::TRANSACTION_TYPE)) $criteria->add(LogAccountLedgerPeer::TRANSACTION_TYPE, $this->transaction_type);
		if ($this->isColumnModified(LogAccountLedgerPeer::ROLLING_POINT)) $criteria->add(LogAccountLedgerPeer::ROLLING_POINT, $this->rolling_point);
		if ($this->isColumnModified(LogAccountLedgerPeer::CREDIT)) $criteria->add(LogAccountLedgerPeer::CREDIT, $this->credit);
		if ($this->isColumnModified(LogAccountLedgerPeer::DEBIT)) $criteria->add(LogAccountLedgerPeer::DEBIT, $this->debit);
		if ($this->isColumnModified(LogAccountLedgerPeer::BALANCE)) $criteria->add(LogAccountLedgerPeer::BALANCE, $this->balance);
		if ($this->isColumnModified(LogAccountLedgerPeer::REMARK)) $criteria->add(LogAccountLedgerPeer::REMARK, $this->remark);
		if ($this->isColumnModified(LogAccountLedgerPeer::INTERNAL_REMARK)) $criteria->add(LogAccountLedgerPeer::INTERNAL_REMARK, $this->internal_remark);
		if ($this->isColumnModified(LogAccountLedgerPeer::REFERER_ID)) $criteria->add(LogAccountLedgerPeer::REFERER_ID, $this->referer_id);
		if ($this->isColumnModified(LogAccountLedgerPeer::REFERER_TYPE)) $criteria->add(LogAccountLedgerPeer::REFERER_TYPE, $this->referer_type);
		if ($this->isColumnModified(LogAccountLedgerPeer::ACCESS_IP)) $criteria->add(LogAccountLedgerPeer::ACCESS_IP, $this->access_ip);
		if ($this->isColumnModified(LogAccountLedgerPeer::CREATED_BY)) $criteria->add(LogAccountLedgerPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(LogAccountLedgerPeer::CREATED_ON)) $criteria->add(LogAccountLedgerPeer::CREATED_ON, $this->created_on);
		if ($this->isColumnModified(LogAccountLedgerPeer::UPDATED_BY)) $criteria->add(LogAccountLedgerPeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(LogAccountLedgerPeer::UPDATED_ON)) $criteria->add(LogAccountLedgerPeer::UPDATED_ON, $this->updated_on);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LogAccountLedgerPeer::DATABASE_NAME);

		$criteria->add(LogAccountLedgerPeer::LOG_ID, $this->log_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getLogId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setLogId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setAccountId($this->account_id);

		$copyObj->setDistId($this->dist_id);

		$copyObj->setAccountType($this->account_type);

		$copyObj->setTransactionType($this->transaction_type);

		$copyObj->setRollingPoint($this->rolling_point);

		$copyObj->setCredit($this->credit);

		$copyObj->setDebit($this->debit);

		$copyObj->setBalance($this->balance);

		$copyObj->setRemark($this->remark);

		$copyObj->setInternalRemark($this->internal_remark);

		$copyObj->setRefererId($this->referer_id);

		$copyObj->setRefererType($this->referer_type);

		$copyObj->setAccessIp($this->access_ip);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setCreatedOn($this->created_on);

		$copyObj->setUpdatedBy($this->updated_by);

		$copyObj->setUpdatedOn($this->updated_on);


		$copyObj->setNew(true);

		$copyObj->setLogId(NULL); 
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
			self::$peer = new LogAccountLedgerPeer();
		}
		return self::$peer;
	}

} 