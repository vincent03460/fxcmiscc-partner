<?php


abstract class BaseMlmDistPairingLedger2 extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $pairing_id;


	
	protected $dist_id;


	
	protected $left_right;


	
	protected $transaction_type;


	
	protected $credit = 0;


	
	protected $credit_actual = 0;


	
	protected $debit = 0;


	
	protected $balance = 0;


	
	protected $remark;


	
	protected $created_by;


	
	protected $created_on;


	
	protected $updated_by;


	
	protected $updated_on;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getPairingId()
	{

		return $this->pairing_id;
	}

	
	public function getDistId()
	{

		return $this->dist_id;
	}

	
	public function getLeftRight()
	{

		return $this->left_right;
	}

	
	public function getTransactionType()
	{

		return $this->transaction_type;
	}

	
	public function getCredit()
	{

		return $this->credit;
	}

	
	public function getCreditActual()
	{

		return $this->credit_actual;
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

	
	public function setPairingId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->pairing_id !== $v) {
			$this->pairing_id = $v;
			$this->modifiedColumns[] = MlmDistPairingLedger2Peer::PAIRING_ID;
		}

	} 
	
	public function setDistId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->dist_id !== $v) {
			$this->dist_id = $v;
			$this->modifiedColumns[] = MlmDistPairingLedger2Peer::DIST_ID;
		}

	} 
	
	public function setLeftRight($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->left_right !== $v) {
			$this->left_right = $v;
			$this->modifiedColumns[] = MlmDistPairingLedger2Peer::LEFT_RIGHT;
		}

	} 
	
	public function setTransactionType($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->transaction_type !== $v) {
			$this->transaction_type = $v;
			$this->modifiedColumns[] = MlmDistPairingLedger2Peer::TRANSACTION_TYPE;
		}

	} 
	
	public function setCredit($v)
	{

		if ($this->credit !== $v || $v === 0) {
			$this->credit = $v;
			$this->modifiedColumns[] = MlmDistPairingLedger2Peer::CREDIT;
		}

	} 
	
	public function setCreditActual($v)
	{

		if ($this->credit_actual !== $v || $v === 0) {
			$this->credit_actual = $v;
			$this->modifiedColumns[] = MlmDistPairingLedger2Peer::CREDIT_ACTUAL;
		}

	} 
	
	public function setDebit($v)
	{

		if ($this->debit !== $v || $v === 0) {
			$this->debit = $v;
			$this->modifiedColumns[] = MlmDistPairingLedger2Peer::DEBIT;
		}

	} 
	
	public function setBalance($v)
	{

		if ($this->balance !== $v || $v === 0) {
			$this->balance = $v;
			$this->modifiedColumns[] = MlmDistPairingLedger2Peer::BALANCE;
		}

	} 
	
	public function setRemark($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->remark !== $v) {
			$this->remark = $v;
			$this->modifiedColumns[] = MlmDistPairingLedger2Peer::REMARK;
		}

	} 
	
	public function setCreatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = MlmDistPairingLedger2Peer::CREATED_BY;
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
			$this->modifiedColumns[] = MlmDistPairingLedger2Peer::CREATED_ON;
		}

	} 
	
	public function setUpdatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = MlmDistPairingLedger2Peer::UPDATED_BY;
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
			$this->modifiedColumns[] = MlmDistPairingLedger2Peer::UPDATED_ON;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->pairing_id = $rs->getInt($startcol + 0);

			$this->dist_id = $rs->getInt($startcol + 1);

			$this->left_right = $rs->getString($startcol + 2);

			$this->transaction_type = $rs->getString($startcol + 3);

			$this->credit = $rs->getFloat($startcol + 4);

			$this->credit_actual = $rs->getFloat($startcol + 5);

			$this->debit = $rs->getFloat($startcol + 6);

			$this->balance = $rs->getFloat($startcol + 7);

			$this->remark = $rs->getString($startcol + 8);

			$this->created_by = $rs->getInt($startcol + 9);

			$this->created_on = $rs->getTimestamp($startcol + 10, null);

			$this->updated_by = $rs->getInt($startcol + 11);

			$this->updated_on = $rs->getTimestamp($startcol + 12, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 13; 
		} catch (Exception $e) {
			throw new PropelException("Error populating MlmDistPairingLedger2 object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MlmDistPairingLedger2Peer::DATABASE_NAME);
		}

		try {
			$con->begin();
			MlmDistPairingLedger2Peer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(MlmDistPairingLedger2Peer::CREATED_ON))
    {
      $this->setCreatedOn(time());
    }

    if ($this->isModified() && !$this->isColumnModified(MlmDistPairingLedger2Peer::UPDATED_ON))
    {
      $this->setUpdatedOn(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MlmDistPairingLedger2Peer::DATABASE_NAME);
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
					$pk = MlmDistPairingLedger2Peer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setPairingId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += MlmDistPairingLedger2Peer::doUpdate($this, $con);
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


			if (($retval = MlmDistPairingLedger2Peer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MlmDistPairingLedger2Peer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getPairingId();
				break;
			case 1:
				return $this->getDistId();
				break;
			case 2:
				return $this->getLeftRight();
				break;
			case 3:
				return $this->getTransactionType();
				break;
			case 4:
				return $this->getCredit();
				break;
			case 5:
				return $this->getCreditActual();
				break;
			case 6:
				return $this->getDebit();
				break;
			case 7:
				return $this->getBalance();
				break;
			case 8:
				return $this->getRemark();
				break;
			case 9:
				return $this->getCreatedBy();
				break;
			case 10:
				return $this->getCreatedOn();
				break;
			case 11:
				return $this->getUpdatedBy();
				break;
			case 12:
				return $this->getUpdatedOn();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MlmDistPairingLedger2Peer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getPairingId(),
			$keys[1] => $this->getDistId(),
			$keys[2] => $this->getLeftRight(),
			$keys[3] => $this->getTransactionType(),
			$keys[4] => $this->getCredit(),
			$keys[5] => $this->getCreditActual(),
			$keys[6] => $this->getDebit(),
			$keys[7] => $this->getBalance(),
			$keys[8] => $this->getRemark(),
			$keys[9] => $this->getCreatedBy(),
			$keys[10] => $this->getCreatedOn(),
			$keys[11] => $this->getUpdatedBy(),
			$keys[12] => $this->getUpdatedOn(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MlmDistPairingLedger2Peer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setPairingId($value);
				break;
			case 1:
				$this->setDistId($value);
				break;
			case 2:
				$this->setLeftRight($value);
				break;
			case 3:
				$this->setTransactionType($value);
				break;
			case 4:
				$this->setCredit($value);
				break;
			case 5:
				$this->setCreditActual($value);
				break;
			case 6:
				$this->setDebit($value);
				break;
			case 7:
				$this->setBalance($value);
				break;
			case 8:
				$this->setRemark($value);
				break;
			case 9:
				$this->setCreatedBy($value);
				break;
			case 10:
				$this->setCreatedOn($value);
				break;
			case 11:
				$this->setUpdatedBy($value);
				break;
			case 12:
				$this->setUpdatedOn($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MlmDistPairingLedger2Peer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setPairingId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDistId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setLeftRight($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTransactionType($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCredit($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCreditActual($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setDebit($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setBalance($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setRemark($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCreatedBy($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCreatedOn($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setUpdatedBy($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setUpdatedOn($arr[$keys[12]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(MlmDistPairingLedger2Peer::DATABASE_NAME);

		if ($this->isColumnModified(MlmDistPairingLedger2Peer::PAIRING_ID)) $criteria->add(MlmDistPairingLedger2Peer::PAIRING_ID, $this->pairing_id);
		if ($this->isColumnModified(MlmDistPairingLedger2Peer::DIST_ID)) $criteria->add(MlmDistPairingLedger2Peer::DIST_ID, $this->dist_id);
		if ($this->isColumnModified(MlmDistPairingLedger2Peer::LEFT_RIGHT)) $criteria->add(MlmDistPairingLedger2Peer::LEFT_RIGHT, $this->left_right);
		if ($this->isColumnModified(MlmDistPairingLedger2Peer::TRANSACTION_TYPE)) $criteria->add(MlmDistPairingLedger2Peer::TRANSACTION_TYPE, $this->transaction_type);
		if ($this->isColumnModified(MlmDistPairingLedger2Peer::CREDIT)) $criteria->add(MlmDistPairingLedger2Peer::CREDIT, $this->credit);
		if ($this->isColumnModified(MlmDistPairingLedger2Peer::CREDIT_ACTUAL)) $criteria->add(MlmDistPairingLedger2Peer::CREDIT_ACTUAL, $this->credit_actual);
		if ($this->isColumnModified(MlmDistPairingLedger2Peer::DEBIT)) $criteria->add(MlmDistPairingLedger2Peer::DEBIT, $this->debit);
		if ($this->isColumnModified(MlmDistPairingLedger2Peer::BALANCE)) $criteria->add(MlmDistPairingLedger2Peer::BALANCE, $this->balance);
		if ($this->isColumnModified(MlmDistPairingLedger2Peer::REMARK)) $criteria->add(MlmDistPairingLedger2Peer::REMARK, $this->remark);
		if ($this->isColumnModified(MlmDistPairingLedger2Peer::CREATED_BY)) $criteria->add(MlmDistPairingLedger2Peer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(MlmDistPairingLedger2Peer::CREATED_ON)) $criteria->add(MlmDistPairingLedger2Peer::CREATED_ON, $this->created_on);
		if ($this->isColumnModified(MlmDistPairingLedger2Peer::UPDATED_BY)) $criteria->add(MlmDistPairingLedger2Peer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(MlmDistPairingLedger2Peer::UPDATED_ON)) $criteria->add(MlmDistPairingLedger2Peer::UPDATED_ON, $this->updated_on);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(MlmDistPairingLedger2Peer::DATABASE_NAME);

		$criteria->add(MlmDistPairingLedger2Peer::PAIRING_ID, $this->pairing_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getPairingId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setPairingId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setDistId($this->dist_id);

		$copyObj->setLeftRight($this->left_right);

		$copyObj->setTransactionType($this->transaction_type);

		$copyObj->setCredit($this->credit);

		$copyObj->setCreditActual($this->credit_actual);

		$copyObj->setDebit($this->debit);

		$copyObj->setBalance($this->balance);

		$copyObj->setRemark($this->remark);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setCreatedOn($this->created_on);

		$copyObj->setUpdatedBy($this->updated_by);

		$copyObj->setUpdatedOn($this->updated_on);


		$copyObj->setNew(true);

		$copyObj->setPairingId(NULL); 
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
			self::$peer = new MlmDistPairingLedger2Peer();
		}
		return self::$peer;
	}

} 