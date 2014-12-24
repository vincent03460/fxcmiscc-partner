<?php


abstract class BaseMlmAccountLedger extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $account_id;


	
	protected $dist_id;


	
	protected $account_type;


	
	protected $transaction_type;


	
	protected $credit = 0;


	
	protected $debit = 0;


	
	protected $balance = 0;


	
	protected $remark;


	
	protected $internal_remark;


	
	protected $ref_id;


	
	protected $ref_type;


	
	protected $created_by;


	
	protected $created_on;


	
	protected $updated_by;


	
	protected $updated_on;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
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

	
	public function getRefId()
	{

		return $this->ref_id;
	}

	
	public function getRefType()
	{

		return $this->ref_type;
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

	
	public function setAccountId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->account_id !== $v) {
			$this->account_id = $v;
			$this->modifiedColumns[] = MlmAccountLedgerPeer::ACCOUNT_ID;
		}

	} 
	
	public function setDistId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->dist_id !== $v) {
			$this->dist_id = $v;
			$this->modifiedColumns[] = MlmAccountLedgerPeer::DIST_ID;
		}

	} 
	
	public function setAccountType($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->account_type !== $v) {
			$this->account_type = $v;
			$this->modifiedColumns[] = MlmAccountLedgerPeer::ACCOUNT_TYPE;
		}

	} 
	
	public function setTransactionType($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->transaction_type !== $v) {
			$this->transaction_type = $v;
			$this->modifiedColumns[] = MlmAccountLedgerPeer::TRANSACTION_TYPE;
		}

	} 
	
	public function setCredit($v)
	{

		if ($this->credit !== $v || $v === 0) {
			$this->credit = $v;
			$this->modifiedColumns[] = MlmAccountLedgerPeer::CREDIT;
		}

	} 
	
	public function setDebit($v)
	{

		if ($this->debit !== $v || $v === 0) {
			$this->debit = $v;
			$this->modifiedColumns[] = MlmAccountLedgerPeer::DEBIT;
		}

	} 
	
	public function setBalance($v)
	{

		if ($this->balance !== $v || $v === 0) {
			$this->balance = $v;
			$this->modifiedColumns[] = MlmAccountLedgerPeer::BALANCE;
		}

	} 
	
	public function setRemark($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->remark !== $v) {
			$this->remark = $v;
			$this->modifiedColumns[] = MlmAccountLedgerPeer::REMARK;
		}

	} 
	
	public function setInternalRemark($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->internal_remark !== $v) {
			$this->internal_remark = $v;
			$this->modifiedColumns[] = MlmAccountLedgerPeer::INTERNAL_REMARK;
		}

	} 
	
	public function setRefId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->ref_id !== $v) {
			$this->ref_id = $v;
			$this->modifiedColumns[] = MlmAccountLedgerPeer::REF_ID;
		}

	} 
	
	public function setRefType($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->ref_type !== $v) {
			$this->ref_type = $v;
			$this->modifiedColumns[] = MlmAccountLedgerPeer::REF_TYPE;
		}

	} 
	
	public function setCreatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = MlmAccountLedgerPeer::CREATED_BY;
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
			$this->modifiedColumns[] = MlmAccountLedgerPeer::CREATED_ON;
		}

	} 
	
	public function setUpdatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = MlmAccountLedgerPeer::UPDATED_BY;
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
			$this->modifiedColumns[] = MlmAccountLedgerPeer::UPDATED_ON;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->account_id = $rs->getInt($startcol + 0);

			$this->dist_id = $rs->getInt($startcol + 1);

			$this->account_type = $rs->getString($startcol + 2);

			$this->transaction_type = $rs->getString($startcol + 3);

			$this->credit = $rs->getFloat($startcol + 4);

			$this->debit = $rs->getFloat($startcol + 5);

			$this->balance = $rs->getFloat($startcol + 6);

			$this->remark = $rs->getString($startcol + 7);

			$this->internal_remark = $rs->getString($startcol + 8);

			$this->ref_id = $rs->getInt($startcol + 9);

			$this->ref_type = $rs->getString($startcol + 10);

			$this->created_by = $rs->getInt($startcol + 11);

			$this->created_on = $rs->getTimestamp($startcol + 12, null);

			$this->updated_by = $rs->getInt($startcol + 13);

			$this->updated_on = $rs->getTimestamp($startcol + 14, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 15; 
		} catch (Exception $e) {
			throw new PropelException("Error populating MlmAccountLedger object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MlmAccountLedgerPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			MlmAccountLedgerPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(MlmAccountLedgerPeer::CREATED_ON))
    {
      $this->setCreatedOn(time());
    }

    if ($this->isModified() && !$this->isColumnModified(MlmAccountLedgerPeer::UPDATED_ON))
    {
      $this->setUpdatedOn(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MlmAccountLedgerPeer::DATABASE_NAME);
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
					$pk = MlmAccountLedgerPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setAccountId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += MlmAccountLedgerPeer::doUpdate($this, $con);
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


			if (($retval = MlmAccountLedgerPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MlmAccountLedgerPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getAccountId();
				break;
			case 1:
				return $this->getDistId();
				break;
			case 2:
				return $this->getAccountType();
				break;
			case 3:
				return $this->getTransactionType();
				break;
			case 4:
				return $this->getCredit();
				break;
			case 5:
				return $this->getDebit();
				break;
			case 6:
				return $this->getBalance();
				break;
			case 7:
				return $this->getRemark();
				break;
			case 8:
				return $this->getInternalRemark();
				break;
			case 9:
				return $this->getRefId();
				break;
			case 10:
				return $this->getRefType();
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
		$keys = MlmAccountLedgerPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getAccountId(),
			$keys[1] => $this->getDistId(),
			$keys[2] => $this->getAccountType(),
			$keys[3] => $this->getTransactionType(),
			$keys[4] => $this->getCredit(),
			$keys[5] => $this->getDebit(),
			$keys[6] => $this->getBalance(),
			$keys[7] => $this->getRemark(),
			$keys[8] => $this->getInternalRemark(),
			$keys[9] => $this->getRefId(),
			$keys[10] => $this->getRefType(),
			$keys[11] => $this->getCreatedBy(),
			$keys[12] => $this->getCreatedOn(),
			$keys[13] => $this->getUpdatedBy(),
			$keys[14] => $this->getUpdatedOn(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MlmAccountLedgerPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setAccountId($value);
				break;
			case 1:
				$this->setDistId($value);
				break;
			case 2:
				$this->setAccountType($value);
				break;
			case 3:
				$this->setTransactionType($value);
				break;
			case 4:
				$this->setCredit($value);
				break;
			case 5:
				$this->setDebit($value);
				break;
			case 6:
				$this->setBalance($value);
				break;
			case 7:
				$this->setRemark($value);
				break;
			case 8:
				$this->setInternalRemark($value);
				break;
			case 9:
				$this->setRefId($value);
				break;
			case 10:
				$this->setRefType($value);
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
		$keys = MlmAccountLedgerPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setAccountId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDistId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setAccountType($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTransactionType($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCredit($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDebit($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setBalance($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setRemark($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setInternalRemark($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setRefId($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setRefType($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCreatedBy($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setCreatedOn($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setUpdatedBy($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setUpdatedOn($arr[$keys[14]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(MlmAccountLedgerPeer::DATABASE_NAME);

		if ($this->isColumnModified(MlmAccountLedgerPeer::ACCOUNT_ID)) $criteria->add(MlmAccountLedgerPeer::ACCOUNT_ID, $this->account_id);
		if ($this->isColumnModified(MlmAccountLedgerPeer::DIST_ID)) $criteria->add(MlmAccountLedgerPeer::DIST_ID, $this->dist_id);
		if ($this->isColumnModified(MlmAccountLedgerPeer::ACCOUNT_TYPE)) $criteria->add(MlmAccountLedgerPeer::ACCOUNT_TYPE, $this->account_type);
		if ($this->isColumnModified(MlmAccountLedgerPeer::TRANSACTION_TYPE)) $criteria->add(MlmAccountLedgerPeer::TRANSACTION_TYPE, $this->transaction_type);
		if ($this->isColumnModified(MlmAccountLedgerPeer::CREDIT)) $criteria->add(MlmAccountLedgerPeer::CREDIT, $this->credit);
		if ($this->isColumnModified(MlmAccountLedgerPeer::DEBIT)) $criteria->add(MlmAccountLedgerPeer::DEBIT, $this->debit);
		if ($this->isColumnModified(MlmAccountLedgerPeer::BALANCE)) $criteria->add(MlmAccountLedgerPeer::BALANCE, $this->balance);
		if ($this->isColumnModified(MlmAccountLedgerPeer::REMARK)) $criteria->add(MlmAccountLedgerPeer::REMARK, $this->remark);
		if ($this->isColumnModified(MlmAccountLedgerPeer::INTERNAL_REMARK)) $criteria->add(MlmAccountLedgerPeer::INTERNAL_REMARK, $this->internal_remark);
		if ($this->isColumnModified(MlmAccountLedgerPeer::REF_ID)) $criteria->add(MlmAccountLedgerPeer::REF_ID, $this->ref_id);
		if ($this->isColumnModified(MlmAccountLedgerPeer::REF_TYPE)) $criteria->add(MlmAccountLedgerPeer::REF_TYPE, $this->ref_type);
		if ($this->isColumnModified(MlmAccountLedgerPeer::CREATED_BY)) $criteria->add(MlmAccountLedgerPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(MlmAccountLedgerPeer::CREATED_ON)) $criteria->add(MlmAccountLedgerPeer::CREATED_ON, $this->created_on);
		if ($this->isColumnModified(MlmAccountLedgerPeer::UPDATED_BY)) $criteria->add(MlmAccountLedgerPeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(MlmAccountLedgerPeer::UPDATED_ON)) $criteria->add(MlmAccountLedgerPeer::UPDATED_ON, $this->updated_on);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(MlmAccountLedgerPeer::DATABASE_NAME);

		$criteria->add(MlmAccountLedgerPeer::ACCOUNT_ID, $this->account_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getAccountId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setAccountId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setDistId($this->dist_id);

		$copyObj->setAccountType($this->account_type);

		$copyObj->setTransactionType($this->transaction_type);

		$copyObj->setCredit($this->credit);

		$copyObj->setDebit($this->debit);

		$copyObj->setBalance($this->balance);

		$copyObj->setRemark($this->remark);

		$copyObj->setInternalRemark($this->internal_remark);

		$copyObj->setRefId($this->ref_id);

		$copyObj->setRefType($this->ref_type);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setCreatedOn($this->created_on);

		$copyObj->setUpdatedBy($this->updated_by);

		$copyObj->setUpdatedOn($this->updated_on);


		$copyObj->setNew(true);

		$copyObj->setAccountId(NULL); 
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
			self::$peer = new MlmAccountLedgerPeer();
		}
		return self::$peer;
	}

} 