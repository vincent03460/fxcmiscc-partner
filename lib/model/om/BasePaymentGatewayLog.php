<?php


abstract class BasePaymentGatewayLog extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $log_id;


	
	protected $amount = 0;


	
	protected $handling_amount = 0;


	
	protected $submit_string;


	
	protected $transaction_type;


	
	protected $status_code;


	
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

	
	public function getAmount()
	{

		return $this->amount;
	}

	
	public function getHandlingAmount()
	{

		return $this->handling_amount;
	}

	
	public function getSubmitString()
	{

		return $this->submit_string;
	}

	
	public function getTransactionType()
	{

		return $this->transaction_type;
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

	
	public function setLogId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->log_id !== $v) {
			$this->log_id = $v;
			$this->modifiedColumns[] = PaymentGatewayLogPeer::LOG_ID;
		}

	} 
	
	public function setAmount($v)
	{

		if ($this->amount !== $v || $v === 0) {
			$this->amount = $v;
			$this->modifiedColumns[] = PaymentGatewayLogPeer::AMOUNT;
		}

	} 
	
	public function setHandlingAmount($v)
	{

		if ($this->handling_amount !== $v || $v === 0) {
			$this->handling_amount = $v;
			$this->modifiedColumns[] = PaymentGatewayLogPeer::HANDLING_AMOUNT;
		}

	} 
	
	public function setSubmitString($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->submit_string !== $v) {
			$this->submit_string = $v;
			$this->modifiedColumns[] = PaymentGatewayLogPeer::SUBMIT_STRING;
		}

	} 
	
	public function setTransactionType($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->transaction_type !== $v) {
			$this->transaction_type = $v;
			$this->modifiedColumns[] = PaymentGatewayLogPeer::TRANSACTION_TYPE;
		}

	} 
	
	public function setStatusCode($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->status_code !== $v) {
			$this->status_code = $v;
			$this->modifiedColumns[] = PaymentGatewayLogPeer::STATUS_CODE;
		}

	} 
	
	public function setCreatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = PaymentGatewayLogPeer::CREATED_BY;
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
			$this->modifiedColumns[] = PaymentGatewayLogPeer::CREATED_ON;
		}

	} 
	
	public function setUpdatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = PaymentGatewayLogPeer::UPDATED_BY;
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
			$this->modifiedColumns[] = PaymentGatewayLogPeer::UPDATED_ON;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->log_id = $rs->getInt($startcol + 0);

			$this->amount = $rs->getFloat($startcol + 1);

			$this->handling_amount = $rs->getFloat($startcol + 2);

			$this->submit_string = $rs->getString($startcol + 3);

			$this->transaction_type = $rs->getString($startcol + 4);

			$this->status_code = $rs->getString($startcol + 5);

			$this->created_by = $rs->getInt($startcol + 6);

			$this->created_on = $rs->getTimestamp($startcol + 7, null);

			$this->updated_by = $rs->getInt($startcol + 8);

			$this->updated_on = $rs->getTimestamp($startcol + 9, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 10; 
		} catch (Exception $e) {
			throw new PropelException("Error populating PaymentGatewayLog object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(PaymentGatewayLogPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			PaymentGatewayLogPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(PaymentGatewayLogPeer::CREATED_ON))
    {
      $this->setCreatedOn(time());
    }

    if ($this->isModified() && !$this->isColumnModified(PaymentGatewayLogPeer::UPDATED_ON))
    {
      $this->setUpdatedOn(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(PaymentGatewayLogPeer::DATABASE_NAME);
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
					$pk = PaymentGatewayLogPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setLogId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += PaymentGatewayLogPeer::doUpdate($this, $con);
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


			if (($retval = PaymentGatewayLogPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PaymentGatewayLogPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getLogId();
				break;
			case 1:
				return $this->getAmount();
				break;
			case 2:
				return $this->getHandlingAmount();
				break;
			case 3:
				return $this->getSubmitString();
				break;
			case 4:
				return $this->getTransactionType();
				break;
			case 5:
				return $this->getStatusCode();
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
		$keys = PaymentGatewayLogPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getLogId(),
			$keys[1] => $this->getAmount(),
			$keys[2] => $this->getHandlingAmount(),
			$keys[3] => $this->getSubmitString(),
			$keys[4] => $this->getTransactionType(),
			$keys[5] => $this->getStatusCode(),
			$keys[6] => $this->getCreatedBy(),
			$keys[7] => $this->getCreatedOn(),
			$keys[8] => $this->getUpdatedBy(),
			$keys[9] => $this->getUpdatedOn(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PaymentGatewayLogPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setLogId($value);
				break;
			case 1:
				$this->setAmount($value);
				break;
			case 2:
				$this->setHandlingAmount($value);
				break;
			case 3:
				$this->setSubmitString($value);
				break;
			case 4:
				$this->setTransactionType($value);
				break;
			case 5:
				$this->setStatusCode($value);
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
		$keys = PaymentGatewayLogPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setLogId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setAmount($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setHandlingAmount($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setSubmitString($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTransactionType($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setStatusCode($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCreatedBy($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCreatedOn($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setUpdatedBy($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setUpdatedOn($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(PaymentGatewayLogPeer::DATABASE_NAME);

		if ($this->isColumnModified(PaymentGatewayLogPeer::LOG_ID)) $criteria->add(PaymentGatewayLogPeer::LOG_ID, $this->log_id);
		if ($this->isColumnModified(PaymentGatewayLogPeer::AMOUNT)) $criteria->add(PaymentGatewayLogPeer::AMOUNT, $this->amount);
		if ($this->isColumnModified(PaymentGatewayLogPeer::HANDLING_AMOUNT)) $criteria->add(PaymentGatewayLogPeer::HANDLING_AMOUNT, $this->handling_amount);
		if ($this->isColumnModified(PaymentGatewayLogPeer::SUBMIT_STRING)) $criteria->add(PaymentGatewayLogPeer::SUBMIT_STRING, $this->submit_string);
		if ($this->isColumnModified(PaymentGatewayLogPeer::TRANSACTION_TYPE)) $criteria->add(PaymentGatewayLogPeer::TRANSACTION_TYPE, $this->transaction_type);
		if ($this->isColumnModified(PaymentGatewayLogPeer::STATUS_CODE)) $criteria->add(PaymentGatewayLogPeer::STATUS_CODE, $this->status_code);
		if ($this->isColumnModified(PaymentGatewayLogPeer::CREATED_BY)) $criteria->add(PaymentGatewayLogPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(PaymentGatewayLogPeer::CREATED_ON)) $criteria->add(PaymentGatewayLogPeer::CREATED_ON, $this->created_on);
		if ($this->isColumnModified(PaymentGatewayLogPeer::UPDATED_BY)) $criteria->add(PaymentGatewayLogPeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(PaymentGatewayLogPeer::UPDATED_ON)) $criteria->add(PaymentGatewayLogPeer::UPDATED_ON, $this->updated_on);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(PaymentGatewayLogPeer::DATABASE_NAME);

		$criteria->add(PaymentGatewayLogPeer::LOG_ID, $this->log_id);

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

		$copyObj->setAmount($this->amount);

		$copyObj->setHandlingAmount($this->handling_amount);

		$copyObj->setSubmitString($this->submit_string);

		$copyObj->setTransactionType($this->transaction_type);

		$copyObj->setStatusCode($this->status_code);

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
			self::$peer = new PaymentGatewayLogPeer();
		}
		return self::$peer;
	}

} 